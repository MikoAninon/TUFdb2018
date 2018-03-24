<?php
    require "index.php";

    $data = "Failed";

    if(isset($_POST['i'])){
        $name = mysqli_real_escape_string($conn,$_POST['n']);
        $price = mysqli_real_escape_string($conn,$_POST['p']);
        $id = mysqli_real_escape_string($conn,$_POST['i']);
        $quantity = mysqli_real_escape_string($conn,$_POST['q']);
        
        $query = "UPDATE product SET productName='".$name."' , productPrice=".$price." , Quantity=".$quantity." WHERE prodID=".$id;  
        
        mysqli_query($conn,$query);
        
        $data = "Changes saved!";
    }

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $checkQuantity = "SELECT * FROM product WHERE prodID=".$id." AND Quantity = 0";
        
        $q = mysqli_query ($conn,$checkQuantity);
        
        if (mysqli_num_rows($q)==1){
            $query = "DELETE FROM product WHERE prodID=".$id;
            mysqli_query($conn,$query);
            $data = "Product has been deleted";
        } else {
            $data = "Finish editing product before deleting";
        }
                
    }

    echo $data;
?>