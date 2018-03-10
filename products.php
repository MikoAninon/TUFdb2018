<?php
    require "index.php";

    $query = "SELECT * FROM product";

    $res = mysqli_query($conn,$query);

    $pro = mysqli_query($conn,$query);
?>
<html>
    <head>
        <title>
            Products 
        </title>
        <link rel='stylesheet' href='css/bootstrap.css'>
    </head>
    <style>
        body{
            margin:0;
        }
        #navBar{
            height:70px;
            background-color: black;
        }
        #logo{
            margin-top:10px;
            height:50px;
        }
    </style>
    <body>
        <div class='container-fluid'>
            <div class='row' id='navBar'>
                <div class='col-md-4 col-md-offset-5'>
                    <a href='TUFHOME.php'><img src='images/logo-overdark.png' id='logo'></a>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-3'>
                    <strong><h3> Products </h3></strong>
                    <div class='panel-group'>
                            <?php    
                                while($arr = mysqli_fetch_assoc($res)){
                                    echo "<div class='panel panel-default'>";
                                    echo "<div class='panel-body'>".$arr['productName']."<p>".$arr['ProductPrice']."</p></div>";
                                    echo "<span hidden>".$arr['prodID']."</span>";
                                    echo "<input id='clickMe' type='button' value='clickme' onclick='doFunction();' />";
                                    echo "</div>";
                                }
                            ?> 
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script src='jquery-3.2.1.min.js'></script>
<script>
 
        function doFunction()
        { 
            var id = $(event.target).prev().text();
            alert(id);
            
            $.ajax({
                type:'POST',
                data:id,
                url:'deleteProduct.php',
                success: function(){}
            });
        }

        
</script>

<script>

</script>
