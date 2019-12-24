<?php include "includes/header.php"; ?>

	<div class="row py-5">
		
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 text-white my-2">
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
			<?php include "includes/sidebar.php"; ?>
		</div>

	</div>

<?php include "includes/footer.php"; ?>