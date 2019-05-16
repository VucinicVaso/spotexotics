<?php include "includes/header.php"; ?>

	<div class="row justify-content-center">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 text-white mt-5 mb-5">
			<h2 class="text-center">Become a spotter</h2>
			<p>Do you have a passion for cars and do you make unique photos you want to share with others? Become part of SpotExotics and share your photos with this close community. As a spotter, you can register for free and upload your photos. When uploading a spot, please notice that you have to obey some rules.</p>
			<h3 class="text-center">Spot of the Day</h3>
			<p>When you have uploaded a spot, you automatically participate in the Spot of the Day election. The winner of the Spot of the Day election wins unique prizes.</p>
		</div>
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			<?php if($user->loggedIn()) { ?>
			<?php include "includes/create_post_modal.php"; ?>
			<button class="btn btn-info w-100 mt-5" data-toggle="modal" data-target="#newPost"><i class="fas fa-camera"></i> UPLOAD</button>
			<?php } else {} ?>	

			<?php include "includes/followus.php" ?>	
		</div>
	</div>

<?php include "includes/footer.php"; ?>