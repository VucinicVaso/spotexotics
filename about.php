<?php include "includes/header.php"; ?>

	<div class="row justify-content-center">
		
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 text-white mt-3 mb-3">
			<h3>About us</h3>
			<p>SpotExotics is an international platform where car enthusiasts meet, share photo’s and get the latest updates about exotic cars. We’re proud to say SpotExotics is for the fans, by the fans.</p>
			<h3>Spots</h3>
			<p>The core of our website is formed by the spots. Every person in the possession of a camera who spots an exotic car can send us their pictures to share them with other exotic car enthusiasts. Every day, thousand of spots, from all over the world are uploaded to our website.  We currently have the largest collection of exotic car photo’s.</p>
			<h3>News</h3>
			<p>Thanks to our editors, SpotExotics is the only website you have to visit to get the latest updates from exotic car manufacturers, events and tuners. We make sure you’ll be the first to know.</p>
		</div>

		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<?php if($user->loggedIn()) { ?>
		<?php include "includes/create_post_modal.php"; ?>
			<button class="btn btn-info w-100 mt-2" data-toggle="modal" data-target="#newPost"><i class="fas fa-camera"></i> UPLOAD</button>
		<?php } else {} ?>	

		<?php include "includes/followus.php" ?>
		
	</div>

<?php include "includes/footer.php"; ?>