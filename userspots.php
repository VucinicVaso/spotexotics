<?php include "includes/header.php"; ?>

	<?php 
		if(isset($_GET['user_id'])){
			$user_id = $function->checkInput($_GET['user_id']);
			$spotter = $crud->find("users", "id", $user_id);
			if(!empty($spotter)){
				$spots = $post->usersPosts($spotter->id);
			}else {
				$function->redirect("error.php");
			}
		}else {
			$function->redirect("error.php");
		}	
	?>

	<div class="row">

		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 py-5">
			<h3 class="text-white">All spots from <?php echo $spotter->username; ?>(<?php echo $spotter->firstname." ".$spotter->lastname; ?>)</h3>
	
			<div class="d-flex flex-row flex-wrap justify-content-around mb-2">
				<div class="d-flex flex-column flex-wrap">
					<p class="text-white">Firstname <span class="float-right pl-2"><?php echo $spotter->firstname; ?></span></p>
					<p class="text-white">Lastname <span class="float-right pl-2"><?php echo $spotter->lastname; ?></span></p>
					<p class="text-white">Username <span class="float-right pl-2"><?php echo $spotter->username; ?></span></p>
					<p class="text-white">Email <span class="float-right pl-2"><?php echo $spotter->email; ?></span></p>
				</div>
				<div class="d-flex flex-column flex-wrap">
					<p class="text-white">Age <span class="float-right pl-2"><?php echo $function->timeAgo($spotter->date_of_birth); ?></span></p>
					<p class="text-white">City <span class="float-right pl-2"><?php echo $spotter->city; ?></span></p>
					<p class="text-white">Country <span class="float-right pl-2"><?php echo $spotter->country; ?></span></p>
					<p class="text-white">Spots <span class="float-right pl-2"><?php echo count($spots); ?></span></p>
				</div>
			</div>

			<?php if(!empty($spots)){ ?>
			<div class="row">
			<?php foreach($spots as $spot) { ?>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 py-2">
					<div class="card">
						<div class="card-body p-0">
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
			</div>
			<?php }else { ?>
			<p class="alert alert-warning text-center">0 spots by this user.</p>
			<?php } ?>
		</div>

		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 pt-5 pb-5">			
			<!-- sidebar -->
			<?php include "includes/sidebar.php"; ?>	
		</div>

	</div>

<?php include "includes/footer.php"; ?>