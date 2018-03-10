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
                    <strong><h3> Products <input type='button' id='deleteMe' value='deleteAll' class='btn btn-danger'></h3></strong>
                    <div class='panel-group'>
                            <?php    
                                while($arr = mysqli_fetch_assoc($res)){
                                    echo "<div class='panel panel-default'>";
                                    echo "<div class='panel-body'>".$arr['productName']."<p>".$arr['ProductPrice']."</p></div>";
                                    echo "<span hidden>".$arr['prodID']."</span>";
                                    echo "<input id='deleteMe' type='button' value='delete' />";
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
    $(document).ready(function(){
        $(deleteMe).click(function()
        {
            if($(this).val() == 'deleteAll'){
                $(event.target).nextAll().fadeOut();
                $.ajax({
                    type:'POST',
                    data:{reqAll : 'delAll'},
                    url:'deleteProduct.php',
                    success: function(data){
                        alert(data);
                    }
                });
            } else if ($(this).val()== 'delete'){
                var id = $(event.target).prev().text();
                $(event.target).parent().fadeOut();
                $.ajax({
                    type:'POST',
                    data:{id : id},
                    url:'deleteProduct.php',
                    success: function(data){
                        alert(data);
                    }
                });
            }
        });
    }); 
</script>

<script>

</script>
