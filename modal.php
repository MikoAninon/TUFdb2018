
<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    
<style>
    #inputEdit{
        width:80%;
        margin-left:55px;
    }
    #btnEdit{
        margin-top:10px;
        margin-left:55px;
        width:80%;
    }
</style>
    
<body>

<div class="container">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
           <div class='row'>
                <form>
                    <label for='usr' id='inputEdit'> Username </label>
                    <input type='text' name='usr' class='form-control' id='inputEdit'> 
                    <label for='pwd' id='inputEdit'> Password </label>
                    <input type='text' name='pwd' class='form-control' id='inputEdit'>
                    <button class='btn btn-success form-control' id='btnEdit'> Login </button> 
               </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>
