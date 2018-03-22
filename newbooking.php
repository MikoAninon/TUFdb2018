<?php 
    
    include "session.php";


    if (isset($_SESSION['id'])){
        $fN = $_SESSION['fName'];
        $MI = $_SESSION['MI'];
        $lN = $_SESSION['lName'];
    } else {
        header('Location:login.php');
    }

    $query="SELECT address FROM branch";
    $res=mysqli_query($conn,$query);
?>
<html>
    <head>
        <title>
            Booking
        </title>
        <link rel='stylesheet' href='bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.css'>
        <script src='jquery-3.2.1.min.js'></script>
        <script src='bootstrap.min.js'></script>
    </head>
    <style>
        #navBar{
            height:70px;
            background-color: black;
        }
        #logo{
            margin-top:10px;
            height:50px;
        }
        .btnEdit{
            margin-top:10px;
            background-color: black !important;
            color:white !important;
            height:50px;
        }
        .border{
            border: 1px solid black;
            width:800px;
            height:400px;
        }
        .btn-danger{
            background-color: darkred;
            border-color: darkred;
        }
        #profileContent{
            margin-top:25px;
        }
    </style>
    <body>
        <div class='container-fluid'>
            <div class='row' id='navBar'>
                <div class='col-md-1'>
                    
                </div>
                <div class='col-md-4 col-md-offset-4'>
                    <a href='TUFHOME.php'><img src='images/logo-overdark.png' id='logo'></a>
                </div>
                <div class='col-md-1'>
                    <form method='POST' action='session.php'>
                        <a href='login.php'><button class="btn btn-default btn-block btnEdit" name='Logout'>Log out</button></a>
                    </form>
                </div>
            </div>
            
        </div>
        <div class='container-fluid'>
            <h3><strong> Booking </strong></h3>
            <div class='col-md-4'>

                <?php   

                        echo "<select id='test' class='form-control'>";    
                        echo "<option>Select Branch</option>";
                        while($arr = mysqli_fetch_assoc($res)){
                            echo "<option>".$arr['address']."</option>";

                        }
                        echo "</select>"; 

                ?>
                <div class='row' style='margin-top:15px;'>
                    <div class='col-md-12' id='bs'></div>
                    <div class='col-md-12' id='bss'></div>
                    <div class='col-md-12' id='bsss'></div>
                </div>    
            </div>
            <div class='col-md-4 col-md-offset-1'>
                
                <div id='graph'>
                
                </div>
            </div>
        </div>    
    </body>
</html>
<script>
    var Year  = [];
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
                        
                        
                        Count.push(parseInt(data[i].count));
                        Year.push(data[i].year);
                        //symbol.push(data[i].symbol);
                 });
                Chart(Year,Count);
                arr = data;
            }
        });
    })
    
    
    $('#test').on('change',function(){
        var selected = $(this).val();
        var barb = new Array();
        var ap ='';
        var op ='';
        var blg='';
        
        $.ajax({
            type:'POST',
            url:'barb.php',
            data:{br:selected},
            dataType:'JSON',
            success:function(data){
                barb = data;
                ap = '<select id="suway" class="form-control">';
                blg = '<option>Select Barber</option>';
                
                for(var x=0;x<barb.length;x++){
                    op+='<option>'+barb[x]+'</option>';
                }
                ap += blg;
                ap += op;
                ap += '</select>';
                $('#bs').html(ap);
                //second function------------------------
                 $('#suway').on('change',function(){
                   var bname = $('#suway').val();
                 //console.log(bname);
                     $.ajax({

                         type : 'POST',
                         url : 'getsched.php',
                         data : {sc:bname},
                         dataType : 'JSON',
                         success:function(sched){
                             
                             //console.log(sched);
                             var schedule = "<strong>Barber's schedules for today:</strong>";
                             var schedulearr=new Array();
                             var p='';
                             schedulearr = sched;
                             for(var x=0;x<schedulearr.length;x+=2){
                                 p+='<p>'+schedulearr[x]+'-'+schedulearr[x+1]+'</p>';
                             }
                             schedule+=p;
                             //console.log(schedule);
                             $('#bss').html(schedule);
                             
                             //last f---------------------------
                             var schedml = "<strong>Input a booking schedule:</strong><input id='time' type='time' class='form-control'>";
                             var bookbutton="<button type='button' id='book' class='btn btn-success form-control' style='margin-top:5px'>Book<span class='glyphicon glyphicon-ok'></span></button>";
                             var seshid = <?php echo $_SESSION['id']; ?>;
                                //console.log(seshid);
                                schedml+=bookbutton;
                                $('#bsss').html(schedml);   
                                $('#book').on('click',function(){ 
                                var getdate = $('#time').val();
                                
                                    $.ajax({
                                        type : 'POST',
                                        url : 'schedcheck.php',
                                        data : {gt : getdate, bn : bname, sh: seshid,br:$('#test option:selected').val()},
                                        success:function(schedcheck){
                                          alert(schedcheck);
                                        }
                                    });

                             });
                         }
                 });
            });
        }
        
            
            
            
     });
    });        
</script>


<script src="code/highcharts.js"></script>
<script>
    function Chart (Year,Count){
        Highcharts.chart('graph', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Bookings For Each Year'
                    },
                    xAxis: {
                        categories: Year,
                        title: {
                            text: 'Year'
                        }
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
                            name:'No. of bookings',
                            data: Count
                    }]
                });
            }
</script>    

