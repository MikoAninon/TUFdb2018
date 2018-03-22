<?php
   
    require "index.php";

     include"session.php";

    if(isset($_SESSION['admin'])){
        $check = $_SESSION['admin'];
    }
?>
<html>
    <head>
        <title>
            Products 
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
                    <strong><h3> Products </h3></strong> 
                    <button id='insert' class='btn btn-success' data-toggle="modal" data-target="#myModal">
                        <span class='glyhpicon glyphicon-pencil'>Add new product</span>
                    </button>
                    <button id='deleteAll' class='btn btn-danger'>
                        <span> Delete All Products </span>
                    </button>
                    
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add Product</h4>
                                </div>
                                <div class='modal-body'>
                                    
                                        NAME: <input type="text" id="NAME" name="NAME"  class='form-control' required>
                                        PRICE: <input type="text"  id= "PRICE"name="PRICE" class='form-control'required>
                                        PRODUCT TYPE:<select id='Type' class='form-control'>
                                            <option value='apparel'>apparel</option>
                                            <option value='shoes'>shoes</option>
                                            <option value='hairproducts'>hairproducts</option>
                                        </select>
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
                                    <strong> Price </strong> 
                                </th>
                                <th>
                                    <strong> Name </strong> 
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
        productList(); 
        
        
        $.ajax({
            type:'POST',
            data: {ask : 'getData'},
            url: 'insertIntoProducts.php',
            success:function(data){
                
            }
        });
        $("#btn_submit").click(function(){
            if($('#NAME').val()!='' ){
                $.ajax({
                    type:'POST',
                    data: {name:$('#NAME').val(), price:$('#PRICE').val(), type:$('#Type option:selected').text()},
                    dataType: "JSON",
                    url:'insertIntoProducts.php',
                    success:function(data){
                        alert("Succesfully added product");
                        var id = data;
                        $('#myModal').modal('hide');
                        $('#output').append("<tr><td>"+$('#PRICE').val()+"</td><td>"+$('#NAME').val()+"</td><td class='hidden'>"+id+"</td><td><input id='edit' type='button' value='edit'></td><td><input type='button' id='delete' class='hidden'></td><td><input type='button' id='submit' class='hidden'></td></tr>");
                        $('#NAME').val('');
                        $('#PRICE').val('');
                    }
                });
            
                
            }
        });
    }); 
</script>

<script>
    var ctr = 0;
    var cData ;
    var prices = [];
    var names = [];
    var tr = '';
    var check = '';
    
    
    function productList(){
            $.ajax({
                type:'GET',
                url:'getProducts.php',
                dataType:'JSON',
                success: function(data){
                    console.log(data);
                    for(ctr=0;ctr<data.length;ctr++){
                        prices[ctr] = data[ctr].ProductPrice;
                        names[ctr] = data[ctr].productName;
                        tr +=
                            '<tr><td>'
                            +data[ctr].ProductPrice
                            +'</td><td>'
                            +data[ctr].productName
                            +'</td><td hidden>'
                            +data[ctr].prodID
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
    
    $('#deleteAll').click(function()
    {
            
            $(event.target).nextAll().fadeOut('slow');
            $.ajax({
                type:'POST',
                data:{reqAll : 'delAll'},
                url:'deleteProduct.php',
                success: function(data){}
            });
         
    });
    
    $('#output').on('click', '#delete', function(){
            var id = $(event.target).parent().prev().prev().text();    
            $(event.target).parent().parent().fadeOut('slow');
            $.ajax({
                type:'POST',
                data:{id : id},
                url:'deleteProduct.php',
                success: function(data){}
            });
    });
    
    
    
    $('#output').on('click', '#edit', function(){
            var prodName = $(this).parent().prev().prev();
            var nameCol = $(prodName).text();

            $(prodName).html("<input type='text' value='"+nameCol+"'>");
            
            var prodPrice = $(this).parent().prev().prev().prev();
            var priceCol = $(prodPrice).text();
            $(prodPrice).html("<input type='text' value='"+priceCol+"'>");
        
            var del = $(this).parent().next();
            $(del).html('<input  id="delete" type="button" value="delete" />');
            
            var submit = $(this).parent().next().next();
            $(submit).html('<input  id="submit" type="button" value="submit"/>');
            
    });
    
    $('#output').on('click', '#submit', function(){
            var sub = $(this).parent();
            var del = $(this).parent().prev();
        
            var name = $(this).parent().prev().prev().prev().prev();
            var nVal = $(name).children().val();
        
            var price= $(this).parent().prev().prev().prev().prev().prev();
            var pVal = $(price).children().val();
        
            var id = $(this).parent().prev().prev().prev();
            var iVal = $(id).text();

            $.ajax({
                type:'POST',
                url:'editProducts.php',
                data: {
                    n : nVal,
                    p : pVal,
                    i : iVal
                },
                success:function(data){
                    alert(data);
                    name.html("<td>"+nVal+"</td>");
                    price.html("<td>"+pVal+"</td>");
                    sub.html('<ionput  id="submit" type="button" value="submit" class="hidden"/>');
                    del.html('<input  id="delete" type="button" value="delete" class="hidden"/>');
                }
            });
    });
</script>

