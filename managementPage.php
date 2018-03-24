<?php
    include "session.php";

    if (!isset($_SESSION['admin'])){
        header('location:Log in.php');
    }
?>
<html>
    <head>
        <title>
            Management
        </title>
        <link rel='stylesheet' href='bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.css'>
        <script src='jquery-3.2.1.min.js'></script>
        <script src='bootstrap.min.js'></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>
        
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
        .dangerOverride{
            margin-top: 25px;
            background-color: darkred !important;
            color:white;
            border-color:darkred;
            width:100%;
        }
        #managementLinks{
            margin-top: 20px;
        }
        #content{
            margin-top: 15px;
        }
        .btnEdit{
            background-color: black !important;
            color:white !important;
            height:50px;
        }
        .margTop{
            margin-top:10px;    
        }
    </style>
    <body>
        <div class='container-fluid'  >
            <div class='row' id='navBar'>
                <div class='col-md-4 col-md-offset-5'>
                        <a href='TUFHOME.php'><img src='images/logo-overdark.png' id='logo'></a>
                        
                </div>
                <div class='col-md-1 col-md-offset-1 margTop'>
                    <form method='POST' action='session.php'>
                        <a href='login.php'><button class='btn btn-default btn-block btnEdit' name='Logout'>Log out</button></a>
                    </form>
                </div>
                
            </div>
            <div class='row' id='content'>
                <div class='col-md-4' id='managementLinks'>
                    
                    <a href='products.php'>
                        <button class='btn-lg btn btn-danger dangerOverride'>
                            Products
                        </button>
                    </a>
                                        
                    <a href='services.php'>
                        <button class='btn-lg btn btn-danger dangerOverride'>
                            Services
                        </button>
                    </a>
                
                    <a href='employees.php'>
                        <button class='btn-lg btn btn-danger dangerOverride'>
                            Employees
                        </button>
                    </a>
                    
                    <a href='branchedit.php'>
                        <button class='btn-lg btn btn-danger dangerOverride'>
                            Branches
                        </button>
                    </a>
                </div>
            
                <div class='col-md-6 col-md-offset-1'>
                    
                    <div id='chartSpace'>

                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
<script>
var Day  = [];
    var Count = [];
    var arr = new Array();
    
    $(document).ready(function(){
        $.ajax({
            type:'POST',
            data:{data:'get'},
            url:'schedCountGraph.php',
            dataType:'JSON',
            success: function(data){
                $.each(data,function(i){
                        
                        Day.push(data[i].day);
                        Count.push(parseInt(data[i].count));
                        //symbol.push(data[i].symbol);
                 });
                Chart(Day,Count);
                arr = data;
            }
        });
    })
</script>
<script src="code/highcharts.js"></script>
<script>
    function Chart (Day,Count){
        Highcharts.chart('chartSpace', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Overall TUF performance chart'
                    },
                    xAxis: {
                        categories: Day,
                        title: {
                            text: 'Dates'
                        },
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'No. of bookings'
                        },
                        stackLabels: {
                            enabled: true,
                            style: {
                                fontWeight: 'bold',
                                color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                            }
                        }
                    },
                    legend: {
                        align: 'right',
                        x: -30,
                        verticalAlign: 'top',
                        y: 25,
                        floating: true,
                        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                        borderColor: '#CCC',
                        borderWidth: 1,
                        shadow: false
                    },
                    tooltip: {
                        headerFormat: '<b>{point.x}</b><br/>',
                        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
                    },
                    plotOptions: {
                        column: {
                            stacking: 'normal',
                            dataLabels: {
                                enabled: true,
                                color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                            }
                        }
                    },
                    series: [{
                            name:'Volume',
                            data: Count,
                            color: "darkred"
                    }]
                });
            }
</script>