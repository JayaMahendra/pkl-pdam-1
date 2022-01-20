<!-- <?php echo anchor('member/pengajuan', 'Back'); ?>
<form action="<?= base_url('member/pengajuan/update') ?>" method="post"> -->

<div class="container bootstrap snippets bootdey">
	<div class="row ng-scope">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="h4 text-center">Edit Pengajuan</div>
				<div class="row pv-lg">
					<div></div>
					<div class="col-lg-10">
						<form class="form-horizontal ng-pristine ng-valid" action="<?= base_url('member/pengajuan/updatePengajuan/' . $pengajuan->pengajuan_id) ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-sm-2 control-label" >Proposal</label>
								<div class="col-sm-10">
									<label for="example-text"><?= $pengajuan->proposal ?></label>
									<input class="form-control" name="proposal" type="file" value="<?= $pengajuan->proposal ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" >Surat Pengantar</label>
								<div class="col-sm-10">
									<label for="example-text"><?= $pengajuan->surat_pengantar ?></label>
									<input class="form-control" name="surat_pengantar" type="file" value="<?= $pengajuan->surat_pengantar ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Topik</label>
								<div class="col-sm-10">
									<input class="form-control" name="topik" type="text" value="<?= $pengajuan->topik ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" >Instansi</label>
								<div class="col-sm-10">
									<input class="form-control" name="asal" type="text" value="<?= $pengajuan->asal ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" >Jurusan</label>
								<div class="col-sm-10">
									<input class="form-control" name="jurusan" type="text" value="<?= $pengajuan->jurusan ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" >Prodi</label>
								<div class="col-sm-10">
									<input class="form-control" name="prodi" type="text" value="<?= $pengajuan->prodi ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" >Tanggal Mulai</label>
								<div class="col-sm-10">
									<input class="form-control" name="tanggal_mulai" type="date" value="<?= $pengajuan->tanggal_mulai ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" >Tanggal Selesai</label>
								<div class="col-sm-10">
									<input class="form-control" name="tanggal_selesai" type="date" value="<?= $pengajuan->tanggal_selesai ?>">
								</div>
							</div>
							<button class="btn btn-primary" type="submit">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <button class="btn btn-primary" type="submit">Save</button> -->
</div>


<!-- </form> -->