<?php
    require "index.php";

    $data = "failed";

    if(isset($_POST['i'])){
        $address = mysqli_real_escape_string($conn,$_POST['a']);
        $idval = mysqli_real_escape_string($conn,$_POST['i']);
       
        $query = "UPDATE branch SET address='".$address."' WHERE branchid=".$idval ;  
        
        mysqli_query($conn,$query);
        
        $data = "success";
    }

    echo $data;
?>