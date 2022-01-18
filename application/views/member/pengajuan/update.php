<!-- <?php echo anchor('member/pengajuan', 'Back'); ?>
<form action="<?= base_url('member/pengajuan/update') ?>" method="post"> -->
<!-- <table>
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
	</table> -->

<div class="container bootstrap snippets bootdey">
	<div class="row ng-scope">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="h4 text-center">Update Pengajuan</div>
				<div class="row pv-lg">
					<div></div>
					<div class="col-lg-10">
						<form class="form-horizontal ng-pristine ng-valid">
							<!-- <div class="form-group">
										<label class="col-sm-2 control-label" for="inputContact1">Proposal</label>
										<div class="col-sm-10">
											<label for="example-text"><?= $pengajuan->proposal ?></label>
											<input type="file" name="file_name" id="file_name" class="form-control-file" value="<?= $pengajuan->proposal ?>">
										</div>
									</div> -->
							<div class="form-grou
							p">
								<label class="col-sm-2 control-label" for="inputContact1">Porposal</label>
								<div class="col-sm-10">
									<label for="example-text"><?= $pengajuan->proposal ?></label>
									<input class="form-control" name="inputContact1" type="file">

								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="inputContact2">Surat Pengantar</label>
								<div class="col-sm-10">
									<label for="example-text"><?= $pengajuan->surat_pengantar ?></label>
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
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<button class="btn btn-primary" type="submit">Save</button>
</div>


<!-- </form> -->