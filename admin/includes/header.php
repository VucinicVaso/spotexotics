<?php include "../core/init.php"; ?>
<?php 
	$admin = $crud->find("users", 'id', $_SESSION['userdata']['id']);
	if(!$user->loggedIn() || $admin->admin == 0){ $function->redirect("index.php"); } 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="basic php website">
		<meta name="keywords" content="HTML5, CSS3, JavaScript, PHP">
		<meta name="author" content="Vaso Vucinic">
		<title>AUTOGESPOT - ADMIN</title>
		<!-- bootstrap css -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!-- fontawesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">	
		<!-- Custom styles for this template-->
		<link href="css/sb-admin.css" rel="stylesheet">
		<!-- jquery -->
		<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script>
		<!-- bootstrap js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>	
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</head>
  	<body id="page-top">

  		<script type="text/javascript">
  			const ADDRESS = "http://localhost/spotexotics/";
  		</script>

		<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
			<a class="navbar-brand mr-1" href="<?php echo BASE_URL; ?>/index.php">AUTOGESPOT</a>

			<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
				<i class="fas fa-bars"></i>
			</button>

			<!-- Navbar -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-user-circle fa-fw"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?php echo BASE_URL; ?>/admin/logout.php">Logout</a>
					</div>
				</li>
			</ul>

		</nav>

	    <div id="wrapper">

	    	<?php include "includes/sidebar.php"; ?>

			<div id="content-wrapper">
				<div class="container-fluid">	
