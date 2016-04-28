<?php
require_once("includes/sessions.php");
require_once("includes/header.php");
if(!loggedIn())
{
	header("Location: index.php");
}
?>

<form role="form" action="checkVote.php" method="post">
<?php  
	//Database username and password initialization
	$dbuser = 'test';
	$dbpass = 'test';

	//Initializing Database Handle/Connect to Database
	$DBH = new PDO("mysql:host=$host;dbname=SoftwareSecurity", $dbuser, $dbpass);


	//Make query using database handle
	$query= $DBH->prepare("SELECT * FROM Contestants");
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	foreach($rows as $row)
	{
		echo "<div class=\"form-group\">";
		//echo "<img src=\"images/".$row['picture_url']." \" height=\"50\" width=\"50\"><br>";
		echo "<label for=\"contestant\">".$row['firstname']." ".$row['lastname']."</label>";
		echo "<input type=\"radio\" class=\"form-control\" name=\"choice\" value=\"".$row['id']."\" required>";
		echo "</div>";
	}
?>
  <input type="hidden" value="<?php echo $_SESSION['token']?>" name="token"></input>
  <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Vote!">
</form>