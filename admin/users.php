<?php include "includes/header.php"; ?>

	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="#">USERS</a>
		</li>
		<li class="breadcrumb-item active"></li>
	</ol>

	<?php $users = $crud->selectAll('users', '', ''); ?>
	<div class="row">
		<div class="col-md-12">
		<?php if(count($users) > 0) { ?>
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>USERNAME</th>
						<th>EMAIL</th>
						<th>PROFILE IMAGE</th>
						<th>ADMIN</th>
						<th>CREATED_AT</th>
						<th>DELETE</th>
					</tr>
				</thead>
				<tbody>
			<?php foreach($users as $user) { ?>
				<tr>
					<td><?php echo $user->id; ?></td>
					<td><?php echo $user->username; ?></td>
					<td><?php echo $user->email; ?></td>
					<td><img src="<?php echo BASE_URL; ?>/<?php echo $user->profile_image; ?>" style="width: 100%; height: 50px;"></td>
					<td><?php echo $user->admin; ?></td>	
					<td><?php echo $user->created_at; ?></td>
					<td><button class="btn btn-danger w-100" id="delete" data-delete="<?php echo $user->id; ?>">DELETE</button></td>	
				</tr>
			<?php } ?>
				</tbody>
			</table>
		<?php }else {} ?>
		</div>
	</div>

	<script type="text/javascript">
		$(document).on('click', '#delete', function() {
			let user = $(this).data("delete");
			
			$.post(ADDRESS + "core/ajax/user_delete.php", {user: user}, function(data){
				const { success, error } = data;
				if(success != ""){
					alert(success);
					location.reload();
				}else {
					alert(error);
				}
			});
			
		});
	</script>

<?php include "includes/footer.php"; ?>