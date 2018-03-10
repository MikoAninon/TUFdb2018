<?php 
    include "session.php";

    if (isset($_SESSION['id'])){
        $fN = $_SESSION['fName'];
        $MI = $_SESSION['MI'];
        $lN = $_SESSION['lName'];
    } else {
        header('Location:login.php');
    }
?>
<html>
    <head>
        <title>
            Profile
        </title>
        <link rel='stylesheet' href='css/bootstrap.css'>
        <script src='bootstrap.min.js'></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                <div class='col-md-4 col-md-offset-5'>
                    <a href='TUFHOME.php'><img src='images/logo-overdark.png' id='logo'></a>
                </div>
                <div class='col-md-1'>
                    <form method='POST' action='session.php'>
                        <a href='login.php'><button class="btn btn-default btn-block btnEdit" name='Logout'>Log out</button></a>
                    </form>
                </div>
            </div>
            <div class='row' id='profileContent'>
                <div class='col-md-3'>
                    <span> Picture goes here </span>
                    <span> <h3> <?php echo $fN." ".$MI.". ".$lN; ?> </h3> </span>
                    <span> <button class='btn btn-danger form-control' data-toggle="modal" data-target="#myModal"> Book </button></span>
                </div>
                <div class='col-md-8'>
                          <!-- Modal -->
                          <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Select Branch</h4>
                                </div>
                                <div class="modal-body">
                                  <p>echo branch list here</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss='modal'>Cancel Booking </button>
                                </div>
                              </div>

                            </div>
                          </div>
                    <div class='border'>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


