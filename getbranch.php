<?php
    require "index.php";

    $query = "SELECT * FROM branch";
    

    $res = mysqli_query($conn,$query);
    
    $rows = array();

    
    
    while($arr = mysqli_fetch_assoc($res)){
        $rows[] = $arr;
    }

    echo json_encode($rows);
?>