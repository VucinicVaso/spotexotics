<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" href="<?php echo BASE_URL; ?>/index.php">
				<img src="<?php echo BASE_URL; ?>/assets/images/logo.png" style="width: 80px; height: 80px;">
			</a>
		</li>						
	</ul>
</nav>	 		

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarsExample01">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo BASE_URL; ?>/index.php">NEWS</a>
			</li>			
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
				SPOTS
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?php echo BASE_URL; ?>/spots.php/?page=1">SPOTS</a>
					<a class="dropdown-item" href="<?php echo BASE_URL; ?>/spotoftheday.php">SPOT OF THE DAY</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo BASE_URL; ?>/about.php">ABOUT US</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo BASE_URL; ?>/contact.php">CONTACT</a>
			</li>						
			<li class="nav-item">
				<a class="nav-link" href="<?php echo BASE_URL; ?>/spotter.php">BECOME A SPOTTER</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto"> 
			<?php if($user->loggedIn()) { ?> 
			<li class="nav-item">
				<a class="nav-link" href="<?php echo BASE_URL; ?>/profile.php/?id=<?php echo $_SESSION['userdata']['id']; ?>">PROFILE</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo BASE_URL; ?>/logout.php">LOGOUT</a>
			</li>
			<?php } else { ?>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo BASE_URL; ?>/login.php" >LOGIN</a> 
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo BASE_URL; ?>/register.php" >REGISTER</a> 
			</li>
			<?php } ?>					
		</ul>
	</div>
</nav>