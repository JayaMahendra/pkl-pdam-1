<div class="container bootstrap snippets bootdey">
	<div class="row ng-scope">
		<div>
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal ng-pristine ng-valid" action="<?= base_url('member/pengajuan/updatePengajuan/' . $pengajuan->pengajuan_id) ?>" method="post" enctype="multipart/form-data">
						<div class="h1">Detail Pengajuan</div>
						<br><br>
						<div class="row pv-lg">
							<div class="col-lg-10">
								<div class="form-group">
									<label class="col-sm-2 control-label">Proposal</label>
									<div class="col-sm-10">
										<a name="proposaltmp" class="form-control" href="<?php echo base_url() . 'member/pengajuan/do_download_propo/' . $pengajuan->proposal ?>"><?= $pengajuan->proposal ?></a>
										<?php if ($pengajuan->tanggal_disetujui == null) { ?>
											<input type="file" class="form-control" name="proposal" value="<?= $pengajuan->proposal ?>" accept=".docx,.doc,.pdf">
										<?php } ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Surat Pengantar</label>
									<div class="col-sm-10">
										<a name="surat_pengantartmp" class="form-control" href="<?php echo base_url() . 'member/pengajuan/do_download_supeng/' . $pengajuan->surat_pengantar ?>"><?= $pengajuan->surat_pengantar ?></a>
										<?php if ($pengajuan->tanggal_disetujui == null) { ?>
											<input type="file" class="form-control" name="surat_pengantar" value="<?php echo $pengajuan->surat_pengantar ?>" accept=".docx,.doc,.pdf">
										<?php } ?>
									</div>
								</div>
								<input type="hidden" name="dataproposal" value="<?= $pengajuan->proposal ?>">
								<input type="hidden" name="datasurat" value="<?= $pengajuan->surat_pengantar ?>">
								<div class="form-group">
									<label class="col-sm-2 control-label">Topik</label>
									<div class="col-sm-10">
										<input class="form-control" name="topik" type="text" value="<?= $pengajuan->topik ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tanggal Mulai</label>
									<div class="col-sm-10">
										<input class="form-control" name="tanggal_mulai" type="date" value="<?= $pengajuan->tanggal_mulai ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tanggal Selesai</label>
									<div class="col-sm-10">
										<input class="form-control" name="tanggal_selesai" type="date" value="<?= $pengajuan->tanggal_selesai ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Instansi</label>
									<div class="col-sm-10">
										<input class="form-control" name="asal" type="text" value="<?= $pengajuan->asal ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Jurusan</label>
									<div class="col-sm-10">
										<input class="form-control" name="jurusan" type="text" value="<?= $pengajuan->jurusan ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Prodi</label>
									<div class="col-sm-10">
										<input class="form-control" name="prodi" type="text" value="<?= $pengajuan->prodi ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tanggal Disetujui</label>
									<div class="col-sm-10">
										<input class="form-control" name="tanggal_disetujui" type="text" value="<?= $pengajuan->tanggal_disetujui ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Surat Balasan</label>
									<div class="col-sm-10">
										<a name="balasantmp" class="form-control" href="<?php echo base_url() . 'member/pengajuan/do_download_balasan/' . $pengajuan->surat_balasan ?>"><?= $pengajuan->surat_balasan ?></a>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Sertifikat</label>
									<div class="col-sm-10">
										<a name="sertifikattmp" class="form-control" href="<?php echo base_url() . 'member/pengajuan/do_download_sertifikat/' . $pengajuan->sertifikat ?>"><?= $pengajuan->sertifikat ?></a>
									</div>
								</div>
							</div>
						</div>
						<br>
						<h1>Detail Mahasiswa</h1>
						<br>
						<div class="table-responsive">
							<table class="table table-striped" style="width: 90%;">
								<thead>
									<tr>
										<!-- <th scope="col">No</th> -->
										<th scope="col">Nama</th>
										<th scope="col">NIM</th>
										<th scope="col">Alamat</th>
										<th scope="col">Email</th>
										<th scope="col">Handphone</th>
										<th scope="col">Foto</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 0;
									foreach ($pengajuan_mahasiswa as $item) {
										echo "<tr>										
										<input type='text' name='id$i' value='$item->pengajuan_m_id' style='border:0 ; display:	none' >
										<input type='text' name='datafoto$i' value='$item->foto' style='border:0 ; display:	none' >
										<td><input type='text' name='nama$i' value='$item->nama' style='border:0'></td>
										<td><input type='text' name='nim$i' value='$item->nim' style='border:0'></td>
										<td><input type='text' name='alamat$i' value='$item->alamat' style='border:0'></td>
										<td><input type='text' name='email$i' value='$item->email' style='border:0'></td>
										<td><input type='text' name='handphone$i' value='$item->handphone' style='border:0'></td>
										<td><img src='" . base_url('assets/uploads/foto/') . $item->foto . "' width='42' height='42'></td>
										<?php echo form_error('foto$i'); ?>
										".($pengajuan->tanggal_disetujui == null ? "<td><input type='file' required name='foto$i' accept='.jpeg,.jpg,.png' style='border:0'></td>" : "")."
										</tr>";
										$i++;
									} ?>
								</tbody>
							</table>
						</div>
						<?php if ($pengajuan->tanggal_disetujui == null) { ?>
							<button class="btn btn-primary" type="submit">Update</button>
						<?php } ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>