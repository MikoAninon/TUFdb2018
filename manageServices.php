<?php
    
    require "index.php";

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $query = "DELETE FROM service WHERE serviceID=".$id;
        mysqli_query($conn,$query);
    }

    if(isset($_POST['i'])){
        $n = mysqli_real_escape_string($conn,$_POST['n']);
        $p = mysqli_real_escape_string($conn,$_POST['p']);
        $t = mysqli_real_escape_string($conn,$_POST['t']);
        $i = mysqli_real_escape_string($conn,$_POST['i']);
        
        $arr = array();

        $update = "UPDATE service SET serviceName='".$n."' , ServicePrice=".$p.", servicetype='".$t."' WHERE serviceID=".$i;  
        
        mysqli_query($conn,$update);
    }
    
    if(isset($_POST['g'])){
        $query = "SELECT * FROM service";

        $res = mysqli_query($conn,$query);

        $rows = array();

        while($arr = mysqli_fetch_assoc($res)){
            $rows[] = $arr;
        }

        echo json_encode($rows);
    }

    if (isset($_POST['id'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $query = "DELETE FROM service WHERE serviceID=".$id;
        mysqli_query ($conn,$query);
        echo "successfully deleted service";
    }


    if (isset($_POST['name'])){
        $Name   = mysqli_real_escape_string($conn,$_POST['name']);
        $Price  = mysqli_real_escape_string($conn,$_POST['price']);
        $Type   = mysqli_real_escape_string($conn,$_POST['type']);
        
        $query = "INSERT INTO service (serviceID,serviceName,serviceType,servicePrice) VALUES (null,'".$Name."','".$Type."',".$Price.")";
        
        mysqli_query($conn,$query);
        
        $getID = "SELECT * FROM service WHERE serviceName='".$Name."'";
        
        $id = mysqli_query($conn,$getID);
        
        while($arr=mysqli_fetch_array($id)){
            $ret = $arr['serviceID'];
        }
        
        echo json_encode($ret);
    }   
?>