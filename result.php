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
                  header("Location: index.php");
                }
                  
                //Database username and password initialization
                $dbuser = 'test';
                $dbpass = 'test';

                //Initializing Database Handle/Connect to Database
                $DBH = new PDO("mysql:host=$host;dbname=SoftwareSecurity", $dbuser, $dbpass);


                //Make query using database handle
                $query = $DBH->prepare("SELECT * FROM Contestants");
                $query->execute();
                $rows = $query->fetchAll(PDO::FETCH_ASSOC);

                $DBH = null;
                //Validate result size
                if (count($rows) > 0)
                {
                    $winner = $rows[0];
                    foreach($rows as $row)
                    {

                        if($winner["votes"] < $row["votes"])
                        {
                            $winner = $row;
                        }
                    }
                    if($winner["votes"]== 0)
                    {
                        echo "<h1 style=\"color:#1fa67b\">There are no votes yet at this time. Please check again later. </h1>";
                    }
                    else
                    {
                    echo "<h1 style=\"color:#1fa67b\">The Winner of the Election is ".$winner["firstname"]." ".$winner["lastname"]." with ".$winner["votes"]." votes."."</h1>";
                    }
                }
                else
                {
                    echo "<h1>There are no results at this time</h1>";
                }
                ?>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
<?php 
    require_once("includes/footer.php");    
?>