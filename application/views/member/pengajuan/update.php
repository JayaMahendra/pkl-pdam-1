<?php echo anchor('member/pengajuan', 'Back'); ?>
<form action="<?= base_url('member/pengajuan/update') ?>" method="post">
	<table>
		<tr>
			<td>Proposal</td>
			<td><input type="file" name="proposal" value="<?= $pengajuan->proposal ?>"></td>
		</tr>
		<tr>
			<td>Surat Pengantar</td>
			<td><input type="file" name="surat_pengantar" value="<?= $pengajuan->surat_pengantar ?>"></td>
		</tr>
		<tr>
			<td>Topik</td>
			<td><input type="text" name="topik" value="<?= $pengajuan->topik ?>"></td>
		</tr>
		<tr>
			<td>Tanggal Mulai</td>
			<td><input type="date" name="tanggal_mulai" value="<?= $pengajuan->tanggal_mulai ?>"></td>
		</tr>
		<tr>
			<td>Tanggal Selesai</td>
			<td><input type="date" name="tanggal_selesai" value="<?= $pengajuan->tanggal_selesai ?>"></td>
		</tr>
		<tr>
			<td>Instansi</td>
			<td><input type="text" name="instansi" value="<?= $pengajuan->asal ?>"></td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td><input type="text" name="jurusan" value="<?= $pengajuan->jurusan ?>"></td>
		</tr>
		<tr>
			<td>Prodi</td>
			<td><input type="text" name="prodi" value="<?= $pengajuan->prodi ?>"></td>
		</tr>
		<tr>
			<td></td>
			<input type="hidden" name="id" value="<?= $pengajuan->pengajuan_id ?>">
			<td><input type="submit" value="Submit"></td>
		</tr>
	</table>
</form>
