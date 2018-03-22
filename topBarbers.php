<html>
    <head>
        <title>
            Top Barbers
        </title>
        <link rel='stylesheet' href='css/bootstrap.css'>
        
        <script src='jquery-3.2.1.min.js'></script>
        <script src='bootstrap.js'></script>
        
    </head>
    <body>
        <div class='container-fluid'>
            <div id='graph'>
            
            </div>
        </div>
    </body>
</html>

<script>
    var Name  = [];
    var Count = [];
    var arr = new Array();
    
    $(document).ready(function(){
        $.ajax({
            type:'POST',
            data:{data:'get'},
            url:'Barberperformance.php',
            dataType:'JSON',
            success: function(data){
                $.each(data,function(i){
                        
                        Name.push(data[i].fName);
                        Count.push(parseInt(data[i].count));
                        //symbol.push(data[i].symbol);
                 });
                Chart(Name,Count);
                arr = data;
                console.log(data);
                console.log(Name);
                console.log(Count);
            }
        });
    })
</script>
<script src="code/highcharts.js"></script>
<script>
    function Chart (Name,Count){
        Highcharts.chart('graph', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Best Barbers'
                    },
                    xAxis: {
                        categories: Name,
                        title: {
                            text: 'Barbers'
                        },
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Count'
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
                            data: Count
                    }]
                });
            }
</script>    