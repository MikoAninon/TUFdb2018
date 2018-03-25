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
        .barberstrong{
            font-size: 20px;
            margin-top: 10px;
             
            
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
        <div class='container-fluid' id='bookCon'>
            <h3 class='barberstrong'><strong> Booking </strong></h3>
            <div class='col-md-4'>

                <?php   

                        echo "<select id='initbranch' class='form-control'>";    
                        echo "<option>Select Branch</option>";
                        while($arr = mysqli_fetch_assoc($res)){
                            echo "<option>".$arr['address']."</option>";

                        }
                        echo "</select>"; 

                ?>
                <div class='row' id='form' style='margin-top:15px;'>
                    <div class='col-md-12' id='barberselect'></div>
                    <div class='col-md-12' id='selectdate'></div>
                    <div class='col-md-12' id='barberschedule'></div>
                    <div class='col-md-12' id='inputsched'></div>
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
        
                 });
                Chart(Name,Count);
                arr = data;
                console.log(data);
                console.log(Name);
                console.log(Count);
            }
        });
    })
    
    
    $('#initbranch').on('change',function(){
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
                ap = '<select id="barbername" class="form-control">';
                blg = '<option>Select Barber</option>';
                
                for(var x=0;x<barb.length;x++){
                    op+='<option>'+barb[x]+'</option>';
                }
                ap += blg;
                ap += op;
                ap += '</select>';

                $('#barberselect').html(ap);
                //second function------------------------  
                     $('#barbername').on('change',function(){
                       var bname = $('#barbername').val();
                       var datesel = "<strong class='barberstrong'>Choose a booking date:</strong><input id='bookdate' type='date' class='form-control'></input>";
                         
                           
                        $('#selectdate').html(datesel);
                        
                         $('#bookdate').on('change',function(){
                             var selecteddate = $('#bookdate').val();

                            $.ajax({
                             type : 'POST',
                             url : 'getsched.php',
                             data : {sc:bname,bd:selecteddate},
                             dataType : 'JSON',
                             success:function(sched){
                                 var schedule = '<div class="barberstrong"><strong>'+bname+'`s '+ 'schedules for the selected date:</strong></div>';
                                 var tablestart = "<table class='table'><thead><tr><th>Time start</th><th>Time end</th></tr></thead><tbody>";
                                 var schedulearr=new Array();
                                 var timestartrow='';
                                 schedulearr = sched;
                                 
                                 console.log('sched'+schedulearr);
                                 for(var x=0;x<schedulearr.length;x+=2){
                                     timestartrow+='<tr><td>'+schedulearr[x]+'</td><td>'+schedulearr[x+1]+'</td></tr>';
                                 }
                                 schedule+=tablestart;
                                 schedule+=timestartrow;
                                 $('#barberschedule').html(schedule);

                                 //last f---------------------------
                                 var schedml = "<strong>Input a booking schedule:</strong><input id='time' type='time' class='form-control'>";
                                 var bookbutton="<button type='button' id='book' class='btn btn-success form-control' style='margin-top:5px'>Book<span class='glyphicon glyphicon-ok'></span></button>";
                                 var seshid = <?php echo $_SESSION['id']; ?>;
                                   
                                    schedml+=bookbutton;
                                    $('#inputsched').html(schedml);   
                                    $('#book').on('click',function(){ 
                                    var gettime = $('#time').val();  
                                     
                                        $.ajax({
                                            type : 'POST',
                                            url : 'schedcheck.php',
                                            data : {gt : gettime, bn : bname, sh: seshid,bd:selecteddate,br:$('#initbranch option:selected').val()},
                                            success:function(schedcheck){
                                                alert(schedcheck);                    
                                            }
                                        });

                                 });
                             }
                         });
                         });
                    });
        }
        
            
            
            
     });
    });        
</script>


<script src="code/highcharts.js"></script>
<script>
    function Chart (Name,Count){
        Highcharts.chart('graph', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Most Booked Barbers'
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
                            text: 'Amount of Bookings'
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
                            color: 'darkred'
                    }]
                });
            }
</script>