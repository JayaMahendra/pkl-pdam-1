<div class="container bootstrap snippets bootdey">
	<div class="row ng-scope">
		<div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="h1 text-center">Detail Pengajuan</div>
					<br><br>
					<div class="row pv-lg">
						<div></div>
						<div class="col-lg-10">
							<form class="form-horizontal ng-pristine ng-valid">
								<div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact1">Proposal</label>
									<div class="col-sm-10">
										<!-- <input class="form-control" id="files" name="inputContact1" type="file">
										<label for="files"><?= $pengajuan->proposal ?></label> -->

										<input class="form-control" name="inputContact1" value="<?= $pengajuan->proposal ?>" disabled>

									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact2">Surat Pengantar</label>
									<div class="col-sm-10">
										<input class="form-control" name="inputContact2" value="<?= $pengajuan->surat_pengantar ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact3">Topik</label>
									<div class="col-sm-10">
										<input class="form-control" name="inputContact3" type="text" value="<?= $pengajuan->topik ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact4">Tanggal Mulai</label>
									<div class="col-sm-10">
										<input class="form-control" name="inputContact4" type="text" value="<?= $pengajuan->tanggal_mulai ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact5">Tanggal Selesai</label>
									<div class="col-sm-10">
										<input class="form-control" name="inputContact5" type="text" value="<?= $pengajuan->tanggal_selesai ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact5">Instansi</label>
									<div class="col-sm-10">
										<input class="form-control" name="inputContact5" type="text" value="<?= $pengajuan->asal ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact5">Jurusan</label>
									<div class="col-sm-10">
										<input class="form-control" name="inputContact5" type="text" value="<?= $pengajuan->jurusan ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact5">Prodi</label>
									<div class="col-sm-10">
										<input class="form-control" name="inputContact5" type="text" value="<?= $pengajuan->prodi ?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact5">Tanggal Disetujui</label>
									<div class="col-sm-10">
										<input class="form-control" name="inputContact5" type="text" value="<?= $pengajuan->tanggal_disetujui ?>">
									</div>
								</div>
						</div>
					</div>
					</form>
					<br>
					<h1>Detail Mahasiswa</h1>
					<br>
					<!-- <form name="form2" action="<?= base_url('member/pengajuan/createm') ?>" method="post"> -->
					<div class="table-responsive">
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
										<td>{$item->nama}</td>
										<td>{$item->nim}</td>
										<td>{$item->alamat}</td>
										<td>{$item->email}</td>
										<td>{$item->handphone}</td>
										<td><img src='assets/uploads/foto/{$item->foto}'></td>
										</tr>";
								}
								
								?>
								<!-- <tr>
									<th scope="row">1</th>
									<td><?= $pengajuan_mahasiswa->nama ?></td>
									<td><input type="text" name="nim" style="border: 0;"></td>
									<td><input type="text" name="alamat" style="border: 0;"></td>
									<td><input type="text" name="email" style="border: 0;"></td>
									<td><input type="text" name="handphone" style="border: 0;"></td>
									<td><input type="file" name="foto" style="border: 0;"></td>
								</tr> -->
								<!-- <tr>
			<th scope="row">2</th>
			<td><input type="text" name="nama" style="border: 0;"></td>
			<td><input type="text" name="nim" style="border: 0;"></td>
			<td><input type="text" name="alamat" style="border: 0;"></td>
			<td><input type="text" name="email" style="border: 0;"></td>
			<td><input type="text" name="handphone" style="border: 0;"></td>
			<td><input type="file" name="foto" style="border: 0;"></td>
		</tr>
		<tr>
			<th scope="row">3</th>
			<td><input type="text" name="nama" style="border: 0;"></td>
			<td><input type="text" name="nim" style="border: 0;"></td>
			<td><input type="text" name="alamat" style="border: 0;"></td>
			<td><input type="text" name="email" style="border: 0;"></td>
			<td><input type="text" name="handphone" style="border: 0;"></td>
			<td><input type="file" name="foto" style="border: 0;"></td>
		</tr>
		<tr>
			<th scope="row">4</th>
			<td><input type="text" name="nama" style="border: 0;"></td>
			<td><input type="text" name="nim" style="border: 0;"></td>
			<td><input type="text" name="alamat" style="border: 0;"></td>
			<td><input type="text" name="email" style="border: 0;"></td>
			<td><input type="text" name="handphone" style="border: 0;"></td>
			<td><input type="file" name="foto" style="border: 0;"></td>
		</tr>
		<tr>
			<th scope="row">5</th>
			<td><input type="text" name="nama" style="border: 0;"></td>
			<td><input type="text" name="nim" style="border: 0;"></td>
			<td><input type="text" name="alamat" style="border: 0;"></td>
			<td><input type="text" name="email" style="border: 0;"></td>
			<td><input type="text" name="handphone" style="border: 0;"></td>
			<td><input type="file" name="foto" style="border: 0;"></td>
		</tr> -->
							</tbody>
						</table>
					</div>
					<!-- <button class="btn btn-primary" type="submit">Save</button> -->
					<!-- </form> -->
				</div>
			</div>
		</div>
	</div>
</div>
</div>