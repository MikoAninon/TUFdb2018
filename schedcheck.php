<?php
    require "index.php";

   
   if(isset($_POST['gt'])){
       $br = mysqli_real_escape_string($conn,$_POST['br']);
       $time = mysqli_real_escape_string($conn,$_POST['gt']);
       $customerid = mysqli_real_escape_string($conn,$_POST['sh']);
       $getdate = mysqli_real_escape_string($conn,$_POST['bd']);
      
       $check1 = "7:00:00 PM";//closing
       $check2 = "10:00:00 AM";//opening
       $time2 = "01:00:00";//hour added
       $strtime = strtotime($time);
       $strtotime1=strtotime($check1);
       $strtotime2 = strtotime($check2);
       $secs = strtotime($time2)-strtotime("00:00:00");
       $result = date("H:i:s a",strtotime($time)+$secs);
       
       $getBr = "SELECT branchID FROM branch WHERE address='".$br."'";
       
       $bId = mysqli_query($conn,$getBr);
       
       while ($r = mysqli_fetch_assoc($bId)){
           $brID = $r['branchID'];
       }
       
       $today = date("Y-m-d");
    
       
       if($getdate>=$today){
           if($strtime>=$strtotime2 && $strtime<=$strtotime1){
               $name = mysqli_real_escape_string($conn,$_POST['bn']);
               $query = "SELECT employeeid FROM employee WHERE fname='".$name."' ";     
               $res = mysqli_query($conn,$query);

               while($arr = mysqli_fetch_array($res)){
                   $empid = $arr['employeeid'];
               }
               $schedquery = "SELECT * FROM schedule WHERE timestart='".$time."' AND employeeid = ".$empid." AND date='".$getdate."' "; 
               $sched=mysqli_query($conn,$schedquery);

            if(mysqli_num_rows($sched)==0) {  
                //checks hour 
                $hourquery="SELECT HOUR(timestart) as hour, employeeid as EmpID FROM schedule WHERE HOUR(timestart)=HOUR('".$time."') AND date=('".$getdate."') AND employeeid = ".$empid."";
                $hour=mysqli_query($conn,$hourquery);

                if(mysqli_num_rows($hour)==0) {
                   $insquery = "INSERT INTO schedule VALUES (null,".$empid.", '".$getdate."','".$time."','".$result."', ".$customerid.",".$brID.") ";
                   $res2 = mysqli_query($conn,$insquery);
                   echo "Booking successful!";

                }else{
                    echo "Schedule already taken!";
                }

            }else{
                $result="Schedule already taken!";
                echo $result;
            }

        }else{
              $result="Invalid schedule!";
              echo $result;
           }
       }else{
           echo "Invalid date!";
       }
       
   }

?>    