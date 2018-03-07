<?php
    require "index.php"
    
?>
<html>
    <head> 
        <title> Products </title>
        <link rel='stylesheet' href='css/bootstrap.css'>
    </head>
    <style>
        #hr{
            background-color: black;
            padding-top: 15px;
            padding-bottom: 15px;
            }
        #header{
            height:50px;
            text-align: center;
        }
        .tab{
            width:100%;
        }
    </style>
    <body>
        <div class='container-fluid'>
            <div class='row' id='hr'>
                <div class='col-md-4 col-md-offset-5'>
                    <a href='TUFHOME.php'><img src='images/logo-overdark.png' id='header'></a>
                </div>
            </div>
            <div class='row'>
                <!--                code to output products here-->
                <?php 
                    $query = 'SELECT * FROM product';
    
                    $res = mysqli_query($conn,$query);
    
                    if(mysqli_num_rows($res)!=0){
                        
                        echo "<table class='table-striped table-bordered tab table-responsive'>";
                        
                        echo "<tr><td><h4><strong>Product Name</strong></h4></td><td><h4><strong>Price (PHP)    </strong></h4></td></tr>";
                        while($r = mysqli_fetch_assoc($res)){
                            echo"<tr><td>".$r['productName']."</td><td>".$r['ProductPrice']."</td></tr>";
                        }
                        
                        echo "</table>";
                        
                    }
                ?>
            </div>
        </div>
    </body>
</html>