<?php
    require"index.php";

    if(isset($_POST['br'])){
        $i=0;
        $branch = $_POST['br'];
        
        $query ="   
                    Select fname FROM employee 
                    JOIN branch 
                    ON employee.branchid=branch.branchid 
                    where employee.employeetype='Barber' AND branch.branchID=(SELECT branchID from branch where address='".$branch."')
                ";
        
        $res = mysqli_query($conn,$query);
        
//        $ret;
//        $i = 0;
//        
//        while ($arr = mysqli_fetch_array($res)){
//            $ret[$i++] = $arr['fname'];
//        }
//      
        while($data=mysqli_fetch_assoc($res)){
            
            $arr[$i]=$data['fname'];
            
            $i++;
            
            //echo json_encode($data['fname']);
        }    
        
        echo json_encode($arr);
    }

?>