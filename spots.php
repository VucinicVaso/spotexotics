<?php include "includes/header.php"; ?>

	<?php
		//pagination
		if(isset($_GET['page'])){
			$page = $_GET['page'];

			if($page === "" || $page === 1){
				$page1 = 0;
			}else {
				$page1 = ($page * 6) - 6;
			}			
			$spots = $post->paginatePosts($page1, 6);
		}else {
			$function->redirect('error.php');
		}
	?>

	<div class="row">

		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
			<h2 class="text-white">PHOTO SPOTS</h2>
			<div class="row">
				<?php if(!empty($spots)) { ?>
				<?php foreach($spots as $spot) { ?>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 pt-2 pb-2">
					<div class="card">
						<div class="card-body">
							<a href="<?php echo BASE_URL; ?>/spot.php/?spot_id=<?php echo $spot->id; ?>">
								<img src="<?php echo BASE_URL; ?>/<?php echo json_decode($spot->images)[0]; ?>" class="w-100" style="height: 200px;">
							</a>
							<p class="float-left">
								<a href="<?php echo BASE_URL; ?>/brand.php/?brand_id=<?php echo $spot->postBrand; ?>"><?php echo $spot->brand; ?></a> <a href="<?php echo BASE_URL; ?>/model.php/?model_id=<?php echo $spot->postModel; ?>"><?php echo $spot->model; ?></a>
							</p>
							<p class="float-right"><?php echo $spot->city.", ".$spot->country; ?></p>
						</div>
						<div class="card-footer">
							<p class="float-left">
								<i class="far fa-user" style="font-size: 20px;"></i>
								<a href="<?php echo BASE_URL; ?>/userspots.php/?user_id=<?php echo $spot->spotter; ?>">
								<?php echo $spot->username; ?>
								</a>
							</p>	
							<p class="float-right"><?php echo $function->timeAgo($spot->created_at); ?></p>								
						</div>
					</div>
				</div>
				<?php } ?>
				<?php }else{ ?>
				<button class="btn btn-warning w-100 text-center">0 spots.</button>
				<?php } ?>
			</div>
			
			<!-- pagination -->
			<div class="row justify-content-center mt-2 mb-2">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<nav aria-label="Page navigation example">
						<ul class="pagination justify-content-center">
					<?php
						$countSpots = count($crud->selectAll('posts', '', '')); 
						$count = $countSpots / 3;
						$count = ceil($count);
					?>
					<?php for($i = 1; $i <= $count; $i++){ ?>
						<li class="page-item"><a class="page-link" href="<?php echo BASE_URL; ?>/spots.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>	
						</ul>
					</nav>						
				</div>				
			</div>

		</div>

		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			<?php $count_posts = $post->countPosts(); ?>
			<div class="row mt-3 mb-2 text-center">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb-2">
					<a href="<?php echo BASE_URL; ?>/spots.php/?page=1" class="btn bg-dark text-white width-100" id="margin-top"><?php echo $count_posts; ?> spots</a>				
				</div>	
			<?php $count_posts_by_day = $post->countPostsByDay(); ?>
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
					<a href="<?php echo BASE_URL; ?>/spots.php/?page=1" class="btn bg-dark text-white width-100" id="margin-top"><?php echo $count_posts_by_day; ?> spots in the last 24 hours</a>
				</div>	
			</div>
			<!-- search spots form -->
			<?php include "includes/search.php"; ?>			
			<!-- if users loggedin show upload form -->
			<?php if($user->loggedIn()) { ?>
			<?php include "includes/create_post_modal.php"; ?>
			<button class="btn btn-info w-100 mt-1 mb-3" data-toggle="modal" data-target="#newPost"><i class="fas fa-camera"></i> UPLOAD</button>
			<?php } else {} ?>

			<?php include "includes/followus.php" ?>
		</div>

	</div>

<?php include "includes/footer.php"; ?>