<?php echo anchor('member/pengajuan', 'Back'); ?>
<form action="<?= base_url('member/pengajuan/create') ?>" method="post">
	<table>
		<tr>
			<td>Proposal</td>
			<td><input type="file" name="proposal"></td>
		</tr>
		<tr>
			<td>Surat Pengantar</td>
			<td><input type="file" name="surat_pengantar"></td>
		</tr>
		<tr>
			<td>Topik</td>
			<td><input type="text" name="topik"></td>
		</tr>
		<tr>
			<td>Tanggal Mulai</td>
			<td><input type="date" name="tanggal_mulai"></td>
		</tr>
		<tr>
			<td>Tanggal Selesai</td>
			<td><input type="date" name="tanggal_mulai"></td>
		</tr>
		<tr>
			<td>Instansi</td>
			<td><input type="text" name="asal"></td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td><input type="text" name="jurusan"></td>
		</tr>
		<tr>
			<td>Prodi</td>
			<td><input type="text" name="prodi"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Submit"></td>
		</tr>
	</table>
</form>
