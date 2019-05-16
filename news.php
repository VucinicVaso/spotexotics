<?php include "includes/header.php"; ?>

<?php
	if(isset($_GET['id'])){
		$news = $crud->find("news", 'id', $_GET['id']);
		if(empty($news)){
			$function->redirect("error.php");
		}
	}else {
		$function->redirect("error.php");
	}
?>

	<div class="row">
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 text-white mt-5 mb-5">
			<h1>NEWS: <?php echo $news->title; ?></h1>
			<small>CREATED: <?php echo $function->timeAgo($news->created_at); ?></small>
			<?php $images = json_decode($news->images); ?>
			<img src="<?php echo BASE_URL; ?>/<?php echo $images[0]; ?>" class="w-100" style="height: 500px;">
			<hr>
			<p><?php echo $news->body; ?></p>
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					<img src="<?php echo BASE_URL; ?>/<?php echo $images[1]; ?>" class="w-100" style="height: 250px;">
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12-12">
					<img src="<?php echo BASE_URL; ?>/<?php echo $images[2]; ?>" class="w-100" style="height: 250px;">
				</div>
			</div>
		</div>
		
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mt-5 mb-5">
			<?php if($user->loggedIn()) { ?>
			<?php include "includes/create_post_modal.php"; ?>
			<button class="btn btn-info w-100 mt-1" data-toggle="modal" data-target="#newPost"><i class="fas fa-camera"></i> UPLOAD</button>
			<?php } else {} ?>	

			<?php include "includes/followus.php" ?>
		</div>

	</div>

<?php include "includes/footer.php"; ?>