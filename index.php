<?php include 'includes/header.php'; ?>

	<div class="row">
		<?php $latest_news = $crud->getLast('news', 'id', 1); ?>
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 w-100">
			<div id="parallax" style="background-image: url(<?php echo BASE_URL; ?>/<?php echo json_decode($latest_news->images)[0]; ?>);">
				<div class="d-flex flex-column" style="position: absolute; bottom: 0;">
					<a href="<?php echo BASE_URL; ?>/news.php/?id=<?php echo $latest_news->id; ?>" class="btn btn-danger ml-2" style="max-width: 75px;">READ</a>
					<h2 class="text-white ml-2"><?php echo $latest_news->title; ?></h2>		
				</div>
			</div>
		</div>
	</div>

	<div class="row">

		<!-- news -->
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 mt-2 mb-2">
			<div class="row">
				<?php $select_news = $crud->selectAll('news', '', ''); ?>
				<?php if(!empty($select_news)) { ?>
				<?php foreach($select_news as $news) { ?>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-2 mb-2">
					<div class="card bg-dark text-white">
						<div class="card-header">
							<p class="text-center" id="topspots">NEWS</p>
						</div>
						<div class="card-body">
							<?php $images = json_decode($news->images);  ?>
							<img src="<?php echo BASE_URL; ?>/<?php echo json_decode($news->images)[0]; ?>" class="w-100" style="height: 200px;">
						</div>
						<div class="card-footer">
							<a href="<?php echo BASE_URL; ?>/news.php/?id=<?php echo $news->id; ?>"><h3><?php echo $news->title; ?></h3></a>
							<small><?php echo $function->timeAgo($news->created_at); ?></small>
							<p><?php echo $function->truncate($news->body); ?></p>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php }else{} ?>				
			</div>
		</div>

		<!-- number of total posts -->
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 col-sm-12">
			<div class="row mt-2 mb-2 text-center">
				<?php $count_posts = $post->countPosts(); ?>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<a href="<?php echo BASE_URL; ?>/spots.php/?page=1" class="text-center text-white" style="font-size: 30px;">
						<?php echo $count_posts; ?> spots
					</a>				
				</div>	
				<?php $count_posts_by_day = $post->countPostsByDay(); ?>
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
					<a href="<?php echo BASE_URL; ?>/spots.php/?page=1" class="text-center text-white">
						<?php echo $count_posts_by_day; ?> spots in the last 24 hours
					</a>
				</div>
			</div>
		<?php if($user->loggedIn()) { ?>
			<?php include "includes/create_post_modal.php"; ?>
			<button class="btn btn-info w-100 mt-1 mb-3" data-toggle="modal" data-target="#newPost"><i class="fas fa-camera"></i> UPLOAD</button>
		<?php } else {} ?>
		</div>

	</div>

<?php include 'includes/footer.php'; ?>
