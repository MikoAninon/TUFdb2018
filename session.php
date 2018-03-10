<?php
    require "index.php";
    
    session_start();

    if (isset($_POST['Login'])){
        $eml = mysqli_real_escape_string($conn,$_POST['eml']);
        $lpwd = mysqli_real_escape_string($conn,$_POST['lpwd']);
        
        $lpwd = md5($lpwd);

        
        $query = "SELECT * FROM customer WHERE email='$eml' AND password='$lpwd'";
        
        $res = mysqli_query($conn,$query);
        
        if(mysqli_num_rows($res)==1){
            
            while($arr = mysqli_fetch_assoc($res)){
                $_SESSION['fName'] = $arr['fName'];
                $_SESSION['MI'] = $arr['mInitial'];
                $_SESSION['lName'] = $arr['lName'];
                $_SESSION['id'] = $arr['CustomerID'];
            }
            header('Location:profile.php');
        }else{
            echo "<script type='text/javascript'>alert('Invalid email or password');</script>";
            header('refresh:0;url=login.php'); //TO redirect if login in fails   
        }
    }

    

    if(isset($_POST['Logout'])){
        session_destroy();
        
        header("Location:login.php");
    }
?> 

