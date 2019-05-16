<?php include "includes/header.php"; ?>

	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="#">POSTS</a>
		</li>
		<li class="breadcrumb-item active"></li>
	</ol>

	<?php $posts = $crud->selectAll('posts', '', ''); ?>
	<div class="row">
		<div class="col-md-12">
		<?php if(count($posts) > 0) { ?>
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>BRAND</th>
						<th>MODEL</th>
						<th>SPOTTER</th>
						<th>SPOTTED IN</th>
						<th>VIEWS</th>
						<th>VOTES</th>
						<th>CREATED_AT</th>
						<th>DELETE</th>
					</tr>
				</thead>
				<tbody>
			<?php foreach($posts as $post) { ?>
				<tr>
					<td><a href="<?php echo BASE_URL; ?>/spot.php/?spot_id=<?php echo $post->id; ?>"><?php echo $post->id; ?></a></td>	
					<td><a href="<?php echo BASE_URL; ?>/brand.php/?brand_id=<?php echo $post->brand; ?>"><?php echo $post->brand; ?></a></td>	
					<td><a href="<?php echo BASE_URL; ?>/model.php/?model_id=<?php echo $post->model; ?>"><?php echo $post->model; ?></a></td>	
					<td><?php echo $post->spotter; ?></td>	
					<td><?php echo $post->city." ".$post->country; ?></td>	
					<td><?php echo $post->views; ?></td>	
					<td><?php echo $post->total_votes; ?></td>	
					<td><?php echo $post->created_at; ?></td>	
					<td><button class="btn btn-danger w-100" id="delete" data-delete="<?php echo $post->id; ?>">DELETE</button></td>	
				</tr>
			<?php } ?>
				</tbody>
			</table>
		<?php }else {} ?>
		</div>
	</div>

	<script type="text/javascript">
		$(document).on('click', '#delete', function() {
			let deletePostID = $(this).data("delete");
			
			$.post(ADDRESS + "core/ajax/post_delete.php", {postID: deletePostID}, function(data){
				if(data != ""){
					alert("Post deleted successfully!");
					location.reload();
				}else {
					alert("ERROR! Please try again.");
				}
			});
			
		});
	</script>

<?php include "includes/footer.php"; ?>