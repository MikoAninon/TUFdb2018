<?php
    require "index.php";

    if(isset($_POST['data'])){
        $ret = array();
        
        $query = "
                    SELECT YEAR(date) as year,COUNT(*) as count
                    FROM schedule
                    JOIN customer ON schedule.customerid = customer.customerid
                    GROUP BY YEAR(date)
                    ";
        
        $graphData = mysqli_query($conn,$query);
        
        while($arr = mysqli_fetch_assoc($graphData)){
            $ret[] = $arr; 
        }
        
        echo json_encode($ret);
    }
?>