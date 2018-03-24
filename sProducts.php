<?php
    require "index.php"
        
        $s = $_POST['s'];
        
        $query = " SELECT * FROM product WHERE productName LIKE %".$s."%";

        $res = mysqli_connect($conn,$query);

        while($arr = mysqli_fetch_arr($res)){
            echo $arr['productName'];
        }
?>