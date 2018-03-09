<?php
    require "index.php";

    $query = "SELECT * FROM service";

    $res = mysqli_query($conn,$query);
    $ser = mysqli_query($conn,$query);

?>
<html>
    <head>
        <title>
            Services 
        </title>
        <link rel='stylesheet' href='css/bootstrap.css'>
    </head>
    <style>
        body{
            margin:0;
        }
        #navBar{
            height:70px;
            background-color: black;
        }
        #logo{
            margin-top:10px;
            height:50px;
        }
    </style>
    <body>
        <div class='container-fluid'>
            <div class='row' id='navBar'>
                <div class='col-md-4 col-md-offset-5'>
                    <a href='TUFHOME.php'><img src='images/logo-overdark.png' id='logo'></a>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-3'>
                    <strong><h3> Services </h3></strong>
                    <?php
                        while($arr = mysqli_fetch_assoc($res)){
                            echo "<p>".$arr['serviceName']."</p>";
                        }
                    ?>    
                </div>
                <div class='col-md-3'>
                    <strong><h3> Price </h3></strong>
                    <?php
                        while($arr = mysqli_fetch_assoc($ser)){
                            echo "<p>".$arr['ServicePrice']."</p>";
                        }
                    ?>    
                </div>
            </div>
        </div>
    </body>
</html>