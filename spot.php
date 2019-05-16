<?php include "includes/header.php"; ?>

<?php 
	if(isset($_GET['spot_id'])){
		$postData = $post->post($_GET['spot_id']);
		if(empty($postData)){
			$function->redirect('error.php');
		}
		$crud->update("posts", "id", $_GET['spot_id'], array("views" => $postData->views + 1));
		$comments  = $crud->selectAll("comments", "post_id", $postData->id);
		$post_date = strtotime($postData->created_at);
		$post_date = date("Y-m-d", $post_date);
	}else {
		$function->redirect('error.php');
	}
?>

	<div class="row">
		<img src="<?php echo BASE_URL; ?>/<?php echo json_decode($postData->images)[0]; ?>" id="post_img_1">
	 	<div id="text-block">
		    <h2 class="text-center" style="font-size: 65px;"><?php echo $postData->brand; ?> <?php echo $postData->model; ?></h2>
		<?php
			if(isset($_SESSION['userdata']['id'])){
				$isVoted = $post->checkForVote($postData->id, $_SESSION['userdata']['id']);
				if($isVoted === true){ }else {
					if($post_date == date('Y-m-d')) { 
		?>
			<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/vote.js"></script>
			<button class="btn btn-info" id="vote" onclick="vote(<?php echo $postData->id; ?>)">VOTE FOR A THIS SPOT</button>
		<?php 		} else {}
				}
			}
		?>
		</div>
	</div>

	<!-- post data -->
	<div class="row justify-content-left mt-1">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="color: white;">
			<p>SPOT DETAILS </p>
			<div class="row justify-content-left">
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"><i class="far fa-images"> 5</i></div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"><i class="far fa-eye"> <?php echo $postData->views; ?></i></div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"><i class="far fa-comments"> <?php echo count($comments); ?></i></div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"><i class="far fa-sticky-note"> <?php echo $postData->total_votes; ?></i></div>
			</div>

			<p>SPOTTER <small class="float-right"><a href="<?php echo BASE_URL; ?>/userspots.php?user_id=<?php echo $postData->spotter; ?>"><?php echo $postData->username; ?></a></small></p>
			<p>SPOTTED IN <small class="float-right"><?php echo $postData->city.", ".$postData->country; ?></small></p>
			<p>DATE <small class="float-right"><?php echo $function->timeAgo($postData->created_at); ?></small></p>
			<p></p>
		</div>
	</div>

	<div class="row justify-content-center mt-1">
		<?php foreach(json_decode($postData->images) as $image) { ?>
		<div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12">
			<img src="<?php echo BASE_URL; ?>/<?php echo $image; ?>" id="post_img">
		</div>
		<?php } ?>					
	</div>

	<!-- comment form -->
	<div class="row justify-content-left mt-1">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
			<div class="text-center" id="comment_msg"></div>
			<h3 id="text-white">Comments on this spot:</h3>
			<hr>
			<form method="POST" action="#" id="comment_form">
				<div class="form-group">
					<textarea class="form-control bg-dark text-white" name="comment" placeholder="Your comment..."></textarea>
				</div>
				<div class="form-group">
					<input type="text" name="name" placeholder="Your name" class="form-control bg-dark text-white">
				</div>
				<div class="form-group">
					<input type="email" name="email" placeholder="Email-address" class="form-control bg-dark text-white">
				</div>
				<input type="hidden" name="post_id" value="<?php echo $postData->id; ?>">
				<small class="text-white">By placing a comment you approve to the houserules</small><br>
				<input type="submit" class="btn btn-info width-100" name="submit" value="Reply">
			</form>
			<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/comment.js"></script>
		</div>

		<!-- similar posts -->		
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
			<h2 class="text-white">More 
				<a href="<?php echo BASE_URL; ?>/model.php/?model_id=<?php echo $postData->postModel; ?>">
					<?php echo $postData->brand; ?> <?php echo $postData->model; ?>
				</a> 
			spots</h2>
			<div class="row">
			<?php $simularPosts = $post->simularPosts($postData->postBrand, $postData->postModel); ?>
			<?php if(count($simularPosts) > 0)  { ?>
			<?php foreach($simularPosts as $simularPost) { ?>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
					<a href="<?php echo BASE_URL; ?>/spot.php?spot_id=<?php echo $simularPost->id; ?>">
						<img src="<?php echo BASE_URL; ?>/<?php echo json_decode($simularPost->images)[0]; ?>" class="w-100" style="height: 100px;">
					</a>
				</div>
			<?php } ?>
			<?php } else {} ?>
			</div>
		</div>
	</div>

	<hr>

	<!-- comments -->
	<div class="row justify-content-left" id="margin-top">
		<div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12">
		<?php if(count($comments) > 0 && !empty($comments)) { 
			foreach ($comments as $comment) { ?>
			<div class="media text-white">
				<i class="far fa-user" style="font-size: 75px;"></i>
				<div class="media-body">
					<h4><?php echo $comment->name; ?> <small><i>Posted on <?php echo $comment->created_at; ?></i></small></h4>
					<p><?php echo $comment->comment; ?></p>      
				</div>
			</div>	
			<hr>		
		<?php } 
			}else { ?> 
			<p class="alert alert-warning text-center">0 comments</p>
		<?php } ?>
		</div>
	</div>

<?php include "includes/footer.php"; ?>