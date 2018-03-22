<?php
    require "index.php";

    $data = "query not made";

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $query = "DELETE FROM employee WHERE employeeid=".$id;
        mysqli_query($conn,$query);
        $data = "Employee has been deleted";
    } 

    echo $data;
?>