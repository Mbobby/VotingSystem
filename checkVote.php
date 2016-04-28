<?php
	require_once("includes/sessions.php");

	if(!loggedIn())
	{
		header("Location: index.php");
	}


	$choice = $_POST["choice"];
	$token = $_POST["token"];
	if(count($choice) == 0)
	{
		$_SESSION["error"] = "You did not choose a candidate, please try again";

		header("Location: index.php");
		error_reporting(E_ALL);
	}

	if(!($token == $_SESSION["token"]))
	{
		$_SESSION["error"] = "Are you trying to perform CSRF??";
		header("Location: index.php");
		error_reporting(E_ALL);
	}


	//Check if user already voted
	if($_SESSION["voted"] == 1)
	{
		$_SESSION["alert"] = "Your have already voted.";
		header("Location: index.php");
	}

	//Database username and password initialization
	$dbuser = 'test';
	$dbpass = 'test';

	//Initializing Database Handle/Connect to Database
	$DBH = new PDO("mysql:host=$host;dbname=SoftwareSecurity", $dbuser, $dbpass);

	//Make query to record vote
	$query = $DBH->prepare("UPDATE Contestants SET votes=votes+1 WHERE id = ?");
	if($query->execute(array($choice)))
	{
		$_SESSION["alert"] = "Your vote has been recoreded.";
		$_SESSION["voted"] = "1";
		$query2 = $DBH->prepare("UPDATE Users SET voted=1 WHERE id = ?");
		$query2->execute(array($_SESSION["id"]));
		header("Location: index.php");
	}
	else
	{
		$_SESSION["error"] = "Your vote was not able to be recorded at this time, please try again.";
		header("Location: index.php");
	}
?>