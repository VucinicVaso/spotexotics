<?php include "includes/header.php"; ?>

	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="#">COMMENTS</a>
		</li>
		<li class="breadcrumb-item active"></li>
	</ol>

	<?php $comments = $crud->selectAll('comments', '', ''); ?>
	<div class="row">
		<div class="col-md-12">
		<?php if(count($comments) > 0) { ?>
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>SPOT ID</th>
						<th>COMMENT</th>
						<th>NAME</th>
						<th>EMAIL</th>
						<th>CREATED</th>
						<th>DELETE</th>
					</tr>
				</thead>
				<tbody>
			<?php foreach($comments as $comment) { ?>
				<tr>
					<td><?php echo $comment->id; ?></td>	
					<td><a href="<?php echo BASE_URL; ?>/spot.php/?spot_id=<?php echo $comment->post_id; ?>"><?php echo $comment->post_id; ?></a></td>	
					<td><?php echo $comment->comment; ?></td>	
					<td><?php echo $comment->name; ?></td>	
					<td><?php echo $comment->email; ?></td>	
					<td><?php echo $comment->created_at; ?></td>	
					<td><button class="btn btn-danger" id="delete" data-delete="<?php echo $comment->id; ?>" style="width: 100%;">DELETE</button></td>	
				</tr>
			<?php } ?>
				</tbody>
			</table>
		<?php }else {} ?>
		</div>
	</div>

	<script type="text/javascript">
		$(document).on('click', '#delete', function() {
			let comment = $(this).data("delete");
			
			$.post(ADDRESS + "core/ajax/comment_delete.php", {comment: comment}, function(data){
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
