<!-- create type form -->
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

  $type_error_message   = "";
  $type_success_message = "";

  $model    = $function->checkInput($_POST['model']);
  $brand_id = $function->checkInput($_POST['brand_id']);

  if(empty($model)){
    $model_error_message = 'Please enter model!';
  }else if($post->checkModel($model) === true) {
    $model_error_message = $model.' is already taken!';
  }

  if(empty($model_error_message)){
    $create = $crud->create('model', array('model' => $model, 'brand_id' => $brand_id));
    if($create){
      $model_success_message = $model." created successfully!";
    }
  }

}
?>

<!-- The type Modal -->
<div class="modal" id="newType">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">NEW MODEL</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="#" method="POST">     
          <div class="form-group">
            <label for="brand_id">Brand:</label>
            <select name="brand_id" class="form-control" required>
              <option></option>
              <?php $brands = $crud->selectAll('brand', '', ''); ?>
              <?php foreach($brands as $brand) { ?>
              <option value="<?php echo $brand->id ?>"><?php echo $brand->brand; ?></option>
              <?php } ?>
            </select>
          </div>               
          <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" class="form-control" required>
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
      <?php if(isset($model_error_message) && !empty($model_error_message)) {  ?>
      <script type="text/javascript">
        $('#newType').modal({
          backdrop: 'static',
          keyboard: true, 
          show: true
        }); 
      </script>
      <div id="login_msg" style="width: 100%;">
        <div class="alert alert-danger"><p class="text-center"><?php echo $model_error_message; ?></p></div>
      </div> 
      <?php }else {} ?>
      <?php if(isset($model_success_message) && !empty($model_success_message)) {  ?>
      <?php echo "<script> $('#newType').modal('show'); </script>";  ?>
      <div id="login_msg" class="w-100">
        <div class="alert alert-info"><p class="text-center"><?php echo $model_success_message; ?></p></div>
      </div> 
      <?php }else {} ?>
      </div>

    </div>
  </div>
</div>
