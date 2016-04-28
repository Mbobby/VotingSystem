<?php 
	require_once("includes/sessions.php");
    if(loggedIn())
    {
        $_SESSION['alert'] = "Please log out first in order to register a new account";
        header("Location: index.php");
    }
	require_once("includes/header.php");
?>
<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registerCheck.php" method="post" id="login-form" autocomplete="off">
                    	<div class="form-group">
                            <label for="firstname" class="sr-only">First Name</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Joe">
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="sr-only">Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Allen">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@claflin.edu">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="key" id="key" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="key-confirm" class="sr-only">Confirm Password</label>
                            <input type="password" name="key-confirm" id="key-confirm" class="form-control" placeholder="Confirm Password">
                        </div>
                        
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<?php 
	include("includes/footer.php");	
?>