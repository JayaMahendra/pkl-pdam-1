<!-- <?php echo anchor('admin/validasi', 'Back'); ?>
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
</table> -->

<div class="container bootstrap snippets bootdey">
	<div class="row ng-scope">
		<div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="h4 text-center">Detail Pengajuan</div>
					<div class="row pv-lg">
						<div></div>
						<div class="col-lg-10">
							<form class="form-horizontal ng-pristine ng-valid">
								<div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact1">Proposal</label>
									<div class="col-sm-10">
										<!-- <input class="form-control" id="files" name="inputContact1" type="file">
										<label for="files"><?= $pengajuan->proposal ?></label> -->

										<label for="example-text"><?= $pengajuan->proposal ?></label>

										<input type="file" name="file_name" id="file_name" class="form-control-file" value="<?= $pengajuan->proposal ?>">

									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact2">Surat Pengantar</label>
									<div class="col-sm-10">
										<input class="form-control" name="inputContact2" type="file" value="<?= $pengajuan->surat_pengantar ?>">
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
										<input class="form-control" name="inputContact5" type="text" value="<?= $pengajuan->tanggal_disetujui ?>">
									</div>
								</div>
                                <div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact5">Mahasiswa 1</label>
									<div class="col-sm-10">
										<input class="form-control" name="inputContact5" type="text" value="<?= $pengajuan->mhs1 ?>">
									</div>
								</div>
                                <div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact5">Mahasiswa 2</label>
									<div class="col-sm-10">
										<input class="form-control" name="inputContact5" type="text" value="<?= $pengajuan->mhs2 ?>">
									</div>
								</div>
                                <div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact5">Mahasiswa 3</label>
									<div class="col-sm-10">
										<input class="form-control" name="inputContact5" type="text" value="<?= $pengajuan->mhs3 ?>">
									</div>
								</div>
                                <div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact5">Mahasiswa 4</label>
									<div class="col-sm-10">
										<input class="form-control" name="inputContact5" type="text" value="<?= $pengajuan->mhs4 ?>">
									</div>
								</div>
                                <div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact5">Mahasiswa 5</label>
									<div class="col-sm-10">
										<input class="form-control" name="inputContact5" type="text" value="<?= $pengajuan->mhs5 ?>">
									</div>
								</div>
								<!-- <div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact6">Instansi</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="inputContact6" row="4">Some nice Street, 1234</textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact7">Jurusan</label>
									<div class="col-sm-10">
										<input class="form-control" name="inputContact7" type="text" value="@Social">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="inputContact8">Prodi</label>
									<div class="col-sm-10">
										<input class="form-control" name="inputContact8" type="text" placeholder="No Company">
									</div>
								</div> -->
								<!-- <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button class="btn btn-info" type="submit">Update</button>
                                </div>
                            </div> -->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>