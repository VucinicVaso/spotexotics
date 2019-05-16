<?php include "includes/header.php"; ?>

	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">CAR BRANDS AND TYPES</a></li>
		<li class="breadcrumb-item active"></li>
		<!-- create brand and type -->
		<div class="row">
			<div class="col-md-6">
				<button class="btn btn-info" data-toggle="modal" data-target="#newBrand">NEW BRAND</button>
				<?php include "modals/create_brand_modal.php"; ?>
			</div>
			<div class="col-md-6">
				<button class="btn btn-info" data-toggle="modal" data-target="#newType">NEW TYPE</button>
				<?php include "modals/create_model_modal.php"; ?>
			</div>
		</div>
	</ol>

	<div class="row">

		<!-- search brands -->
		<?php $brands = $crud->selectAll('brand', '', ''); $count_brands = count($brands); ?>	
		<?php include "modals/view_brands_modal.php"; ?>
		<div class="col-md-6">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
					<i class="fas fa-fw fa-list"></i>
					</div>
					<div class="mr-5">(<?php echo $count_brands; ?>) BRANDS</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#" data-toggle="modal" data-target="#brandList">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>

		<!-- search types -->
		<?php $models = count($crud->selectAll('model', '', '')); ?>		
		<?php include "modals/view_model_modal.php"; ?>
		<div class="col-md-6">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
					<i class="fas fa-fw fa-list"></i>
					</div>
					<div class="mr-5">(<?php echo $models; ?>) Models</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#" data-toggle="modal" data-target="#typeList">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>

	</div>

<?php include "includes/footer.php"; ?>
