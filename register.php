<?php include 'includes/header.php'; ?>

	<!-- register form -->
	<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/register.js"></script>

	<div class="row justify-content-around">
		
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 my-5">	
			<a href="<?php echo BASE_URL; ?>/index.php" class="text-white my-3"><i class="fas fa-arrow-left"></i> BACK TO THE SITE</a>
			
			<div class="card my-5 p-5">
				<div class="card-body">
					<h2 class="text-center"><i class="fas fa-arrow-down"></i> REGISTER</h2>
			        <form method="POST" id="register_form">
			          <div class="row form-group">
			            <div class="col-md-6">
			              <label for="reg_firstname">Firstname:</label>
			              <input type="text" name="reg_firstname" id="reg_firstname" class="form-control" required>
			            </div>
			            <div class="col-md-6">
			              <label for="reg_lastame">Lastname:</label>
			              <input type="text" name="reg_lastname" id="reg_lastname" class="form-control" required>              
			            </div>
			          </div>          
			          <div class="row form-group">
			            <div class="col-md-6">
			              <label for="reg_city">City:</label>
			              <input type="text" name="reg_city" id="reg_city" class="form-control" required>
			            </div>
			            <div class="col-md-6">
			              <label for="reg_country">Country:</label>
			              <input type="text" name="reg_country" id="reg_country" class="form-control" required>              
			            </div>
			          </div>
			          <div class="form-group">
			              <div class="row d-flex justify-content-between">
			                <label for="reg_dateofbirth" class="col-md-3 col-sm-12">Date of birth:</label>
			                <select name="reg_day" id="reg_day" class="form-control col-md-3 col-sm-12">
			                  <option value="">DAY</option>
			                  <?php for($i = 1; $i <= 31; $i++) { ?>
			                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			                  <?php } ?>
			                </select>
			                <select name="reg_month" id="reg_month" class="form-control col-md-3 col-sm-12">
			                  <option value="">Month</option>
			                  <?php for($i = 1; $i <= 12; $i++) { ?>
			                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			                  <?php } ?>
			                </select>
			                <select name="reg_year" id="reg_year" class="form-control col-md-3 col-sm-12">
			                  <option value="">Year</option>
			                  <?php for($i = 2019; $i >= 1935; $i--) { ?>
			                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			                  <?php } ?>
			                </select>
			            </div>
			          </div>             
			          <div class="form-group">
			            <label for="reg_email">Email:</label>
			            <input type="email" name="reg_email" id="reg_email" class="form-control" required>
			          </div>
			          <div class="form-group">
			            <label for="password">Password:</label>
			            <input type="password" name="reg_password" id="reg_password" class="form-control" required>
			          </div>
			          <div class="form-group">
			            <label for="password">Confirm Password:</label>
			            <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
			          </div>
			          <div class="row justify-content-center">
			            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
			              <button type="submit" class="btn btn-info w-100 mt-2">REGISTER</button>
			            </div>
			          </div>
			        </form>				
				</div>
				<div class="card-footer">
					<div id="register_msg" class="w-100"></div>
				</div>
			</div>

		</div>

		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 my-5">
			<div class="d-flex flex-column my-5">
				<p class="text-white">Have an account!</p>
				<a href="<?php echo BASE_URL; ?>/login.php" class="btn btn-info">Login here!</a>
			</div>
		</div>
	
	</div>

<?php include 'includes/footer.php'; ?>
