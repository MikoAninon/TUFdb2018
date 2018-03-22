<?php
    require "index.php";

    if(isset($_POST['data'])){
        $ret = array();
        
        $query = "
                    SELECT employee.fName,COUNT(*) as count
                    FROM schedule
                    JOIN employee ON schedule.employeeid = employee.employeeID
                    GROUP BY schedule.employeeid
                    ORDER BY count DESC LIMIT 10";
        
        $graphData = mysqli_query($conn,$query);
        
        while($arr = mysqli_fetch_assoc($graphData)){
            $ret[] = $arr; 
        }
        
        echo json_encode($ret);
    }
?>