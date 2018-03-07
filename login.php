<html>
    <head>
        <title> Login </title>
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
        .colorfix{
            color:white;
        }
        .btnfix{
            margin-top:10px;
        }
        .formWidth{
            width:100%;
        }
    </style>
    
    <body>
        <div class='container-fluid'>
            <div class='row' id='hr'>
                    <div class='col-md-4 col-md-offset-5'>
                        <a href='TUFHOME.php'><img src='images/logo-overdark.png' id='header'></a>
                    </div>
                    <div class='col-md-1'>
                        <a class='colorfix' href='signup.php'> <h3> Sign up </h3> </a>
                    </div>
            </div>
            <div class='row'>
                <div class='col-md-4 col-md-offset-4'>
                    <form class='formWidth'>
                        <h2 style='text-align:center;'> Login </h4>
                        <h5> Email </h5>
                        <input type='text' class='form-control'>
                        <h5> Password </h5>
                        <input type='password' class='form-control'>
                        <button type='submmit' class='btn btn-success form-control btnfix'> Login </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>