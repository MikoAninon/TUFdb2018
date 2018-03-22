<?php
    require "index.php";
    
    if (isset($_POST['name'])){
        $prodName   = mysqli_real_escape_string($conn,$_POST['name']);
        $prodPrice  = mysqli_real_escape_string($conn,$_POST['price']);
        $prodType   = mysqli_real_escape_string($conn,$_POST['type']);
        
        $query = "INSERT INTO product (prodID,productName,productType,productPrice) VALUES (null,'".$prodName."','".$prodType."',".$prodPrice.")";
        
        mysqli_query($conn,$query);
        
        $getID = "SELECT * FROM product WHERE productName='".$prodName."'";
        
        $id = mysqli_query($conn,$getID);
        
        while($arr=mysqli_fetch_array($id)){
            $ret = $arr['prodID'];
        }
        
        echo json_encode($ret);
    }   
?>