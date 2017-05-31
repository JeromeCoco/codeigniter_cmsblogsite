<tr id="panel<?php echo $id; ?>">
	<td><?php echo $panel_name; ?></td>
	<td>
		<input id="btnview" data-id="<?php echo $id; ?>" type="button" class="btn btn-sm btn-default" value="View Content" />
		<input id="btnedit" data-name="<?php echo $panel_name; ?>" data-id="<?php echo $id; ?>" type="button" class="btn btn-sm btn-default" value="Edit" />
		<input id="btndelete" data-id="<?php echo $id; ?>" type="button" class="btn btn-sm btn-danger" value="Remove" />
	</td>
</tr>