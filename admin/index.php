<?php include "includes/header.php"; ?>

	<?php 
		$count_users    = count($crud->selectAll('users', '', ''));
		$count_posts    = count($crud->selectAll('posts', '', ''));
		$count_brands   = count($crud->selectAll('brand', '', ''));
		$count_models   = count($crud->selectAll('model', '', ''));
		$count_news     = count($crud->selectAll('news', '', ''));
		$count_comments = count($crud->selectAll('comments', '', ''));
	?>
	
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="#">Dashboard</a>
		</li>
		<li class="breadcrumb-item active">Overview</li>
	</ol>

	<!-- Icon Cards-->
	<div class="row">

		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
					<i class="fas fa-fw fa-comments"></i>
					</div>
					<div class="mr-5"><?php echo $count_comments; ?> Comments!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo BASE_URL; ?>/admin/comments.php">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>

		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fas fa-fw fa-list"></i>
					</div>
					<div class="mr-5"><?php echo $count_posts; ?> Posts!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo BASE_URL; ?>/admin/posts.php">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>

		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
					<i class="fas fa-fw fa-list"></i>
					</div>
					<div class="mr-5"><?php echo $count_brands; ?> Brands!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo BASE_URL; ?>/admin/brand&model.php">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>		

		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
					<i class="fas fa-fw fa-list"></i>
					</div>
					<div class="mr-5"><?php echo $count_models; ?> Models!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo BASE_URL; ?>/admin/brand&models.php">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>	
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fas fa-fw fa-list"></i>
					</div>
					<div class="mr-5"><?php echo $count_users; ?> Users!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo BASE_URL; ?>/admin/users.php">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>

		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
					<div class="card-body-icon">
						<i class="fas fa-fw fa-list"></i>
					</div>
					<div class="mr-5"><?php echo $count_news; ?> News!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="<?php echo BASE_URL; ?>/admin/news.php">
					<span class="float-left">View Details</span>
					<span class="float-right">
						<i class="fas fa-angle-right"></i>
					</span>
				</a>
			</div>
		</div>
    
    </div>
    
<?php include "includes/footer.php"; ?>
