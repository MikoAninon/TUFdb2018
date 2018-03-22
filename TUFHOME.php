<?php
    require "index.php";
    
    include"session.php";

    $query="SELECT address FROM branch";
    $res=mysqli_query($conn,$query);

    $pQuery="SELECT * FROM product";
    $pRes=mysqli_query($conn,$pQuery);
    
    $sQuery="SELECT * FROM service";
    $sRes=mysqli_query($conn,$sQuery);
?>


<html>
    <head>
        <title> TUF DB </title>
        
        <link rel='stylesheet' href='css/bootstrap.css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
            body{
                margin-top:0px;
                padding:0;  
                width:100%;
                margin:0px;
            }
            #hr{
                background-color: black;
                padding-top: 10px;
                padding-bottom: 10px;
            }
            #header{
                height:50px;
                text-align: center;
            }
            .colorfix{
                color:white;
            }

            .vl {
                border-left: 4px solid crimson;
                border-radius:5px;
                height: 60px;
            }
            .marginFix {
                margin-top:15px;
                text-align: center;
                color:black;
            }
            .btnEdit{
                background-color: black !important;
                color:white !important;
                height:50px;
            }
            .btnEdit2{
                background-color: black !important;
                color:white !important;
                height:50px;
            }
            .inputEdit{
                width:80%;
                margin-left:55px;
            }
            .formBtn{
                margin-top:10px;
            }
        
        </style>
            
    </head>
    
    <body>
        <div class='container-fluid'>
            <div class='row' id='hr'>
                <div class='col-md-4 col-md-offset-5'>
                    <a href='TUFHOME.php'><img src='images/logo-overdark.png' id='header'></a>
                </div>
                <div class='col-md-1'>
                    <a href='
                             <?php 
                                if(!isset($_SESSION['admin']) && isset($_SESSION['id'])){
                                    echo "newbooking.php";
                                } else if (!isset($_SESSION['id'])){
                                    echo "signup.php";
                                }                       
                             ?>'>
                        
                            <?php 
                                if (!isset($_SESSION['admin']) && isset($_SESSION['id'])){
                                    echo "<button class='btn btn-default btn-block btnEdit'>book</button>";
                                } else if (!isset($_SESSION['id'])) {
                                    echo "<button class='btn btn-default btn-block btnEdit'>Signup</button>";
                                }
                            ?>
                        
                    </a>
                </div>
                <div class='col-md-1'>
                   <?php 
                        if(!isset($_SESSION['email'])){
                            echo "<a href='login.php'><button class='btn btn-default btn-block btnEdit' >Login</button></a>";
                        } else {
                            echo "<form method='POST' action='session.php'>
                            <a href='login.php'><button class='btn btn-default btn-block btnEdit' name='Logout'>Log out</button></a>
                            </form>";
                        }
                    ?>
                </div>
            </div>
            <div class='row'>
                <img src='images/parallax.jpg' style='width:100%;'>
            </div>
        
          
            <div class="modal fade" id="products" role="dialog">
                    <div class="modal-dialog">
                         Modal content
                        <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h1 class="modal-title">Products:</h1>
                            </div>
                            <div class="modal-body" id='book'>
                                <?php       
                                    while($pArr = mysqli_fetch_assoc($pRes)){
                                      echo "<h2>".$pArr['productName']."</h2><h2>".$pArr['ProductPrice']."</h2>";
                                    }
                                ?>    
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss='modal'>Close </button>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal fade" id="branches" role="dialog">
                    <div class="modal-dialog">
                         Modal content
                        <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h1 class="modal-title">Branches :</h1>
                            </div>
                            <div class="modal-body" id='book'>
                                <?php       
                                    while($Arr = mysqli_fetch_assoc($res)){
                                        echo "<h2>".$Arr['address']."</h2>";
                                    }
                                ?>    
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss='modal'>Close </button>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal fade" id="services" role="dialog">
                    <div class="modal-dialog">
                         Modal content
                        <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h1 class="modal-title">Services :</h1>
                            </div>
                            <div class="modal-body" id='book'>
                                <?php       
                                    while($sArr = mysqli_fetch_assoc($sRes)){
                                        echo "<h2>".$sArr['serviceName']."</h2><h2>".$sArr['ServicePrice']."</h2>";
                                    }
                                ?>    
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss='modal'>Close </button>
                            </div>
                        </div>
                    </div>
            </div>
            <div class='row' id='textSpace'>
                <div class='col-md-2 col-md-offset-1'>
                        <?php
                            if (isset($_SESSION['admin'])){
                                echo "<a href='products.php'><h3 class='marginFix'> <strong>Products</strong></h3></a>";
                            } else {
                                echo "<a href='#' data-toggle='modal' data-target='#products'><h3 class='marginFix'> <strong>Products</strong></h3></a>";
                            }
                        ?>
                </div>
                <div class='vl col-md-1 col-md-offset-1'></div>
                <div class='col-md-2'>
                    <?php
                            if (isset($_SESSION['admin'])){
                                echo "<a href='services.php'><h3 class='marginFix'> <strong>Services</strong></h3></a>";
                            } else {
                                echo "<a href='#' data-toggle='modal' data-target='#services'><h3 class='marginFix'> <strong>Services</strong></h3></a>";
                            }
                        ?>
                </div>
                <div class='vl col-md-1 col-md-offset-1'></div>
                <div class='col-md-2 '>
                        <?php
                            if (isset($_SESSION['admin'])){
                                echo "<a href='branchedit.php'><h3 class='marginFix'> <strong>Branches</strong></h3></a>";
                            } else {
                                echo "<a href='#' data-toggle='modal' data-target='#branches'><h3 class='marginFix'><strong>Branches</strong></h3></a>";
                            }
                        ?>
                </div>
                <?php
                        if (isset($_SESSION['admin'])){
                            echo "<div class='vl col-md-1 col-md-offset-1'></div>";
                            echo "<div class='col-md-2'>";
                            echo "<a href='employees.php'><h3 class='marginFix'> <strong>Employees</strong></h3></a>";
                            echo "</div>";
                        } 
                ?>
            </div>
        </div>
    </body>
</html>