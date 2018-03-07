<?php
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
            width:200px; 
        }
        .content{
            margin-top:20px;
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
            margin-top:5px;
            width:100%;
        }
    </style>
    
    <body>
        <div class='container-fluid'>
            <div class='row' id='nav Bar'>
                <div class='col-md-1 col-md-offset-5'>
                    <img src='images/logo-overdark.png' id='logo'>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-4 col-md-offset-4'>
                    <form class='content'>
                        <h4 class='formLabel'> Log in </h4>
                        <label for='usr' class='labelEdit'> Username </label>
                        <input type='text' class='form-control inputEdit' name='usr'>
                        <label for='pwd' class='labelEdit'> Password </label>
                        <input type='text' class='form-control inputEdit' name='pwd'>
                        <button type='submit' class='btn btn-success buttonEdit'> Log in </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>