<?php
    require "index.php";
    
    session_start();

    if (isset($_POST['Login'])){
        $eml = mysqli_real_escape_string($conn,$_POST['eml']);
        $lpwd = mysqli_real_escape_string($conn,$_POST['lpwd']);
        
        $lpwd = md5($lpwd);

        
        $query = "SELECT * FROM customer WHERE email='$eml' AND password='$lpwd'";
        
        $res = mysqli_query($conn,$query);
        
        if(mysqli_num_rows($res)!=0){
            echo "<script type='text/javascript'>alert('found')";
            while($arr = mysqli_fetch_assoc($res)){
                $name = arr['fName'];
            }
            header("Location : profile.php");
        }else{
            //echo "<script type='text/javascript'>alert('Invalid email or password');</script>";
            header('refresh:0;Location:TUFHOME.php;'); //TO redirect if login in fails   
        }
    }

    

    if(isset($_POST['Logout'])){
        session_destroy();
        
        header("Location:signin.php");
    }
?> 
