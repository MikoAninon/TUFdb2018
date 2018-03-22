<?php
    require "index.php";

    $data = "failed";

    if(isset($_POST['i'])){
        $name = mysqli_real_escape_string($conn,$_POST['n']);
        $type = mysqli_real_escape_string($conn,$_POST['p']);
        $id = mysqli_real_escape_string($conn,$_POST['i']);
        
        $query = "UPDATE service SET serviceName='".$name."' , serviceType='".$type."' WHERE serviceID=1";  
        
        mysqli_query($conn,$query);
        
        $data = "success";
    }

    echo $data;
?>