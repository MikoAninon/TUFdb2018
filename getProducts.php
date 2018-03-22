<?php
    require "index.php";

    $query = "SELECT * FROM product";

    $res = mysqli_query($conn,$query);
    
    $rows = array();

    
    
    while($arr = mysqli_fetch_assoc($res)){
        $rows[] = $arr;
    }

    echo json_encode($rows);
?>