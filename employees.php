<?php
    require "index.php";

    $query = "SELECT * FROM employees";
    $query2 = "SELECT address FROM branch";

    $res = mysqli_query($conn,$query);
    $res2 = mysqli_query($conn,$query2);

    $pro = mysqli_query($conn,$query);
?>
<html>
    <head>
        <title>
            Employee Management
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
                    <strong><h3> Employees </h3></strong> 
                    <button id='insert' class='btn btn-success' data-toggle="modal" data-target="#myModal">
                        <span class='glyhpicon glyphicon-pencil'></span>
                    </button>
                    <a href='topBarbers.php'>
                        <button class='btn btn-success'>
                            <span>Best Performing Barbers</span>
                        </button>
                    </a>
                    
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add Employee</h4>
                                </div>
                                <div class='modal-body'>
                                    
                                        FIRST NAME: <input type="text" id="FNAME" name="FNAME"  class='form-control' required>
                                        MIDDLE INITIAL: <input type="text"  id= "MI" name="MI" class='form-control'required>
                                        LAST NAME: <input type="text" id="LNAME" name="LNAME"  class='form-control' required>
                                        ADDRESS: <input type="text" id="ADDRESS" name="ADDRESS"  class='form-control' required>
                                        BIRTHDATE: <input type="date" id="BDAY" name="bday"  class='form-control' required>
                                        GENDER:<select id='gender' class='form-control'>
                                            <option value='M'>Male</option>
                                            <option value='F'>Female</option>
                                        </select>
                                        EMPLOYEE TYPE:<select id='Type' class='form-control'>
                                            <option value='Barber'>Barber</option>
                                            <option value='Cashier'>Cashier</option>
                                            <option value='Salesperson'>Salesperson</option>
                                        </select>
                                        BRANCH:
                                       <?php  
                                          echo "<select id='branch' class='form-control'>";
                                          echo "<option>Select Branch</option>";
                                          while($arr = mysqli_fetch_assoc($res2)){
                                          echo "<option>".$arr['address']."</option>";
                                          }
                                          echo "</select>"; 
                                         ?>
                                        <input type="submit"  id="btn_submit" name="submit" value="Add" class='btn btn-success'>
                                    
                                </div>
                                <div class='modal-footer'>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Also chends this -->
                    <table class='table table-hover'>
                        <tbody id='output'>
                            <tr>
                                <th>
                                    <strong> First Name </strong> 
                                </th>
                                <th>
                                    <strong> Middle Initial </strong> 
                                </th>
                                <th>
                                    <strong> Last Name </strong> 
                                </th>
                                <th>
                                    <strong> Residence </strong> 
                                </th>
                                <th>
                                    <strong> Type </strong> 
                                </th>
                                <th>
                                    <strong> Branch </strong> 
                                </th>
                                <th>
                                    <strong> Branch </strong> 
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
        employeeList(); 

        $("#btn_submit").click(function(){
            var id = $('#branch option:selected').val();
          
            if($('#FNAME').val()!='' ){
                $.ajax({
                    type:'POST',
                    data: {
                        fname:$('#FNAME').val(),         mi:$('#MI').val(),
                        lname:$('#LNAME').val(),
                        res:$('#ADDRESS').val(),
                        bday:$('#BDAY').val(),
                        gender:$('#gender').val(),
                        type:$('#Type option:selected').val(),
                        branch : $('#branch option:selected').val()
                    },
                    dataType: "JSON",
                    url:'insertintoemployee.php',
                    success:function(data){
                        alert("Success!");
                        var id = data;
                        $('#myModal').modal('hide');
                        tt +=
                            '<tr><td>'
                            +$("#FNAME").val();
                            +'</td><td>'
                            +$("#MI").val();
                            +'</td><td>'
                            +$("#LNAME").val();
                            +'</td><td>'
                            +$("#ADDRESS").val();
                            +'</td><td>'
                            +$("#BDAY").val();
                            +'</td><td>'
                            +$("#gender").val();
                            +'</td><td>'
                            +$("#Type option:selected").val();
                            +'</td><td hidden>'
                            +$("#branch option:selected").val();
                            +'</td><td>'
                            +'<button  id="edit" class="btn"><span class="glyphicon glyphicon-pencil"></span></button>'
                            +'</td><td>'
                            +'<input  id="delete" type="button" value="delete" class="hidden"/>'
                            +'</td><td>'
                            +'<input  id="submit" type="button" value="submit" class="hidden"/>'
                            +'</td></tr>';
                        $('#output').append(tt);
                        $("#FNAME").val('');
                        $("#MI").val('');
                        $("#LNAME").val('');
                        $("#ADDRESS").val('');
                        $("#BDAY").val('');
                        $("#Type").val('');
                        $("#branch").val('');
                        $("#gender").val('');
                        
                    }
                });
            
                
            }
        });
    }); 
