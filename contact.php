<?php include "includes/header.php"; ?>

	<div class="row justify-content-center">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 text-white mt-5 mb-5">
			<h3>Contact</h3>
			<form method="POST" id="contact_form">
				<div class="form-group" id="text-white">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control bg-dark">
				</div>
				<div class="form-group" id="text-white">
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control bg-dark">
				</div>				
				<div class="form-group" id="text-white">
					<label for="subject">Subject</label>
					<input type="text" name="subject" class="form-control bg-dark">
				</div>	
				<div class="form-group" id="text-white">
					<label for="message">Your message</label>
					<textarea name="message" class="form-control bg-dark"></textarea>
				</div>
				<input type="submit" name="submit" value="Submit" class="btn btn-info">					
			</form>
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