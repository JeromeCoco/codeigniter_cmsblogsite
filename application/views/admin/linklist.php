<tr id="row<?php echo $id; ?>">
	<td id="name<?php echo $id; ?>" data-id="name<?php echo $id; ?>"><?php echo $link_name; ?></td>
	<td data-id="page<?php echo $id; ?>"><?php echo $page_id; ?></td>
	<td id="url<?php echo $id; ?>" data-id="url<?php echo $id; ?>"><?php echo $page_url; ?></td>
	<td>
		<input type="button" id="editurl" data-id="<?php echo $id; ?>" class="btn btn-sm btn-default" value="Edit"/>
		<input type="button" id="removeurl" data-id="<?php echo $id; ?>" class="btn btn-sm btn-danger" value="Remove"/>
	</td>
</tr>