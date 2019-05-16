<!-- create brand form -->
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])){

  $error_message   = "";
  $success_message = "";

  $title = $function->checkInput($_POST['title']);

  if(empty($title)){
    $error_message = 'Please enter title!';
  }else if($post->checkBrand($title) === true) {
    $error_message = $title.' is already taken!';
  }

  if(empty($error_message)){
    $create = $crud->create('brand', array('brand' => $title));
    if($create){
      $success_message = $title." created successfully!";
    }
  }

}
?>

<!-- The create brand Modal -->
<div class="modal" id="newBrand">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">NEW BRAND</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="#" method="POST" id="create">         
          <div class="form-group">
            <label for="title">TITLE:</label>
            <input type="text" name="title" id="title" class="form-control" required>
          </div>
          <div class="row">
            <div class="col-md-6">
              <button type="submit" name="create" class="btn btn-info" style="width: 100%;">SUBMIT</button>
            </div>            
            <div class="col-md-6">
              <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 100%;">Close</button>
            </div>
          </div>        
        </form>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
      <?php if(isset($error_message) && !empty($error_message)) {  ?>
      <script type="text/javascript">
        $('#newBrand').modal({
          backdrop: 'static',
          keyboard: true, 
          show: true
        }); 
      </script>
      <div id="login_msg" class="w-100">
          <div class="alert alert-danger"><p class="text-center"><?php echo $error_message; ?></p></div>
      </div>
      <?php }else {} ?>
      <?php if(isset($success_message) && !empty($success_message)) {  ?>
      <?php echo "<script> $('#newBrand').modal('show'); </script>";  ?>
      <div id="login_msg" class="w-100">
          <div class="alert alert-info"><p class="text-center"><?php echo $success_message; ?></p></div>
      </div>
      <?php }else {} ?>
    </div>

    </div>
  </div>
</div>