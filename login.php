<?php include 'includes/header.php'; ?>

	<!-- login form -->
	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){

	  $login_error_message = "";

	  $email    = $function->checkInput($_POST['log_email']);
	  $password = $function->checkInput($_POST['log_password']);

	  if(empty($email)){
	    $login_error_message = 'Please enter email.';
	  }else if($user->checkEmail($email) === false) {
	    $login_error_message = 'Email does not exist!';
	  }

	  if(empty($password)){
	    $login_error_message = 'Please enter password!';
	  }else if($user->checkUsersPassword($email, $password) != true) {
	    $login_error_message = 'Password does not exist!';
	  }

	  if(empty($login_error_message)){
	    $login_user = $user->login($email, $password);
	  }
	}
	?>

	<div class="row justify-content-around">
		
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mt-5 mb-5">	
			<a href="<?php echo BASE_URL; ?>/index.php" class="text-white mt-3 mb-3"><i class="fas fa-arrow-left"></i> BACK TO THE SITE</a>
			
			<div class="card my-5 p-5">
				<div class="card-body">
					<h2 class="text-center"><i class="fas fa-arrow-down"></i> LOGIN</h2>
			        <form method="POST">         
			          <div class="form-group">
			            <label for="log_email">Email:</label>
			            <input type="email" name="log_email" id="email" class="form-control" required>
			          </div>
			          <div class="form-group">
			            <label for="log_password">Password:</label>
			            <input type="password" name="log_password" id="password" class="form-control" required>
			          </div>
			          <div class="row justify-content-center">
			            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			              <button type="submit" name="login" id="login" class="btn btn-info w-100">LOGIN</button>
			            </div>
			          </div>        
		        </form>					
				</div>
				<div class="card-footer">
			      <?php if(isset($login_error_message)) {  ?>
			        <div class="w-100">
			          <div class="alert alert-danger"><p class="text-center"><?php echo $login_error_message; ?></p></div>
			        </div> 
			      <?php }else {} ?>					
				</div>
			</div>

		</div>

		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mt-5 mb-5">
			<div class="d-flex flex-column mt-5 mb-5">
				<p class="text-white">No account? Create one now. With an account you can upload spots, participate in the spot of the day election and much more!</p>
				<a href="<?php echo BASE_URL; ?>/register.php" class="btn btn-info">Create account</a>
			</div>
		</div>
	
	</div>

<?php include 'includes/footer.php'; ?>
