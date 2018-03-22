<?php
    require "index.php";

    $data = "failed";

    if(isset($_POST['i'])){
        $name = mysqli_real_escape_string($conn,$_POST['n']);
        $price = mysqli_real_escape_string($conn,$_POST['p']);
        $id = mysqli_real_escape_string($conn,$_POST['i']);
        
        $query = "UPDATE product SET productName='".$name."' , productPrice=".$price." WHERE prodID=".$id;  
        
        mysqli_query($conn,$query);
        
        $data = "success";
    }

    echo $data;
?>