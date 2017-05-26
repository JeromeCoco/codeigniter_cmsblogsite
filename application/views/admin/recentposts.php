<div id="recentPostHeader">
	<?php echo $post_title;?>
	<span id="recentPostDate">
		<?php echo $date_posted;?>
	</span>
</div>
<div id="recentPostContent">
	<?php 	
		$display = html_entity_decode($post_content);
		echo substr($display, 0, 200). "...";
	?>
</div>
<hr/>