<?php
    require "index.php";

    $id = $_GET['prodID'];

    $query = "DELETE * FROM product WHERE prodID=".$id."'";

    mysqli_query($conn,$query);
?>