
<html>
    <head>
        <title>
            Search
        </title>
        
    </head>
    
    <body>
        <input type='text' id='sBar'>
        <div id='output'>
        
        </div>
    </body>
</html>

<script src='jquery-3.2.1.min.js'></script>

<script>
    var tr;
    $(document).ready(function(){
        $('#sBar').on('keyup',function(){
            tr = '';
            var text = $('#sBar').val();
            $.ajax({
                url:'sProducts.php',
                type:'GET',
                data: {
                    s : text
                },
                success: function(data){
                    for(var x=0;x<data.length;x++){
                        tr += '<p>'+data[x].productName+'</p>'; 
                    }
                $('#output').html(tr);
                }
            }) 
        });
    })
</script>