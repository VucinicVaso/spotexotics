<?php include "includes/header.php"; ?>

<?php
	if(isset($_GET['brand_id'])){
		$brand_id = $_GET['brand_id'];
		$brand = $crud->find("brand", 'id', $brand_id);
		if(!empty($brand)){
			$spots = $post->selectAllByBrand($brand_id);
		}else{
			$function->redirect("error.php");
		}
	}else {
		$function->redirect("error.php");
	}
?>
	<div class="row">
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 my-5">
			<h2 class="text-white"><?php echo $brand->brand; ?> SPOTS</h2>
			<div class="row">
				<?php foreach($spots as $spot) { ?>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 my-2">
					<div class="card">
						<div class="card-body p-0">
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
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 my-5">
			<!-- sidebar -->
			<?php include "includes/sidebar.php" ?>
		</div>

	</div>


<?php include "includes/footer.php"; ?>
