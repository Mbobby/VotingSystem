<?php
require_once("includes/sessions.php");
require_once("includes/header.php");
if(!loggedIn())
{
	header("Location: index.php");
}
?>

<form role="form" action="checkVote.php">
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
		echo "<img src=\"images/".$row['picture_url']." \" height=\"50\" width=\"50\"><br>";
		echo "<label for=\"contestant\">".$row['firstname']." ".$row['lastname']."</label>";
		echo "<input type=\"radio\" class=\"form-control\" name=\"choice\" value=\"".$row['id']."\">";
		echo "</div>";
	}
?>
  <input type="hidden" value="<?php echo $_SESSION['token']?>"></input>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
