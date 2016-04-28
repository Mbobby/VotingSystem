<?php 
	require_once("includes/sessions.php");

	if(loggedIn())
	{
		header("Location: index.php");
	}


	// get the User Name and Password
	$email = strtolower($_POST['email']); 
	$pwd = $_POST['key'];

	//Database username and password initialization
	$dbuser = 'test';
	$dbpass = 'test';

	//Initializing Database Handle/Connect to Database
	$DBH = new PDO("mysql:host=$host;dbname=SoftwareSecurity", $dbuser, $dbpass);


	//Make query using database handle
	$query = $DBH->prepare("SELECT * FROM Users where email=? and password=?");
	$query->execute(array($email, sha1($pwd)));
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);

	$DBH = null;
	//Validate result size
	if (count($rows) == 1)
	{
		session_regenerate_id();
		$_SESSION['login'] = "1";
		$_SESSION['id'] = $rows[0]['id'];
		$_SESSION['voted'] = $rows[0]["voted"];
		$_SESSION['email'] = $email;
		$_SESSION['firstname'] = $rows[0]['firstname'];
		$_SESSION['lastname'] = $rows[0]['lastname'];
		$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
		header('Location: index.php');
		
	}
	else
	{
		$_SESSION["error"] = "Your email and password combination is wrong, please try again with the right information.";
		header("Location: login.php");
	}
	


?>