<?php include 'includes/header.php'; ?>

	<?php 
		if(isset($_GET['id']) && !empty($_SESSION['userdata']) && $_GET['id'] === $_SESSION['userdata']['id']) {
			$user_id = $function->checkInput($_GET['id']);
			$user    = $crud->find('users', 'id', $user_id);
			$posts   = $post->usersPosts($user_id);
			if($user->admin == 1){ $function->redirect('admin/index.php'); }
		}else{ 
			$function->redirect('error.php'); 
		} 
	?>

	<div class="row">

		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 mt-2 mb-2">
			<?php include "includes/create_post_modal.php"; ?>
			<button class="btn btn-info w-100" data-toggle="modal" data-target="#newPost">CREATE NEW SPOT</button>

		<?php if(count($posts) > 0) { ?>
			<?php foreach($posts as $post) { ?>
			<div class="card bg-dark mt-1 text-white">
				<div class="card-header">
					<h2 class="text-center">
						<a href="#"><?php echo $post->brand; ?></a>
						<a href="#"><?php echo $post->model; ?></a>						
					</h2>
				</div>
				<div class="card-body">
					<img src="<?php echo BASE_URL; ?>/<?php echo json_decode($post->images)[0]; ?>" class="w-100" id="profile_post_img">
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-1">
							<button class="btn btn-danger w-100" onclick="delete_post(<?php echo $post->id; ?>)">DELETE</button>
							<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/post_delete.js"></script>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-1">
							<a href="<?php echo BASE_URL; ?>/spot.php/?spot_id=<?php echo $post->id; ?>" class="btn btn-info w-100">VIEW</a>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>		
		<?php } else { ?>
			<p class="alert alert-warning text-center mt-2">YOU HAVE 0 SPOTS</p>
		<?php } ?>

		</div>

		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mt-2 mb-2">
			<div class="card bg-dark text-white">
				<div class="card-header">
					<img src="<?php echo BASE_URL; ?>/<?php echo $user->profile_image; ?>" class="w-100" id="profile-img">
				</div>
				<div class="card-body">
					<p>FIRSTNAME: <span class="badge badge-primary float-right"><?php echo $user->firstname; ?></span></p>
					<p>LASTNAME: <span class="badge badge-primary float-right"><?php echo $user->lastname; ?></span></p>
					<p>USERNAME: <span class="badge badge-primary float-right"><?php echo $user->username; ?></span></p>
					<p>EMAIL: <span class="badge badge-primary float-right"><?php echo $user->email; ?></span></p>
					<p>CITY: <span class="badge badge-primary float-right"><?php echo $user->city; ?></span></p>
					<p>COUNTRY: <span class="badge badge-primary float-right"><?php echo $user->country; ?></span></p>
					<p>DATE OF BIRTH: <span class="badge badge-primary float-right"><?php echo $function->timeAgo($user->date_of_birth); ?></span></p>
					<p>PROFILE CREATED: <span class="badge badge-primary float-right"><?php echo $function->timeAgo($user->created_at); ?></span></p>
					<p>SPOTS: <span class="badge badge-primary float-right"><?php echo count($posts); ?></span></p>
				</div>
				<div class="card-footer">
					
				</div>
			</div>
		</div>
	</div>

<?php include 'includes/footer.php'; ?>
