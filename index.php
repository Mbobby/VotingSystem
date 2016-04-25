<?php 
	require_once("includes/sessions.php");
	require_once("includes/header.php");
?>
<!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                
                <?php 
                	if(!loggedIn())
                	{
                		include("login.php");
                	}
                	else if($_SESSION['voted'] == "1")
                	{
                		echo "<h1 style=\"color:#1fa67b\"> Thank you for voting </h1>";
                	}
                	else
                	{
                		include("voting.php");

                	}
                ?>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
<?php 
	include("includes/footer.php");	
?>