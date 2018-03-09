<?php
    require "index.php";
  
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
                height: 50px;
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
                    <a href='signup.php'><button class="btn btn-default btn-block btnEdit">Sign up</button></a>
                </div>
                <div class='col-md-1'>
                    <a href='login.php'><button class="btn btn-default btn-block btnEdit" >Login</button></a>
                </div>
            </div>
            <div class='row'>
                <img src='images/parallax.jpg' style='width:100%;'>
            </div>
            </div>
          </div>
            <div class='row' id='textSpace'>
                <div class='col-md-2 col-md-offset-1'>
                    <a href='products.php'><h3 class='marginFix'> <strong>Products</strong></h3></a>
                </div>
                <div class='vl col-md-1 col-md-offset-1'></div>
                <div class='col-md-2'>
                    <a href='services.php'><h3 class='marginFix'> <strong>Services</strong></h3></a>
                </div>
                <div class='vl col-md-1 col-md-offset-1'></div>
                <div class='col-md-2'>
                    <a href='#'><h3 class='marginFix'> <strong>Branches</strong></h3></a>
                </div>
            </div>
        </div>
    </body>
</html>