<?php 
	require_once("includes/sessions.php");

	if($_SESSION['login'] == "1")
	{
		header("Location: index.php");
	}

	// get the post information from register form
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname']; 
	$email = $_POST['email'];
	$key = $_POST['key'];
	$keyC = $_POST['key-confirm'];

	// echo "Currently here!!";

	$dbuser = 'test';
	$dbpass = 'test';

	//Initializing Database Handle/Connect to Database
	$DBH = new PDO("mysql:host=$host;dbname=SoftwareSecurity", $dbuser, $dbpass);


	//Make query using database handle
	$query = $DBH->prepare("INSERT INTO  Users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
	
	if(!($key == $keyC))
	{
		$_SESSION["error"] = "Your passwords do not match, please try again";
		//echo "Password not the same!!";
		header("Location: register.php");
		die();
	}
	
	if($query->execute(array($firstname, $lastname, $email, sha1($key))))
	{
		$query = $DBH->prepare("SELECT * from Users where email=?");
		$query->execute(array($email));
		$row = $query->fetchAll(PDO::FETCH_ASSOC);

		$_SESSION['login'] = "1";
		$_SESSION['id'] = $row[0]["id"];
		$_SESSION['voted'] = $row[0]["voted"];
		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;
		$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
		header("Location: index.php");
	}
	else
	{
		$_SESSION["error"] = "Your account could not be created at this time, please try again.";
		echo mysql_error();
		header("Location: register.php");
	}
	$DBH = null;

?>