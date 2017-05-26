<tr id="file<?php echo $id;?>">
	<td>
		<?php echo $file_date_uploaded; ?>
	</td>
	<td>
		<?php echo $file_name; ?>
	</td>
	<td>
		<?php echo $file_desc; ?>
	</td>
	<td class="text-center">
		<a href="<?php echo base_url()."www/images/".$file_name;?>">
			<img style="border:1px solid lightgray;border-radius:2px;width:50px;" src="<?php echo base_url()."www/images/".$file_name;?>">
		</a>
	</td>
	<td>
		<input data-id="<?php echo $id; ?>" id="btnremove" type="button" class="btn btn-sm btn-danger" value="Remove Image"/>
	</td>
</tr>