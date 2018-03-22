<?php
    require "index.php";
    
    if (isset($_POST['branch'])){
        $address =  mysqli_real_escape_string($conn,$_POST['branch']);
                
        $query = "INSERT INTO branch VALUES (null,'".$address."')";
        
        mysqli_query($conn,$query);
        
        $getID = "SELECT * FROM branch WHERE address='".$address."' ";
        
        $id = mysqli_query($conn,$getID);
        
        while($arr=mysqli_fetch_array($id)){
            $ret = $arr['branchID'];
        }
        
        echo json_encode($ret);
    }   
?>