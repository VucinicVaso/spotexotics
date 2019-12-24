<!-- upload spot -->
<?php if($user->loggedIn()) { ?>
	<?php include "create_post_modal.php"; ?>
	<button class="btn btn-info w-100 mt-1 mb-3" data-toggle="modal" data-target="#newPost"><i class="fas fa-camera"></i> UPLOAD</button>
<?php } else {} ?>

<!-- search spot -->
<?php include "search.php"; ?>

<!-- followus links -->
<?php include "followus.php"; ?>