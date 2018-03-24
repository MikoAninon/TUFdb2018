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
    </style>
    <body>
       
        <div class='row' id='con'>
            <div class='col-md-10 col-md-offset-1'>
                <table id='data-table' class='table table-bordered'>
                    <thead>
                        
                        <th> Service Name </th>
                        <th> Service Type </th>
                        <th> Service Price </th>
                        
                    </thead>
                </table>
            </div>
        </div>
    </body>
    
</html>

<script>
    $(document).ready(function(){
       
        $('#data-table').DataTable({
            "bprocessing": true,
            "bpaginate" : true,
            "bserverSide": true,
            "ajax" : {
                "url" : "getServices.php",
                "dataSrc":"",
                "type" : "GET"
            },
            "columns" : [
                { "data" : "serviceName" },
                { "data" : "serviceType"},
                { "data" : "ServicePrice"}
            ]
        });
    });
</script>
