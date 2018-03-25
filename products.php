<?php
    include"session.php";

    if(!isset($_SESSION['admin'])){
        header('location:TUFHOME.php');
    }
?>
<html>
    <head>
        <title>
            Products 
        </title>
        <link rel='stylesheet' href='bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.css'>
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
        #productTable{
            margin-top: 15px;
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
                        Add new Product<span class='glyhpicon glyphicon-plus'></span>
                    </button>
                <!--    <button id='deleteAll' class='btn btn-danger'>
                        <span> Delete All Products </span>
                    </button> -->
                    
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
                    
                    <table class='table table-hover' id='productTable'>
                        <tbody id='output'>
                            <tr>
                                <th>
                                    <strong> Name </strong> 
                                </th>
                                <th>
                                    <strong> Quantity </strong> 
                                </th>
                                <th>
                                    <strong> Price </strong> 
                                </th>
                                <th>
                                    <strong> Edit </strong> 
                                </th>
                                <th>
                                    <strong> Delete </strong> 
                                </th>
                                <th id='subSpace'>
                                    <strong class='hidden'> Submit </strong> 
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
                            +data[ctr].productName
                            +'</td><td>'
                            +data[ctr].Quantity
                            +'</td><td>'
                            +data[ctr].ProductPrice
                            +'</td><td hidden>'
                            +data[ctr].prodID
                            +'</td><td>'
                            +'<button id="edit" class="btn"><span class="glyphicon glyphicon-pencil"></span></button>'
                            +'</td><td>'
                            +'<button id="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>'
                            +'</td><td>'
                            +'<button id="submit" class="btn btn-success hidden"><span class="glyphicon glyphicon-check"></span></button>'
                            +'</td></tr>';
                    }
                    $('#output').append(tr);
                    
                }    

            });
    }   
    
//    $('#deleteAll').click(function()
//    {
//            
//            $(event.target).nextAll().fadeOut('slow');
//            $.ajax({
//                type:'POST',
//                data:{reqAll : 'delAll'},
//                url:'deleteProduct.php',
//                success: function(data){}
//            });
//         
//    });
    
    $('#output').on('click', '#delete', function(){
            var id = $(this).parent().prev().prev();    
            var iVal = $(id).text();
        
            var quantity = $(id).prev().prev();
            var qVal = $(quantity).text();
            
            console.log(qVal);
        
            if(qVal!=0){
                alert("Items with available stocks cannot be deleted.");
            } else {
                $(this).parent().parent().fadeOut('slow');
                $.ajax({
                    type:'POST',
                    data:{id : iVal},
                    url:'manageProducts.php',
                    success: function(data){
                        alert(data);
                    }
                });
            }
        
    });
    
    
    
    $('#output').on('click', '#edit', function(){
            var id = $(this).parent().prev();
            var idVal = $(id).text();
        
            var price = $(id).prev();
            var pVal = $(price).text();
        
            $(price).html("<input type='text' value='"+pVal+"'>");
        
            var quantity = $(price).prev();
            var qVal = $(quantity).text();
            
            $(quantity).html("<input type='text' value='"+qVal+"'>");
        
            var name = $(quantity).prev();
            var nVal = $(name).text();
                
            $(name).html("<input type='text' value='"+nVal+"'>");
        
            var submit = $(this).parent().next().next();
            $(submit).children().removeClass('hidden');
                
            $('#subSpace').children().removeClass('hidden');
    });
    
    $('#output').on('click', '#submit', function(){
            
            var submit = $(this).parent();
            
            var id = $(this).parent().prev().prev().prev();
            var iVal = $(id).text();
        
            var price = $(id).prev();
            var pVal = $(price).children().val();
        
            var quantity = $(price).prev();
            var qVal = $(quantity).children().val();
        
            var name = $(quantity).prev();
            var nVal = $(name).children().val();
            
            if(!isNaN(pVal) && !isNaN(qVal) && pVal >= 0 && qVal >=0){
                $.ajax({
                    type:'POST',
                    url:'manageProducts.php',
                    data: {
                        n : nVal,
                        p : pVal,
                        i : iVal,
                        q : qVal
                    },
                    success:function(data){
                        alert(data);
                        $(name).html("<td>"+nVal+"</td>");
                        $(quantity).html("<td>"+qVal+"</td>");
                        $(price).html("<td>"+pVal+"</td>");
                        $(submit).children().addClass('hidden');
                        $('#subSpace').children().addClass('hidden');
                    }
                });
            } else if (isNaN(pVal) && isNaN(qVal)) {
                var alertMessage = (isNaN(pVal))? "invalid price input" : "invalid quality input";
                
                alertMessage = (isNaN(pVal) && isNaN(qVal))? "Invalid price and quantity input" : firstMessage;
                    
                alert(alertMessage);
            } else {
                var alertMessage = (pVal < 0)? "Negative price input!" : "Negative Quantity Input";
            
                alert(alertMessage);
            }
    });
    
    $("#btn_submit").click(function(){
            if($('#NAME').val()!='' ){
                if(isNaN(parseInt($('#PRICE').val()))){
                    alert('Invalid price input');
                } else {
                    $.ajax({
                        type:'POST',
                        data: {name:$('#NAME').val(), price:$('#PRICE').val(), type:$('#Type option:selected').text()},
                        dataType: "JSON",
                        url:'insertIntoProducts.php',
                        success:function(data){
                            alert("Succesfully added product");
                            var id = data;
                            $('#myModal').modal('hide');

                            var tr = "<tr><td>"
                                    +$('#NAME').val()
                                    +"</td><td>"
                                    +"25"
                                    +"</td><td>"
                                    +$('#PRICE').val()
                                    +"</td><td class='hidden'>"
                                    +id
                                    +'</td><td>'
                                    +'<button id="edit" class="btn"><span class="glyphicon glyphicon-pencil"></span></button>'
                                    +'</td><td>'
                                    +'<button id="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>'
                                    +'</td><td>'
                                    +'<button id="submit" class="btn btn-success hidden"><span class="glyphicon glyphicon-check"></span></button>'
                                    +'</td></tr>';

                            $('#output').append(tr);

                            $('#NAME').val('');
                            $('#PRICE').val('');
                        }
                    });
            }
                
            }
    }); 
</script>

