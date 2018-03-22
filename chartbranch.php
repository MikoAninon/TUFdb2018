<?php
    require "index.php";

    if(isset($_POST['data'])){
        $ret = array();
        
        $query = "
                    SELECT branch.address,COUNT(*) as count
                    FROM schedule
                    JOIN branch ON schedule.branchID = branch.branchID
                    WHERE year(date) = year(now())
                    GROUP BY schedule.branchID 
                    ORDER BY count DESC LIMIT 10";
        
        $graphData = mysqli_query($conn,$query);
        
        while($arr = mysqli_fetch_assoc($graphData)){
            $ret[] = $arr; 
        }
        
        echo json_encode($ret);
    }
?>