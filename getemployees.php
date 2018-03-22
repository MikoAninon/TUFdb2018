<?php
    require "index.php";

    $query = "SELECT employee.*, branch.address FROM employee
    JOIN branch
    ON employee.branchid = branch.branchid
    ";

    $res = mysqli_query($conn,$query);
    
    $rows = array();

    
    
    while($arr = mysqli_fetch_assoc($res)){
        $rows[] = $arr;
    }

    echo json_encode($rows);
?>