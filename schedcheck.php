<?php
    require "index.php";

   
   if(isset($_POST['gt'])){
       $br = mysqli_real_escape_string($conn,$_POST['br']);
       $time = mysqli_real_escape_string($conn,$_POST['gt']);
       $customerid = mysqli_real_escape_string($conn,$_POST['sh']);
       //test time
       $check1 = "7:00:00 PM";
       //$zero="00:00:00";
       $check2 = "10:00:00 AM";
       $time2 = "01:00:00";
       $strtime = strtotime($time);
       $strtotime1=strtotime($check1);
       $strtotime2 = strtotime($check2);
       $secs = strtotime($time2)-strtotime("00:00:00");
       $result = date("H:i:s",strtotime($time)+$secs);
       
       
       $getBr = "SELECT branchID FROM branch WHERE address='".$br."'";
       
       $bId = mysqli_query($conn,$getBr);
       
       while ($r = mysqli_fetch_assoc($bId)){
           $brID = $r['branchID'];
       }
       
      if($strtime>$strtotime2 &&$strtime<$strtotime1){
           $name = mysqli_real_escape_string($conn,$_POST['bn']);
           $query = "SELECT employeeid FROM employee WHERE fname='".$name."' ";     
           $res = mysqli_query($conn,$query);
              
           while($arr = mysqli_fetch_array($res)){
               $empid = $arr['employeeid'];
           }
           $schedquery = "SELECT * FROM schedule WHERE timestart='".$time."' AND employeeid = ".$empid." "; 
          $sched=mysqli_query($conn,$schedquery);
           
        if(mysqli_num_rows($sched)==0) {          
           $insquery = "INSERT INTO schedule VALUES (null,".$empid.", NOW(),'".$time."','".$result."', ".$customerid.",".$brID.") ";
           $res2 = mysqli_query($conn,$insquery);
           echo $result;
        }else{
            $result="Booking failed";
            echo $result;
        }
          
    }else{
          $result="Booking failed";
          echo $result;
      }
       
   }

?>    