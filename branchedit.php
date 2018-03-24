<?php
    include"session.php";

    if(!isset($_SESSION['admin'])){
        header('location:TUFHOME.php');
    }

    $query = "SELECT * FROM branch";
    $res = mysqli_query($conn,$query);

?>
<html>
    <head>
        <title>
            Branchedit 
        </title>
        <link rel='stylesheet' href='css/bootstrap.css'>
        <script src='jquery-3.2.1.min.js'></script>
        <script src="bootstrap.js"></script>
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
                <div class='col-md-10'>
                    <strong><h3> Branches </h3></strong> 
                    <button id='insert' class='btn btn-success' data-toggle="modal" data-target="#myModal">
                        <span class='glyhpicon glyphicon-pencil'>Add new branch</span>
                    </button>
                   <a href='bestbranch.php'><button class='btn btn-success'>
                       <span > View Best Branches</span>
                    </button>
                    
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add Branch</h4>
                                </div>
                                <div class='modal-body'>
                                    
                                        ADDRESS: <input type="text" id="ADDRESS" name="ADDRESS"  class='form-control' required>
                                        <input type="submit"  id="btn_submit" name="submit" value="Add" class='btn btn-success'>
                                    
                                </div>
                                <div class='modal-footer'>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <table class='table table-hover'>
                        <tbody id='output'>
                            <tr>
                                <th>
                                    <strong> Address </strong> 
                                </th>
                                <th>
                                    <strong> Edit </strong> 
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    var tr = '';
    $(document).ready(function(){
        branchList(); 
        $("#btn_submit").click(function(){
            var ad = $('#ADDRESS').val();

            if($('#ADDRESS').val()!='' ){
                $.ajax({
                    type:'POST',
                    data: {
                        branch : ad
                    },
                    dataType: "JSON",
                    url:'insertintobranch.php',
                    success:function(data){
                        alert("Success!");
                        var id = data;
                        $('#myModal').modal('hide');
                        var tt =
                            '<tr><td>'
                            +$("#ADDRESS").val()
                            +'</td><td>'
                            +'<button id="edit" value="edit" class="btn"><span class=" glyphicon glyphicon-pencil"></span></button>'
                            +'</td><td>'
                            +'<input  id="delete" type="button" value="delete" class="hidden"/>'
                            +'</td><td>'
                            +'<input  id="submit" type="button" value="submit" class="hidden"/>'
                            +'</td></tr>';
                        $('#output').append(tt);
                        $("#ADDRESS").val('');
                    }
                });
            
                
            }
        });
        
        $('#output').on('click', '#delete', function(){
            var id = $(event.target).parent().prev().prev().text();    
            $(event.target).parent().parent().fadeOut('slow');
            $.ajax({
                type:'POST',
                data:{id : id},
                url:'deletebranch.php',
                success: function(data){}
            });
        });
        
        $('#output').on('click', '#edit', function(){
            var id = $(this).parent().prev();
            var idVal = $(id).text();
            
            var address = $(id).prev();
            var adVal = $(address).text();
            
            $(address).html("<input type='text' value='"+adVal+"'/>");
            
            var del = $(this).parent().next();
            var sub = $(del).next();
            
            $(del).html("<input value='delete' id='delete' type='button'/>");
            $(sub).html("<input value='submit' id='submit' type='button'/>")
        });
        
        $('#output').on('click', '#submit', function(){
            var sub = $(this).parent();
            var del = $(sub).prev();
            
            var id = $(this).parent().prev().prev().prev();
            var idval = $(id).text();
        
            var address = $(id).prev();
            var adval = $(address).children().val();
            
            console.log(idval + adval);
            $.ajax({
                type:'POST',
                url:'editbranch.php',
                data: {
                    a : adval,
                    i : idval
                },
                success:function(data){
                    alert(data);
                    address.html("<td>"+adval+"</td>"); 
                    sub.html('<input  id="submit" type="button" value="submit" class="hidden"/>');
                    del.html('<input  id="delete" type="button" value="delete" class="hidden"/>');
                }
                
            });
        });
        //});
        
        
        function branchList(){
            $.ajax({
                type:'GET',
                url:'getbranch.php',
                dataType:'JSON',
                success: function(data){
                    console.log(data);
                    for(ctr=0;ctr<data.length;ctr++){
                        tr +=
                            '<tr><td>'
                            +data[ctr].address
                            +'</td>'
                            +'<td hidden>'
                            +data[ctr].branchID
                            +'</td><td>'
                            +'<input  id="edit" type="button" value="edit"/>'
                            +'</td><td>'
                            +'<input  id="delete" type="button" value="delete" class="hidden"/>'
                            +'</td><td>'
                            +'<input  id="submit" type="button" value="submit" class="hidden"/>'
                            +'</td></tr>';
                    }
                    $('#output').append(tr);
                    console.log(tr);
                }    

            });
        } 
});
</script>        
