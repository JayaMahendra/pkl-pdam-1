<?php echo anchor('admin/pengajuan', 'Back'); ?>
<form action="<?= base_url('admin/pengajuan/update') ?>" method="post">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" value="<?= $pengajuan->name ?>"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="address" value="<?= $pengajuan->address ?>"></td>
		</tr>
		<tr>
			<td></td>
			<input type="hidden" name="id" value="<?= $pengajuan->id ?>">
			<td><input type="submit" value="Submit"></td>
		</tr>
	</table>
</form>
