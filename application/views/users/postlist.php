<div class="col-sm-6">
	<h3>
		<i class="fa fa-newspaper-o" aria-hidden="true"></i> <?php echo $post_title ;?>
	</h3>
	<small>
		<i class="fa fa-calendar-check-o" aria-hidden="true"></i> <?php echo $date_posted ;?> | <?php echo $time_posted ;?>
	</small>
	<hr/>
	<div>
		<?php echo substr($post_content, 0, 400) . '...'; ?> <br/>
		<a href="../blogs/list/<?php echo $id; ?>">Read More</a>
	</div>
</div>