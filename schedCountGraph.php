<?php
    require "index.php";

    if(isset($_POST['data'])){
        $ret = array();
        
        $query = "
                    SELECT date as day,COUNT(*) as count FROM schedule GROUP BY DAY(date)
                    ORDER BY day ASC";
        
        $graphData = mysqli_query($conn,$query);
        
        while($arr = mysqli_fetch_assoc($graphData)){
            $ret[] = $arr; 
        }
        
        echo json_encode($ret);
    }
?>