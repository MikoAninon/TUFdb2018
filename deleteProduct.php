<?php
    require "index.php";

    $data = "query not made";

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
                
    } else if ($_POST['reqAll']){
        $query = "DELETE FROM product";
        mysqli_query($conn,$query);
        $data = "All products have been deleted";
    } 

    echo $data;
?>