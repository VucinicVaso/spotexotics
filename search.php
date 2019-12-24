<?php include "includes/header.php"; ?>
	
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search_spots'])){
			$brand = $function->checkInput($_GET['brand']);
			$model = $function->checkInput($_GET['model']);

			$spot_brand = $crud->find("brand", 'id', $brand);
			$spot_model = $crud->find("model", 'id', $model);
			
			$search_spots = $post->postsByBrandAndModel($brand, $model);
		}else{
			$function->redirect('error.php');
		}
	?>

	<div class="row">
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 mt-5 mb-5">
			<h2 class="text-center text-white"><?php echo $spot_brand->brand." ".$spot_model->model; ?> SPOTS</h2>

			<div class="row">
		<?php if(!empty($search_spots)) { ?>
			<?php foreach($search_spots as $spot) { ?>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-2 mb-2">
					<div class="card">
						<div class="card-body">
							<a href="<?php echo BASE_URL; ?>/spot.php/?spot_id=<?php echo $spot->id; ?>">
								<img src="<?php echo BASE_URL; ?>/<?php echo json_decode($spot->images)[0]; ?>" class="w-100" style="height: 200px;">
							</a>
							<p><a href="<?php echo BASE_URL; ?>/brand.php/?brand_id=<?php echo $spot->postBrand; ?>"><?php echo $spot->brand; ?></a> <a href="<?php echo BASE_URL; ?>/model.php/?model_id=<?php echo $spot->postModel; ?>"><?php echo $spot->model; ?></a></p>
							<div class="row" style="height: 35px;">								
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
									<p>
										<i class="far fa-user" style="font-size: 20px;"></i> 
										<a href="<?php echo BASE_URL; ?>/userspots.php?user_id=<?php echo $spot->spotter; ?>"><?php echo $spot->username; ?></a>
									</p>								
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
									<p class="float-right"><?php echo $function->timeAgo($spot->created_at); ?></p>
								</div>
							</div>
						</div>
					</div>					
				</div>
			<?php } ?>
		<?php } else { ?> 
			<p class="alert alert-danger text-center w-100">0 spots</p>			
		<?php }?>
			</div>
		</div>
		
		<?php include "includes/followus.php" ?>

	</div>

<?php include "includes/footer.php"; ?>