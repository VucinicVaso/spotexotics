<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

  $error_message   = "";
  $success_message = "";

  $title = $function->checkInput($_POST['title']);
  $body  = $function->checkInput($_POST['body']);

  /* upload images */
  $files_arr = $function->reArrayFiles($_FILES['file']);
  foreach($files_arr as $filename){
    $data[] = $function->uploadImage($filename);
  }

  if(empty($type_error_message)){
    $create = $crud->create('news', array('title' => $title, 'body' => $body, 'images' => json_encode($data)));
    if($create){
      $success_message = $title." created successfully!";
    }
  }

}
?>

<!-- The type Modal -->
<div class="modal" id="news">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">NEWS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="#" method="POST" enctype="multipart/form-data">         
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="body">Body:</label>
            <textarea name="body" class="form-control"></textarea>
          </div>    
          <div class="form-group">
            <label for="images">IMAGES (3):</label>
            <input type="file" name="file[]" class="btn btn-info w-100" multiple>
          </div>     
          <div class="row">
            <div class="col-md-6">
              <button type="submit" name="submit" class="btn btn-info w-100">SUBMIT</button>
            </div>            
            <div class="col-md-6">
              <button type="button" class="btn btn-danger w-100" data-dismiss="modal">Close</button>
            </div>
          </div>        
        </form>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
    <?php if(isset($error_message) && !empty($error_message)) {  ?>
    <?php echo "<script> $('#newType').modal('show'); </script>";  ?>
    <div id="login_msg" style="width: 100%;">
        <div class="alert alert-danger"><p class="text-center"><?php echo $error_message; ?></p></div>
    </div> 
    <?php }else {} ?>
    <?php if(isset($success_message) && !empty($success_message)) {  ?>
    <?php echo "<script> $('#newType').modal('show'); </script>";  ?>
    <div id="login_msg" style="width: 100%;">
        <div class="alert alert-info"><p class="text-center"><?php echo $success_message; ?></p></div>
    </div> 
    <?php }else {} ?>
      </div>

    </div>
  </div>
</div>
