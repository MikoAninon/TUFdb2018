<?php
    require "index.php";

   if(isset($_POST['l'])){
        $l = mysqli_real_escape_string($conn,$_POST['l']);
        $n = mysqli_real_escape_string($conn,$_POST['no']);
        
         
        
        $query = "SELECT * FROM product LIMIT ".$l.",".$n."";

        $res = mysqli_query($conn,$query);
        
        $rows = array();

        while($arr = mysqli_fetch_assoc($res)){
            $rows[] = $arr;
        }
        
        echo json_encode($rows);
    } else if (isset($_POST['gr'])){
       $query = "SELECT COUNT(*) rowCount FROM product";
       
       $res = mysqli_query ($conn,$query);
       
       while($arr = mysqli_fetch_array($res)){
           $ret = $arr;
       }
       
       echo json_encode($ret);
   } else if (isset($_POST['ex'])){
       $query = "SELECT COUNT(*) rowCount FROM product";
       
       $res = mysqli_query ($conn,$query);
       
       $allRows = mysqli_fetch_row($res);
       
       $extraRow = $totalRows[0] % $numberOfRows == 0 ? 0 : 1;
       $numberofPages = $totalRows[0]/$numberOfRows;
   
        $data = array();
       
       $data[0] = $extraRow;
       $data[1] = $numberofPages;
       
       echo json_encode($data);
   }
    
?>