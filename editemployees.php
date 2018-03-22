<?php
    require "index.php";

    $data = "failed";

    if(isset($_POST['i'])){
        $fname = mysqli_real_escape_string($conn,$_POST['f']);
        $midinit = mysqli_real_escape_string($conn,$_POST['m']);
        $lname = mysqli_real_escape_string($conn,$_POST['l']);
        $resval = mysqli_real_escape_string($conn,$_POST['r']);
        $typeval = mysqli_real_escape_string($conn,$_POST['e']);
        $branch = mysqli_real_escape_string($conn,$_POST['b']);
        $idval = mysqli_real_escape_string($conn,$_POST['i']);
        
        $idquery="SELECT branchID FROM branch WHERE address = '".$branch."' "; 
        
        $getBranchid = mysqli_query($conn,$idquery);
        
        while($arrinit=mysqli_fetch_array($getBranchid)){
            $idres = $arrinit['branchID'];
        }
        
        
        $query = "UPDATE employee SET fname='".$fname."' , minitial='".$midinit."', lname = '".$lname."', Residence='".$resval."', employeetype = '".$typeval."', branchid = ".$idres." WHERE employeeid=".$idval ;  
        
        mysqli_query($conn,$query);
        
        $data = "success";
    }

    echo $data;
?>