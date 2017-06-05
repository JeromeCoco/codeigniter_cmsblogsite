<tr id="row<?php echo $id; ?>">
	<td><?php echo $link_name; ?></td>
	<td><?php echo $page_url; ?></td>
	<td>
		<input type="button" id="editurl" data-id="<?php echo $id; ?>" class="btn btn-sm btn-default" value="Edit"/>
		<input type="button" id="removeurl" data-id="<?php echo $id; ?>" class="btn btn-sm btn-danger" value="Remove"/>
	</td>
</tr>