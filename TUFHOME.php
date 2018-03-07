<?php
    require "index.php";

    if (isset($_POST['signup'])){
        $usr = mysqli_real_escape_string($conn,$_POST['usr']);
        $fn = mysqli_real_escape_string($conn,$_POST['fN']);
        $mi = mysqli_real_escape_string($conn,$_POST['mI']);
        $ln = mysqli_real_escape_string($conn,$_POST['lN']);
        $eml = mysqli_real_escape_string($conn,$_POST['eml']);
        $pass = mysqli_real_escape_string($conn,$_POST['pwd']);
        $conpass = mysqli_real_escape_string($conn,$_POST['cpwd']);
        
        if($pass == $conpass){
            $pass = md5($conpass);
            
            $query = "INSERT INTO customer (email,password)VALUES('$eml','$pass')";
            
            mysqli_query($conn,$query);
            echo"<script>alert('Sucess');</script>";
        }
    }

  
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
                padding-top: 15px;
                padding-bottom: 15px;
            }
            #header{
                height:50px;
                text-align: center;
            }
            .colorfix{
                color:white;
            }
            #textSpace{
                margin-top: 10px;
                height:100px;
                margin-bottom:20px;
            }

            .vl {
                border-left: 4px solid crimson;
                border-radius:5px;
                height: 330px;
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
                    <button type="button" class="btn btn-default btn-block btnEdit" data-toggle="modal" data-target="#myModal2">Sign up</button>
                </div>
                <div class='col-md-1'>
                    <button type="button" class="btn btn-default btn-block btnEdit" data-toggle="modal" data-target="#myModal">Login</button>
                </div>
            </div>
            <div class='row'>
                <img src='images/parallax.jpg' style='width:100%;'>
            </div>
            <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                   <div class='row'>
                        <form method='POST' action='session.php'>
                            <label for='eml' class='inputEdit'> Email </label>
                            <input type='text' name='eml' class='form-control inputEdit'> 
                            <label for='lpwd' class='inputEdit'> Password </label>
                            <input type='password' name='lpwd' class='form-control inputEdit'>
                            <button class='btn btn-success form-control inputEdit formBtn' name='Login' id='btnEdit2'> Login </button> 
                       </form>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
            <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Sign up</h4>
                </div>
                <div class="modal-body">
                   <div class='row'>
                        <form method='POST' action='TUFHOME.php'>
                            <label for='eml' class='inputEdit'> Email </label>
                            <input type='text' name='eml' class='form-control inputEdit'>
                            <label for='usr' class='inputEdit'> First Name </label>
                            <input type='text' name='fN' class='form-control inputEdit'>
                            <label for='usr' class='inputEdit'> Middle Initial </label>
                            <input type='text' name='mI' class='form-control inputEdit'>
                            <label for='usr' class='inputEdit'> Last Name </label>
                            <input type='text' name='lN' class='form-control inputEdit'>
                            <label for='usr' class='inputEdit'> Username </label>
                            <input type='text' name='usr' class='form-control inputEdit'> 
                            <label for='pwd' class='inputEdit'> Password </label>
                            <input type='password' name='pwd' class='form-control inputEdit'>
                            <label for='cpwd' class='inputEdit'> Confirm Password </label>
                            <input type='password' name='cpwd' class='form-control inputEdit'>
                            <button class='btn btn-success form-control inputEdit formBtn' name='signup'id='btnEdit'> Sign up </button> 
                       </form>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
            <div class='row' id='textSpace'>
                <div class='col-md-2 col-md-offset-1'>
                    
                    <h3 class='marginFix'> <strong>Products</strong> </h3>
                    <p class='marginFix'>
                        <?php 
                            $sql = "SELECT * FROM product";
                        
                            $prd = mysqli_query($conn,$sql);
                        
                            while($array = mysqli_fetch_assoc($prd)){
                                echo"<p>".$array['productName']."</pd>";
                            }
                        ?>    
                    </p>
                </div>
                <div class='vl col-md-1 col-md-offset-1'></div>
                <div class='col-md-2'>
                    <h3 class='marginFix'> <strong>Services</strong></h3>
                    <p class='marginFix'>
                        <?php 
                            $sql = "SELECT * FROM service";
                        
                            $svc = mysqli_query($conn,$sql);
                        
                            while($serviceArray = mysqli_fetch_assoc($svc)){
                                echo"<p>".$serviceArray['serviceName']."</pd>";
                            }
                        ?>
                    </p>
                </div>
                <div class='vl col-md-1 col-md-offset-1'></div>
                <div class='col-md-2'>
                    <h3 class='marginFix'> <strong>Branches</strong></h3>
                    <p class='marginFix'>
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>