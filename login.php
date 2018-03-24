<?php
    include "session.php";

    if(isset($_SESSION['id'])){
        header('location:TUFHOME.php');
    }
?>

<html>
    <head>
        <title> Log in</title>
        <link rel='stylesheet' href='css/bootstrap.css'>
    </head>
    
    <style>
        body{
            margin:0;
            padding:0;
        }
        #navBar{
            background-color: black;
            text-align: center;
        }
        #logo{
            height:50px;
         
        }
        .content{
            margin-top:105px;
        }
        .formLabel{
            text-align:center;
        }
        .inputEdit{
            margin-top:5px;
        }
        .labelEdit{
            margin-top:5px;
        }
        .buttonEdit{
            margin-top:10px;
            width:100%;
        }
        body{
            background-color: black;
            color:white;
        }
        .btn-danger{
            background-color: darkred;
            border-color: darkred;
        }
        #navEdit{
            margin-top: 10px;
        }
        #header{
            height:50px;
            text-align: center;
        }
    </style>
    
    <body>
        <div class='container-fluid'>
            <div class='row' id='nav Bar'>
                <div class='col-md-1 col-md-offset-5' id='navEdit'>
                    <a href='TUFHOME.php'><img src='images/logo-overdark.png' id='header'></a>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-4 col-md-offset-4'>
                    <form class='content' method='POST' action='session.php'>
                        <label for='usr' class='labelEdit'> Email </label>
                        <input type='text' class='form-control inputEdit' name='eml' required>
                        <label for='pwd' class='labelEdit'> Password </label>
                        <input type='password' class='form-control inputEdit' name='lpwd' required>
                        <button type='submit' class='btn btn-danger buttonEdit' name='Login'> Log in </button>
                    </form>
                    <p>Don't have an account? Sign up <a href='signup.php'>here</a></p>
                </div>
            </div>
        </div>
    </body>
</html>