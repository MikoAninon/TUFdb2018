<?php
    require"index.php";

    if(isset($_POST['signup'])){
        $eml = mysqli_real_escape_string($conn,$_POST['email']);
        $fName = mysqli_real_escape_string($conn,$_POST['fName']);
        $MI = mysqli_real_escape_string($conn,$_POST['MI']);
        $lName = mysqli_real_escape_string($conn,$_POST['lName']);
        $bday = mysqli_real_escape_string($conn,$_POST['bday']);
        $pass = mysqli_real_escape_string($conn,$_POST['pass']);
        $conpass = mysqli_real_escape_string($conn,$_POST['conpass']);
        
        $qc = "SELECT * FROM customer WHERE email='".$eml."'";
        
        $check = mysqli_query($conn,$qc);
        
        if ($pass != $conpass){
            echo"<script>alert('passwords must match!');</script>";
        } else if (mysqli_num_rows($check)==0) {
            $pass = md5($conpass);
            $query =    "  
                            INSERT INTO customer (CustomerID,email,fName,mInitial,lName,password,Birthdate) 
                            VALUES (null,'".$eml."','".$fName."','".$MI."','".$lName."','".$pass."','".$bday."')
                        ";
            
            mysqli_query($conn,$query);
            echo"<script>alert('Success!');</script>";
        } else {
            echo"<script>alert('Email is already in use!');</script>";
        }
        
    }
?>
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
        body{
            background-color: black;
            color:white;
        }
        .btnEdit{
            margin-top:15px;
        }
        .btn-danger{
            background-color: darkred;
            border-color: darkred;
        }
        .content{
            margin-top:25px;
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
                <div class='col-md-4 col-md-offset-4' id='form'>
                    <form method='POST' action="signup.php" class='content'>
                        <h5> Email </h5>
                        <input type="email" class="form-control" name='email' required>
                        <h5> First Name </h5>
                        <input type="text" class="form-control" name='fName' required>
                        <h5> Middle Initial </h5>
                        <input type="text" class="form-control" name='MI' required>
                        <h5> Last Name </h5>
                        <input type="text" class="form-control" name='lName' required>
                        <h5> Birthday </h5>
                        <input type='date' class='form-control' name='bday' required>
                        <h5> Password </h5>
                        <input type="password" class="form-control" name='pass' required>
                        <h5> Confirm Password </h5>
                        <input type="password" class="form-control" name='conpass' required>
                        
                        <button class='btn btn-danger btnEdit form-control' name='signup' type="submit"> Sign up </button>
                    </form>
                    
                    <p> Already have an account? <a id='formlink' href='login.php'> Login  </a></p>
                </div>
      
            </div>
        </div>
    </body>
</html>