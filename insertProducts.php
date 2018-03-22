<!DOCTYPE HTML>
<html>
    <head>
        <title>
            product form
        </title>
        <link rel='stylesheet' src='css/bootstrap.css'>
    </head>
    <body>
        <div class='container-fluid'>
            <form method='POST'>
                NAME: <input type="text" id="NAME" name="NAME" required>
                PRICE: <input type="text"  id= "PRICE"name="PRICE" required>
                PRODUCT TYPE:<select id='Type'>
                    <option value='apparel'>apparel</option>
                    <option value='shoes'>shoes</option>
                    <option value='hairproducts'>hairproducts</option>
                </select>
                <input type="submit"  id="btn_submit" name="submit" value="Send">
            </form>
        </div>
        <div class='id'>
        </div>
    </body>
</html>

<script src='jquery-3.2.1.min.js'></script>
<script>
    $(document).ready(function()
                      
    {
        $.ajax({
            type:'POST',
            data: {ask : 'getData'},
            url: 'insertIntoProducts.php',
            success:function(data){
                
            }
        });
        $("#btn_submit").click(function(){
            $.ajax({
                type:'POST',
                data: {name:$('#NAME').val(), price:$('#PRICE').val(), type:$('#Type option:selected').text()},
                url:'insertIntoProducts.php',
                success:function(){
                    alert("Succesfully added product");
                }
            });
        });
        
    });
</script>
