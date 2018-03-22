<?php
    require "index.php";

    $data = "query not made";

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $query = "DELETE FROM branch WHERE branchid=".$id;
        mysqli_query($conn,$query);
        $data = "Branch has been deleted";
    } 

    echo $data;
?>