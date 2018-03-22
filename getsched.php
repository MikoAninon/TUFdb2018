<?php
    require "index.php";

   
   if(isset($_POST['sc'])){
       $name = mysqli_real_escape_string($conn,$_POST['sc']);
       $arr = array();
       $i=0;
       //must add timeend to this
       $query = "SELECT timestart,timeend FROM schedule
                JOIN employee
                ON schedule.employeeid=employee.employeeID
                WHERE employee.fName='".$name."' AND DAY(date)=DAY(now())";
       
        $res = mysqli_query($conn,$query);
            
        while($data=mysqli_fetch_assoc($res)){
            
            $arr[$i]=$data['timestart'];
            $arr[$i+1]=$data['timeend'];
            
            $i=$i+2;
            
            //echo json_encode($data['fname']);
        }
        echo json_encode($arr);
       
   }

?>    