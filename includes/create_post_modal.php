<!-- The Post Modal -->
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['create_post']){

	$brand    = $function->checkInput($_POST['brand']);
	$model    = $function->checkInput($_POST['model']);
	$city     = $function->checkInput($_POST['city']);
	$country  = $function->checkInput($_POST['country']);
	$user_id  = $function->checkInput($_POST['user_id']);

	/* upload images */
	$files_arr = $function->reArrayFiles($_FILES['file']);
	foreach($files_arr as $filename){
		$data[] = $function->uploadImage($filename);
	}

	$spotted_in = ucfirst($city).",".ucfirst($country);

	$create = $crud->create("posts", array('brand' => $brand, 'model' => $model, 'spotter' => $user_id, 'images' => json_encode($data), 'city' => $city, 'country' => $country, 'views' => 0, 'total_votes' => 0, 'daily_votes' => 0));

	if($create) {
		$message = "Post created successfully!";
	}
}
?>

<div class="modal" id="newPost">
	<div class="modal-dialog">
		<div class="modal-content">

		<!-- Modal Header -->
		<div class="modal-header">
			<h4 class="modal-title">Create</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>

		<!-- Modal body -->
		<div class="modal-body">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="row">
						<div class="col-md-6 col-sm-12">	
							<?php $brands = $crud->selectAll('brand', '', ''); ?>
							<label for="title">BRAND:</label>
							<select name="brand" class="form-control select_brand" onclick="selectBrand()">
								<option></option>
								<?php foreach($brands as $brand) { ?>
								<option value="<?php echo $brand->id; ?>"><?php echo $brand->brand; ?></option>
								<?php } ?>
							</select>						
						</div>
						<div class="col-md-6"> 
							<?php /* $types = $crud->selectAll('types', '', ''); */ ?>
							<label for="model">MODEL:</label>
							<select name="model" id="model" class="form-control">
								<!-- select type by brand with js -->
							</select>							
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<label for="city">City:</label>
							<input type="text" name="city" class="form-control" id="city" required>
						</div>
						<div class="col-md-6 col-sm-12">
							<label for="country">Country:</label>
							<input type="text" name="country" class="form-control" id="country" required>
						</div>
					</div>
				</div>	
				<div class="form-group">
					<label for="file">IMAGES: (5)</label>
					<label class="btn btn-info w-100">UPLOAD
						<style type="text/css">
							input[type="file"] {
							    display: none;
							}
						</style>
						<input type="file" name="file[]" id="file" multiple />	
					</label>
				</div>
				<input type="hidden" name="user_id" value="<?php echo $_SESSION['userdata']['id']; ?>">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<input type="submit" name="create_post" value="CREATE" class="btn btn-info w-100 mt-1 mb-2">
					</div>
					<div class="col-md-6 col-sm-12">
						<button type="button" class="btn btn-danger w-100" data-dismiss="modal" id="exit">Close</button>
					</div>
				</div>
			</form>
		</div>

		<!-- Modal footer -->
		<?php if(isset($message)) { ?>
		<div class="modal-footer">
			<div id="post_msg">
				<?php echo "<script> $('#newPost').modal('show'); </script>";  ?>
				<div class="alert alert-info">
					<p class="text-center"><?php print_r($message); //echo $message; ?></p>
				</div>
			</div>
		</div>
		<?php } ?>

		</div>
	</div>
</div>

<script type="text/javascript">
	function selectBrand(){
		let select_brand_by_id = $(".select_brand").val();
		let model              = $("#model");

		$.get(`${ADDRESS}core/ajax/model_list.php`, {brand: select_brand_by_id}, function(data){
			if(data != "error"){
				let models = data.models;
				let list = "";
				models.forEach(function (model) {
					list += "<option value='" + model['id'] + "'>" + model['model'] + "</option>";
				});
				model.html(list);
			}
		});
	}
</script>