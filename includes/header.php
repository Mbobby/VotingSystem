<?php 
    require_once("includes/sessions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Voting System</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    

    <script type="text/js" src="js/script.js"></script>

    <!-- Custom CSS -->
    <link href="css/stylesheet.css" rel="stylesheet">
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand navbar-left" href="index.php" style="color:#ffffff;">Voting System</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if(loggedIn())
                    {
                        echo "<li>";
                        echo "<a class=\"col-md-offset-3\" href=\"logout.php\" style=\"color:#ffffff;\" >Logout</a>";
                        echo "</li>";
                    }
                    else
                    {
                        echo "<li>";
                        echo "<a href=\"login.php\" style=\"color:#ffffff;\">Login</a>";
                        echo " </li>";
                        echo "<li>";
                        echo "<a href=\"register.php\" style=\"color:#ffffff;\">Register</a>";
                        echo " </li>";
                    }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

                            <?php
                            if($_SESSION["alert"])
                            {
                                echo "<div class=\"alert alert-success\" role=\"alert\" style=\"text-align:center;\">".$_SESSION["alert"]."</div>";
                                unset($_SESSION["alert"]);
                            }
                            if($_SESSION["error"])
                            {
                                echo "<div class=\"alert alert-danger\" role=\"alert\" style=\"text-align:center;\">".$_SESSION["error"]."</div>";
                                unset($_SESSION["error"]);
                            }

                            ?>

    