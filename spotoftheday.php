<?php include "includes/header.php"; ?>

	<?php $spot = $post->spotOfTheDay(); ?>

	<div class="row py-5">
		
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 my-5">
			<h2 class="text-white pb-2">SPOT OF THE DAY</h2>
		<?php
			if(empty($spot)){
				echo "<p class='alert alert-danger text-center'>We don't have spot of the day yet. You should vote for one!</p>";
			}else {
		?>
			<div class="card" style="border: 2px solid #FFD700;">
				<div class="card-body">
					<h2 class="text-center"><i class="fas fa-star" style="color: #FFD700;"></i> VOTES <?php echo $spot->daily_votes; ?>
						<i class="fas fa-trophy" style="color: #FFD700;"></i></h2>
					<a href="<?php echo BASE_URL; ?>/spot.php/?spot_id=<?php echo $spot->id; ?>">
						<img src="<?php echo BASE_URL; ?>/<?php echo json_decode($spot->images)[0]; ?>" class="w-100" style="height: 200px;">
					</a>
					<p>
						<a href="<?php echo BASE_URL; ?>/brand.php/?brand_id=<?php echo $spot->postBrand; ?>"><?php echo $spot->brand; ?></a> <a href="<?php echo BASE_URL; ?>/model.php/?model_id=<?php echo $spot->postModel; ?>"><?php echo $spot->model; ?></a>
					</p>
					<div class="row" style="height: 35px;">								
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
							<p class="float-left">
								<i class="far fa-user" style="font-size: 20px;"></i>
								<a href="<?php echo BASE_URL; ?>/userspots.php?user_id=<?php echo $spot->spotter; ?>"><?php echo $spot->username; ?></a>
							</p>								
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
							<p class="float-right"><?php echo $function->timeAgo($spot->created_at); ?></p>
						</div>
					</div>
				</div>
			</div>
		<?php } ?> 

		</div>
		
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 my-5">
			<?php include "includes/sidebar.php" ?>
		</div>

	</div>

<?php include "includes/footer.php"; ?>