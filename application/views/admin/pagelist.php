<tr id="page<?php echo $id; ?>">
	<td><?php echo $id; ?></td>
	<td><?php echo $page_name; ?></td>
	<td>
		<input id="btnviewpage" data-id="<?php echo $id; ?>" type="button" class="btn btn-sm btn-default" value="View Page"/> &nbsp;
		<input id="btneditpage" data-id="<?php echo $id; ?>" type="button" class="btn btn-sm btn-default" value="Edit"/> &nbsp;
		<input id="btnremovepage" data-id="<?php echo $id; ?>" type="button" class="btn btn-sm btn-danger" value="Remove"/> &nbsp;
	</td>
</tr>