</script>

<script>
    var ctr = 0;
    var cData ;
    var fname = [];
    var mi = [];
    var lastname = [];
    var tr = '';
    var check = '';
    
    
    function employeeList(){
            $.ajax({
                type:'GET',
                url:'getemployees.php',
                dataType:'JSON',
                success: function(data){
                    console.log(data);
                    for(ctr=0;ctr<data.length;ctr++){
                        tr +=
                            '<tr><td>'
                            +data[ctr].fName
                            +'</td><td>'
                            +data[ctr].MInitial
                            +'</td><td>'
                            +data[ctr].lName
                            +'</td><td>'
                            +data[ctr].Residence
                            +'</td><td>'
                            +data[ctr].employeetype
                            +'</td><td>'
                            +data[ctr].address
                            +'</td><td hidden>'
                            +data[ctr].employeeID
                            +'</td><td>'
                            +'<button id="edit" class="btn" value="edit"><span class="glyphicon glyphicon-pencil"></span></button>'
                            +'</td><td>'
                            +'<input  id="delete" type="button" value="delete" class="hidden"/>'
                            +'</td><td>'
                            +'<input  id="submit" type="button" value="submit" class="hidden"/>'
                            +'</td></tr>';
                    }
                    $('#output').append(tr);
                    console.log(tr);
                }    

            });
    }   
    
   
    $('#output').on('click', '#delete', function(){
            var id = $(event.target).parent().prev().prev().text();    
            $(event.target).parent().parent().fadeOut('slow');
            $.ajax({
                type:'POST',
                data:{id : id},
                url:'deleteemployee.php',
                success: function(data){}
            });
    });
    
    
    
    $('#output').on('click', '#edit', function(){
            var address = $(this).parent().prev().prev();
            var aT = $(address).text();
        
            
            $(address).html("<input type='text' value='"+aT+"'>");
        
            var employee = $(address).prev();
            var eT =   $(employee).text();
        
            $(employee).html("<input type='text' value='"+eT+"'>");
            
            var Residence = $(employee).prev();
            var RT = $(Residence).text();
        
            $(Residence).html("<input type='text' value='"+RT+"'>");
        
            var lName = $(Residence).prev();
            var lT = $(lName).text();

            $(lName).html("<input type='text' value='"+lT+"'>");
            
            var MI = $(lName).prev();
            var mT = $(MI).text();
        
            $(MI).html("<input type='text' value='"+mT+"'>");
            
            var fName=$(MI).prev();
            var fT = $(fName).text();
        
            $(fName).html("<input type='text' value='"+fT+"'>");
      
            var del = $(this).parent().next();
            $(del).html('<input  id="delete" type="button" value="delete" />');
          
            var submit = $(this).parent().next().next();
            $(submit).html('<input  id="submit" type="button" value="submit"/>');
            
    });
    
    $('#output').on('click', '#submit', function(){
            var sub = $(this).parent();
            var del = $(sub).prev();
        
            var id = $(this).parent().prev().prev().prev();
            var idval = $(id).text();
        
            var branch = $(id).prev();
            var branchval = $(branch).children().val();
        
            var emptype = $(branch).prev();
            var typeval = $(emptype).children().val();
            
            var residence = $(emptype).prev();
            var resval = $(residence).children().val();
        
            var lastname = $(residence).prev();
            var lval = $(lastname).children().val();
            
            var middleinit = $(lastname).prev();
            var mival = $(middleinit).children().val();
        
            var firstname = $(middleinit).prev();
            var fval = $(firstname).children().val();

            console.log(typeval);
            
            $.ajax({
                type:'POST',
                url:'editemployees.php',
                data: {
                    f : fval,
                    m : mival,
                    l : lval,
                    r : resval,
                    e : typeval,
                    b : branchval,
                    i : idval
                },
                success:function(data){
                    alert(data);
                    firstname.html("<td>"+fval+"</td>");
                    middleinit.html("<td>"+mival+"</td>");
                    lastname.html("<td>"+lval+"</td>");
                    residence.html("<td>"+resval+"</td>");
                    
                    emptype.html("<td>"+typeval+"</td>");
                    branch.html("<td>"+branchval+"</td>");
                    
                    sub.html('<input  id="submit" type="button" value="submit" class="hidden"/>');
                    del.html('<input  id="delete" type="button" value="delete" class="hidden"/>');
                }
                
            });
    });
</script>

