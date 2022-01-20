<div class="container bootstrap snippets bootdey">
	<div class="row ng-scope">
		<div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="h1">Detail Pengajuan</div>
					<br><br>
					<div class="row pv-lg">
						<div></div>
						<div class="col-lg-10">
							<form class="form-horizontal ng-pristine ng-valid">
								<form action="<?= base_url('member/pengajuan/update') ?>" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-2 control-label" for="inputContact1">Proposal</label>
										<div class="col-sm-10">
											<a class="form-control" href="<?php echo base_url() . 'member/pengajuan/do_download_propo/' . $pengajuan->proposal ?>"><?= $pengajuan->proposal ?></a>
											<input type="file" class="form-control" name="inputContact1" value="<?= $pengajuan->proposal ?>">

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="inputContact2">Surat Pengantar</label>
										<div class="col-sm-10">
											<a class="form-control" href="<?php echo base_url() . 'member/pengajuan/do_download_supeng/' . $pengajuan->surat_pengantar ?>"><?= $pengajuan->surat_pengantar ?></a>
											<input type="file" class="form-control" name="inputContact2" value="<?= $pengajuan->surat_pengantar ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="inputContact3">Topik</label>
										<div class="col-sm-10">
											<input class="form-control" name="inputContact3" type="text" value="<?= $pengajuan->topik ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="inputContact4">Tanggal Mulai</label>
										<div class="col-sm-10">
											<input class="form-control" name="inputContact4" type="text" value="<?= $pengajuan->tanggal_mulai ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="inputContact5">Tanggal Selesai</label>
										<div class="col-sm-10">
											<input class="form-control" name="inputContact5" type="text" value="<?= $pengajuan->tanggal_selesai ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="inputContact5">Instansi</label>
										<div class="col-sm-10">
											<input class="form-control" name="inputContact5" type="text" value="<?= $pengajuan->asal ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="inputContact5">Jurusan</label>
										<div class="col-sm-10">
											<input class="form-control" name="inputContact5" type="text" value="<?= $pengajuan->jurusan ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="inputContact5">Prodi</label>
										<div class="col-sm-10">
											<input class="form-control" name="inputContact5" type="text" value="<?= $pengajuan->prodi ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="inputContact5">Tanggal Disetujui</label>
										<div class="col-sm-10">
											<input class="form-control" name="inputContact5" type="text" value="<?= $pengajuan->tanggal_disetujui ?>" disabled>
										</div>
									</div>
						</div>
					</div>
					</form>
					<br>
					<h1>Detail Mahasiswa</h1>
					<br>
					<div class="table-responsive-sm">
						<table class="table table-striped">
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
								foreach ($pengajuan_mahasiswa as $item) {
									echo "<tr>
										<td><input type='text' value='$item->nama' style='border:0'></td>
										<td><input type='text' value='$item->nim' style='border:0'></td>
										<td><input type='text' value='$item->alamat' style='border:0'></td>
										<td><input type='text' value='$item->email' style='border:0'></td>
										<td><input type='text' value='$item->handphone' style='border:0'></td>
										<td><img src='assets/uploads/foto/{$item->foto}' width='42' height='42'></td>
										</tr>";
								} ?>
							</tbody>
						</table>
						<button class="btn btn-primary" type="submit">Update</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>