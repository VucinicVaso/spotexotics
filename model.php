<?php include "includes/header.php"; ?>

<?php
	if(isset($_GET['model_id'])){
		$model_id = $_GET['model_id'];
		$model = $crud->find("model", 'id', $model_id);
		if(!empty($model)){
			$spots = $post->selectAllByModel($model_id);
		}else{
			$function->redirect("error.php");
		}
	}else {
		$function->redirect("error.php");
	}
?>
	<div class="row">
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 mt-5 mb-5">
			<h2 class="text-white"><?php echo $model->model; ?> SPOTS</h2>
			<div class="row">
				<?php foreach($spots as $spot) { ?>
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
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mt-5 mb-5">
			<?php $count_posts = $post->countPosts(); ?>
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<a href="<?php echo BASE_URL; ?>/spots.php/?page=1" class="btn bg-dark text-white w-100 mt-1"><?php echo $count_posts; ?> spots</a>				
				</div>	
			<?php $count_posts_by_day = $post->countPostsByDay(); ?>
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<a href="<?php echo BASE_URL; ?>/spots.php/?page=1" class="btn bg-dark text-white w-100 mt-1"><?php echo $count_posts_by_day; ?> spots in the last 24 hours</a>
				</div>	
			</div>
			<?php if($user->loggedIn()) { ?>
			<?php include "includes/create_post_modal.php"; ?>
			<button class="btn btn-info w-100 mt-1" data-toggle="modal" data-target="#newPost"><i class="fas fa-camera"></i> UPLOAD</button>
			<?php } else {} ?>

			<?php include "includes/followus.php" ?>
		</div>

	</div>


<?php include "includes/footer.php"; ?>
