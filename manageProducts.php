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