<?php
    require "index.php";

    $data = "query not made";

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $query = "DELETE FROM product WHERE prodID=".$id;
        mysqli_query($conn,$query);
        $data = "Product has been deleted";
    } else if ($_POST['reqAll']){
        $query = "DELETE FROM product";
        mysqli_query($conn,$query);
        $data = "All products have been deleted";
    }

    echo $data;
?>