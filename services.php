<?php
    require "index.php";
    include "session.php";

    if(!isset($_SESSION['admin'])){
        header('Location: Log in.php');
    }

?>
<html>
    <head>
        <title>
            Services 
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
        #btn_submit{
            margin-top: 10px;
        }
        #addService{
            margin-top: 10px;
            
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
                    <strong><h3> Services </h3></strong>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-3'>
                    <button id='insert' class='btn btn-success' data-toggle="modal" data-target="#myModal"> <span class='glyhpicon glyphicon-plus'>Add new product</span> </button>
                </div>
            </div>
              <div id="myModal" class="modal fade" role="dialog">
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" id='addService'>Add Service</h4>
                        </div>
                        <div class='modal-body'>
                                NAME: <input type="text" id="NAME" name="NAME"  class='form-control' required>
                                PRICE: <input type="text"  id= "PRICE"name="PRICE" class='form-control'required>
                                SERVICE TYPE:<select id='Type' class='form-control'>
                                <option value='Haircut'>Haircut</option>
                                <option value='Massage'>Massage</option>
                                <option value='Shave'>Shave</option>
                                <option value='Hair Treatment'>Hair Treatment</option>
                                <option value='Grooming'>Grooming</option>
                            </select>
                            <input type="submit"  id="btn_submit" name="submit" value="Confirm" class='btn btn-success'>                
                        </div>
                        <div class='modal-footer'>
            
                        </div>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-10'>
                    <table class='table table-hover'>
                        <tbody id='output'>
                            <tr>
                                <th>
                                    <strong> Name </strong> 
                                </th>
                                <th>
                                    <strong> Type </strong> 
                                </th>
                                <th>
                                    <strong> Price </strong>
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
    $(document).ready(function(){
         serviceList();
    });
</script>

<script>
    var prices = [];
    var names = [];
    var tr='';
    
    function serviceList(){
            $.ajax({
                type:'POST',
                data:{g:'get'},
                url:'manageServices.php',
                dataType:'JSON',
                success: function(data){
                    console.log(data);
                    for(ctr=0;ctr<data.length;ctr++){
                        prices[ctr] = data[ctr].ServicePrice;
                        names[ctr] = data[ctr].serviceName;
                        tr +=
                            '<tr><td>'
                            +data[ctr].serviceName
                            +'</td><td>'
                            +data[ctr].serviceType
                            +'</td><td>'
                            +data[ctr].ServicePrice
                            +'</td><td hidden>'
                            +data[ctr].serviceID
                            +'</td><td>'
                            +'<input  id="edit" type="button" value="edit"/>'
                            +'</td><td>'
                            +'<input  id="delete" type="button" value="delete" class="hidden"/>'
                            +'</td><td>'
                            +'<input  id="submit" type="button" value="submit" class="hidden"/>'
                            +'</td></tr>';
                    }
                    $('#output').append(tr);
                    
                }    

            });
    }
    
    $('#output').on('click', '#delete', function(){
            var id = $(this).parent().prev().prev();
            var idVal = $(id).text();

            $(event.target).parent().prev().prev().text();    
            $(event.target).parent().parent().fadeOut('slow');
            
            $.ajax({
                type:'POST',
                data:{id : idVal},
                url:'manageServices.php',
                success: function(){}
            });
    
    });
    
    $('#output').on('click', '#edit', function(){
        var price = $(this).parent().prev().prev();
        var pVal  = $(price).text();
        
        $(price).html("<input value="+pVal+"></input>");
        
        var type = $(price).prev();
        var typeVal  = $(type).text();
        
        $(type).html("<input value="+typeVal+"></input>");
        
        var name = $(type).prev();
        var nVal = $(name).text();
        
        $(name).html("<input value='"+nVal+"'></input>");
        
        var del = $(this).parent().next();
        $(del).html('<input id="delete" type="button" value="delete"></input>');
        
        var sub = $(this).parent().next().next();
        $(sub).html('<input id="submit" type="button" value="submit"></input>');
    });

    $('#output').on('click','#submit', function(){
        var sub = $(this).parent();
        var del = $(sub).prev();
        
        var id    = $(this).parent().prev().prev().prev();
        var idVal = $(id).text();
        
        var price = $(id).prev();
        var pVal  = $(price).children().val();
        
        var type = $(price).prev();
        var typeVal  = $(type).children().val();
        
        var name  = $(id).prev().prev().prev();
        var nVal  = $(name).children().val();
        
        $.ajax({
            type:'POST',
            url:'manageServices.php',
            data: {
                n : nVal,
                p : pVal,
                t : typeVal,
                i : idVal
            },
            success:function(){
                $(name).html('<td>'+nVal+'</td>');
                $(type).html('<td>'+typeVal+'</td>');
                $(price).html('<td>'+pVal+'</td>');
                $(sub).html('<td><input  id="submit" type="button" value="submit" class="hidden"/></td>');
                $(del).html('<td><input  id="delete" type="button" value="delete" class="hidden"/></td>');
            }
        });  
    });
    
     $("#btn_submit").click(function(){
        if($('#NAME').val()!='' ){
            $.ajax({
                type:'POST',
                data: {name:$('#NAME').val(), price:$('#PRICE').val(), type:$('#Type option:selected').text()},
                dataType: "JSON",
                url:'manageServices.php',
                success:function(data){
                    alert("Succesfully added product");
                    var id = data;
                    $('#myModal').modal('hide');
                    var sr = '<tr><td>'
                            +$('#NAME').val();
                            +'</td><td>'
                            +$('#Type option:selected').val();
                            +"</td><td>"
                            +$('#PRICE').val();
                            +"</td><td class='hidden'>"
                            +id+"</td><td><input id='edit' type='button' value='edit'></td><td><input type='button' id='delete' class='hidden'></td><td><input type='button' id='submit' class='hidden'></td></tr>";
                    $('#output').append("<tr><td>");
                    $('#NAME').val('');
                    $('#PRICE').val('');
                    $('#TYPE').val('');
                }
            });        
        }
    });

</script>