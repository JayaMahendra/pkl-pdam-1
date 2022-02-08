<div class="container bootstrap snippets bootdey">
	<div class="row ng-scope">
		<div>
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal ng-pristine ng-valid" action="<?= base_url('admin/validasi/validasi_Pengajuan/' . $pengajuan->pengajuan_id) ?>" method="post" enctype="multipart/form-data">
						<div class="h1">Detail Pengajuan</div>
						<br><br>
						<div class="row pv-lg">
							<div class="col-lg-10">
								<div class="form-group">
									<label class="col-sm-2 control-label">Proposal</label>
									<div class="col-sm-10">
										<a name="proposaltmp" class="form-control" href="<?php echo base_url() . 'admin/validasi/do_download_propo/' . $pengajuan->proposal ?>"><?= $pengajuan->proposal ?></a>
										<!-- <input type="file" class="form-control" name="proposal" value="<?= $pengajuan->proposal ?>"> -->
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Surat Pengantar</label>
									<div class="col-sm-10">
										<a name="surat_pengantartmp" class="form-control" href="<?php echo base_url() . 'admin/validasi/do_download_supeng/' . $pengajuan->surat_pengantar ?>"><?= $pengajuan->surat_pengantar ?></a>
										<!-- <input type="file" class="form-control" name="surat_pengantar" value="<?php echo $pengajuan->surat_pengantar ?>" disabled> -->
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Topik</label>
									<div class="col-sm-10">
										<input class="form-control" name="topik" type="text" value="<?= $pengajuan->topik ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tanggal Mulai</label>
									<div class="col-sm-10">
										<input class="form-control" name="tanggal_mulai" type="date" value="<?= $pengajuan->tanggal_mulai ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tanggal Selesai</label>
									<div class="col-sm-10">
										<input class="form-control" name="tanggal_selesai" type="date" value="<?= $pengajuan->tanggal_selesai ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Instansi</label>
									<div class="col-sm-10">
										<input class="form-control" name="asal" type="text" value="<?= $pengajuan->asal ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Jurusan</label>
									<div class="col-sm-10">
										<input class="form-control" name="jurusan" type="text" value="<?= $pengajuan->jurusan ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Prodi</label>
									<div class="col-sm-10">
										<input class="form-control" name="prodi" type="text" value="<?= $pengajuan->prodi ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tanggal Disetujui</label>
									<div class="col-sm-10">
										<input class="form-control" name="tanggal_disetujui" type="text" value="<?= $pengajuan->tanggal_disetujui ?>" disabled>
									</div>
								</div>
								<!-- <div class="form-group">
									<label class="col-sm-2 control-label">Surat Balasan</label>
									<div class="col-sm-10">
										<a name="balasantmp" class="form-control" href="<?php echo base_url() . 'admin/validasi/do_download_balasan/' . $pengajuan->surat_balasan ?>"><?= $pengajuan->surat_balasan ?></a>
										<input type="file" class="form-control" name="surat_balasan" accept=".docx,.doc,.pdf">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Sertifikat (zip/rar)</label>
									<div class="col-sm-10">
										<a name="sertifikattmp" class="form-control" href="<?php echo base_url() . 'admin/validasi/do_download_sertifikat/' . $pengajuan->sertifikat ?>"><?= $pengajuan->sertifikat ?></a>
										<input type="file" class="form-control" name="sertifikat" accept=".zip,.rar,.7zip">
									</div>
								</div>
								<input type="hidden" name="databalasan" value="<?= $pengajuan->surat_balasan ?>">
								<input type="hidden" name="datasertif" value="<?= $pengajuan->sertifikat ?>"> -->
								<input type="text" name="idtmp" value="<?= $pengajuan->pengguna_id ?>" style='border:0 ; display:	none'>
							</div>
						</div>
						<br>
						<h1>Detail Mahasiswa</h1>
						<br>
						<div class="table-responsive">
							<table class="table table-striped" style="width:90%">
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
										<input type='text' name='id$i' value='$item->pengajuan_m_id' style='border:0 ; display:	none' disabled>
										<td><input type='text' name='nama$i' value='$item->nama' style='border:0' disabled></td>
										<td><input type='text' name='nim$i' value='$item->nim' style='border:0' disabled></td>
										<td><input type='text' name='alamat$i' value='$item->alamat' style='border:0' disabled></td>
										<td><input type='text' name='email$i' value='$item->email' style='border:0' disabled></td>
										<td><input type='text' name='handphone$i' value='$item->handphone' style='border:0' disabled></td>
										<td><img src='" . base_url('assets/uploads/foto/') . $item->foto . "' width='42' height='42' disabled></td>
										</tr>";
										$i++;
									} ?>
								</tbody>
							</table>
							<!-- <button class="btn btn-primary" type="submit">Update</button> -->
							<!-- </form> -->
						</div>
						<!-- <button class="btn btn-primary" type="submit">Update</button> -->
						<?php if($pengajuan->tanggal_disetujui == null) { ?>
						<button type="submit" class="btn btn-success" onclick="return ConfirmSetuju()">Terima</button>
						<?php } ?>
						<!-- <button class="btn btn-danger" onclick="ConfirmReject()" value=""> -->
							<?php
							echo anchor('admin/validasi/delete/' . $pengajuan->pengajuan_id, 'Tolak', array('class' => 'delete btn btn-danger', 'onclick' => "return ConfirmReject();"));
							?>
						<!-- </button> -->
						<!-- <a onclick="return ConfirmTolak()" href="<?php echo base_url() . 'admin/validasi/delete/' . $pengajuan->pengajuan_id ?>" class="btn btn-danger">Tolak</a> -->

					</form>
					<!-- <button class="btn btn-danger" type="submit">Tolak</button> -->
				</div>
			</div>
		</div>
	</div>
</div>
</div>