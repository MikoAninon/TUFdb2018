<?php
    require "index.php";
    
    if (isset($_POST['fname'])){
        $fname   =  mysqli_real_escape_string($conn,$_POST['fname']);
        $mi  =      mysqli_real_escape_string($conn,$_POST['mi']);
        $lname   =  mysqli_real_escape_string($conn,$_POST['lname']);
        $address =  mysqli_real_escape_string($conn,$_POST['res']);
        $bday =     mysqli_real_escape_string($conn,$_POST['bday']);
        $branch =   mysqli_real_escape_string($conn,$_POST['branch']);
        $type =     mysqli_real_escape_string($conn,$_POST['type']);
        $gender =    mysqli_real_escape_string($conn,$_POST['gender']);
        
        $idquery="SELECT branchID FROM branch WHERE address = '".$branch."' "; 
        
        $getBranchid = mysqli_query($conn,$idquery);
        
        while($arrinit=mysqli_fetch_array($getBranchid)){
            $idres = $arrinit['branchID'];
        }
        
        $query = "INSERT INTO employee VALUES (null,'".$fname."','".$mi."','".$lname."','".$address."','".$bday."','".$gender."','".$type."','".$idres."')";
        
        mysqli_query($conn,$query);
        
        $getID = "SELECT * FROM employee WHERE fname='".$fname."' ";
        
        $id = mysqli_query($conn,$getID);
        
        while($arr=mysqli_fetch_array($id)){
            $ret = $arr['employeeid'];
        }
        
        echo json_encode($ret);
    }   
?>