<?php
    require "index.php";

    $data = "query not made";

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $query = "DELETE FROM service WHERE serviceID=".$id;
        mysqli_query($conn,$query);
        $data = "Service has been deleted";
    }

    echo $data;
?>