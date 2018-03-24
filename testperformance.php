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
    var Day  = [];
    var Count = [];
    var arr = new Array();
    
    $(document).ready(function(){
        $.ajax({
            type:'POST',
            data:{data:'get'},
            url:'frequency.php',
            dataType:'JSON',
            success: function(data){
                $.each(data,function(i){
                        
                        Day.push(data[i].day);
                        Count.push(parseInt(data[i].count));
                        //symbol.push(data[i].symbol);
                 });
                Chart(Day,Count);
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
                        text: 'Overall TUF performance chart'
                    },
                    xAxis: {
                        categories: Name,
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
                            data: Count
                    }]
                });
            }
</script>    