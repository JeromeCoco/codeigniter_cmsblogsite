<div class="col-sm-6">
	<h3>
		<i class="fa fa-newspaper-o" aria-hidden="true"></i> <?php echo $post_title ;?>
	</h3>
	<small>
		<i class="fa fa-calendar-check-o" aria-hidden="true"></i> <?php echo $date_posted ;?> | <?php echo $time_posted ;?>
	</small>
	<hr/>
	<div style="color:gray">
		<?php
		    if (str_word_count($post_content, 0) > 100)
		    {
		        $words = str_word_count($post_content, 2);
		        $pos = array_keys($words);
		        $post_content = substr($post_content, 0, $pos[100]).'...';
		    }
		    echo $post_content;
		?> <br/>
		<a href="../blogs/<?php echo $post_url; ?>">Read More</a>
	</div>
</div>