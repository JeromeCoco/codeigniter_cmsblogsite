<tr id="row<?php echo $id; ?>"> 
	<td>
		<?php echo $date_posted; ?>
	</td>
	<td id="title<?php echo $id; ?>"><?php echo $post_title; ?></td> 
	<td>
		<?php echo $author_name; ?>
	</td> 
	<td id="status<?php echo $id; ?>"><?php echo $post_status; ?></td> 
	<td>
		<input data-id="<?php echo $id; ?>" type='button' id='btnview' value='View Content' class='btn btn-sm btn-default'/> 
		&nbsp; <input data-id="<?php echo $id; ?>" id="btnedit" type='button' value='Edit' class='btn btn-sm btn-default'/> 
		&nbsp; <input data-id="<?php echo $id; ?>" id='btnremove' type='button' value='Remove' class='btn btn-sm btn-danger'/> 
	</td> 
</tr>