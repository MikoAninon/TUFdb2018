<html>
    <head>
        <title> Test </title>
        <link rel='stylesheet' href='bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.css'>
        <script src='jquery-3.2.1.min.js'></script>
        <script src='bootstrap.min.js'></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>

        
    </head>
    <style>
        #con{
            margin-top: 35px;
        }
        .margTop{
            margin-top: 25px;
        }
    </style>
    <body>
       
        <div class='row' id='con'>
            <div class='col-md-4 col-md-offset-1'>
                <button class='btn btn-lg btn-danger' id='del'> Delete <span class='glyphicon glyphicon-trash'></span> </button>
                <button class='btn btn-lg btn-success' id='ed'> Edit <span class='glyphicon glyphicon-pencil'></span> </button>
                <div class='row'>
                    <div id='editDeleteSpace'>
                    </div>
                </div>
            </div>
            <div class='col-md-6 col-md-offset-5'>
                <table id='data-table' class='table table-bordered'>
                    <thead>
                        <th> ID </th>
                        <th> Name </th>
                        <th> Price </th>
                    </thead>
                    
                </table>
            </div>
        </div>
    </body>
    
</html>

<script>
    $(document).ready(function() {
     $('#data-table').DataTable({
            "bprocessing": true,
            "bpaginate" : true,
            "bserverSide": true,
            "ajax" : {
                "url" : "getProducts.php",
                "dataSrc":"",
                "type" : "GET"
            },
            "columns" : [
                { "data" : "prodID" },
                { "data" : "productName" },
                { "data" : "ProductPrice"}
            ]
    });
        
    
} );

</script>

<script>
    $("#del").click(function(){
        var tr = "<span class='margTop'>INPUT ID:</span><input class='form-control margTop' id='prodID'  type='text'/> <button class='btn btn-danger margTop'> Confirm </button>";
        $('#editDeleteSpace').html(tr);    
    });
    $('#editDeleteSpace').on('keyup','#prodID',function(){
        var id = $('#prodID');
        var idVal = $(id).val();
        console.log(id);
        if(isNaN(idVal)){
            console.log("not a num");
        }
//        $.ajax({
//            url:,
//            type:'',
//            data:{ : },
//            success:function(){}   
//        })
    })
</script>
