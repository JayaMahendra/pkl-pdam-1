<?php echo anchor('member/pengajuan', 'Back'); ?>
<table>
	<tr>
		<td>Proposal</td>
		<td>:</td>
		<td><?= $pengajuan->proposal ?></td>
	</tr>
	<tr>
		<td>Surat Pengantar</td>
		<td>:</td>
		<td><?= $pengajuan->surat_pengantar ?></td>
	</tr>
	<tr>
		<td>Topik</td>
		<td>:</td>
		<td><?= $pengajuan->topik ?></td>
	</tr>
	<tr>
		<td>Tanggal Mulai</td>
		<td>:</td>
		<td><?= $pengajuan->tanggal_mulai ?></td>
	</tr>
	<tr>
		<td>Tanggal Selesai</td>
		<td>:</td>
		<td><?= $pengajuan->tanggal_selesai ?></td>
	</tr>
	<tr>
		<td>Instansi</td>
		<td>:</td>
		<td><?= $pengajuan->asal ?></td>
	</tr>
	<tr>
		<td>Jurusan</td>
		<td>:</td>
		<td><?= $pengajuan->jurusan ?></td>
	</tr>
	<tr>
		<td>Prodi</td>
		<td>:</td>
		<td><?= $pengajuan->prodi ?></td>
	</tr>
	<tr>
		<td>Tanggal Disetujui</td>
		<td>:</td>
		<td><?= $pengajuan->tanggal_disetujui ?></td>
	</tr>
</table>
