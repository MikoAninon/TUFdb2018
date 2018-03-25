<?php
    require "index.php";

   
   if(isset($_POST['sc'])){
       $name = mysqli_real_escape_string($conn,$_POST['sc']);
       $getdate = mysqli_real_escape_string($conn,$_POST['bd']);
       $arr = array();
       $i=0;
       $query = "SELECT TIME_FORMAT(timestart, '%r') as timestart,TIME_FORMAT(timeend, '%r') as timeend FROM schedule
                JOIN employee
                ON schedule.employeeid=employee.employeeID
                WHERE employee.fName='".$name."' AND date='".$getdate."'";
       
        $res = mysqli_query($conn,$query);
            
        while($data=mysqli_fetch_assoc($res)){
            
            $arr[$i]=$data['timestart'];
            $arr[$i+1]=$data['timeend'];
            
            $i=$i+2;

        }
        echo json_encode($arr);
       
   }

?>    