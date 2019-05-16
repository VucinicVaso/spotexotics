<script type="text/javascript">
	function select_brand(){
		let select_brand = $(".select_brand_by_id").val();
		let show_model   = $(".show_model");

		$.get(`${ADDRESS}core/ajax/model_list.php`, {brand: select_brand}, function(data){
			if(data != "error"){
				let models = data.models;
				let model_list = "";
				models.forEach(function (model) {
					model_list += "<option value='" + model['id'] + "'>" + model['model'] + "</option>";
				});
				show_model.html(model_list);
			}
		});
	}
</script>

<form action="http://localhost/spotexotics/search.php" method="get" class="mt-1 mb-3">
	<div class="form-group">
		<?php $search_brands = $crud->selectAll('brand', '', ''); ?>
		<label for="brand" class="text-white">BRAND:</label>
		<select name="brand" class="form-control bg-dark text-white select_brand_by_id" onclick="select_brand()" required>
			<option></option>
			<?php foreach($search_brands as $brand) { ?>
			<option value="<?php echo $brand->id; ?>"><?php echo $brand->brand; ?></option>
			<?php } ?>
		</select>						
	</div>
	<div class="form-group">
		<label for="model" class="text-white">MODEL:</label>
		<select name="model" class="form-control bg-dark show_model text-white" required>
			<!-- select type by brand with js -->
		</select>
	</div>
	<input type="submit" name="search_spots" value="SEARCH" class="btn btn-primary w-100">
</form>
