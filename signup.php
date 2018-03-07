<html>
    <head>
        <title> Sign up </title>
        
        
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
    </style>
    <body>
        <div class='container-fluid'>
            <div class='row' id='hr'>
                    <div class='col-md-4 col-md-offset-5'>
                        <a href='TUFHOME.php'><img src='images/logo-overdark.png' id='header'></a>
                    </div>
                    <div class='col-md-1'>
                        <a class='colorfix' href='login.php'> <h3> Login </h3> </a>
                    </div>
            </div>
            <div class='row'>
                <div class='col-md-3 col-md-offset-4' id='form'>
                    <form method='POST' action="signup.php">
                        <h3 id='title'> Sign up</h4>
                        
                        <h5> Email </h5>
                        <input type="email" class="form-control" name='email' required='required'>
                        <h5> First Name </h5>
                        <input type="text" class="form-control" name='fName' required='required'>
                        <h5> Last Name </h5>
                        <input type="text" class="form-control" name='lName' required='required'>
                        <h5> Password </h5>
                        <input type="password" class="form-control" name='pass' required='required'>
                        <h5> Confirm Password </h5>
                        <input type="password" class="form-control" name='conpass' required='required'>
                        <hr>
                        <button class='btn btn-success' name='signup' type="submit"> Sign up </button>
                    </form>
                    
                    <p> Already have an account? <a id='formlink' href='signin.php'> Sign in</a></p>
                </div>
      
            </div>
        </div>
    </body>
</html>