<?php include "includes/header.php"; ?>

	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="#">NEWS</a>
		</li>
		<li class="breadcrumb-item active"></li>
		<!-- create brand and type -->
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-info" data-toggle="modal" data-target="#news">NEW</button>
				<?php include "modals/create_news_modal.php"; ?>
			</div>
		</div>
	</ol>

	<div class="row mt-1 mb-1">

	<?php $all_news = $crud->selectAll("news", '', ''); ?>
	<?php if(count($all_news) > 0) { ?>
		<?php foreach($all_news as $news) { ?>
		<div class="col-md-12 mt-1 mb-2">
			<div class="card bg-dark text-white">
				<div class="card-header">
					<p>ID: <span class="badge badge-primary float-right"><?php echo $news->id; ?></span></p>
					<p>TITLE: <span class="badge badge-primary float-right"><?php echo $news->title; ?></span></p>
					<p>CREATED: <span class="badge badge-primary float-right"><?php echo $news->created_at; ?></span></p>
				</div>	
				<div class="card-body" style="padding: 0;">
					<div class="row">
					<?php foreach(json_decode($news->images) as $index => $image) { ?>
						<?php if($index == 0) { ?>
							<div class="col-md-12 col-sm-12">
								<img src="<?php echo BASE_URL; ?>/<?php echo $image; ?>" class="w-100" style="height: 300px;">
							</div>
						<?php }else{ ?>								
							<div class="col-md-6 col-sm-12 mt-1 mb-1">
								<img src="<?php echo BASE_URL; ?>/<?php echo $image; ?>" class="w-100" style="height: 150px;">
							</div>
						<?php } ?>			
					<?php } ?>
					</div>
				</div>	
				<div class="card-footer">
					<p><?php echo $news->body; ?></p>
				</div>
			</div>			
		</div>	
		<?php } ?>
	<?php } else {} ?>
	</div>

<?php include "includes/footer.php"; ?>