
<div class="container bootstrap snippets bootdey">
	<div class="row ng-scope">
		<div>
			<div class="panel panel-default">
				<div class="panel-body">
					<!-- <form class="form-horizontal ng-pristine ng-valid" action="<?= base_url('admin/validasi/validasi_Pengajuan/' . $pengajuan->pengajuan_id) ?>" method="post" enctype="multipart/form-data"> -->
						<div class="h1">Data Magang</div>
						<br><br>
						<div class="row pv-lg">
							<div class="col-lg-10">
								<div class="form-group">
									<label class="col-sm-2 control-label">Topik</label>
									<div class="col-sm-10">
										<!-- <input class="form-control" name="topik" type="text" value="<?= $pengajuan->topik ?>" disabled> -->
                                        <p><?php echo $pengajuan->topik ?></p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Instansi</label>
									<div class="col-sm-10">
										<!-- <input class="form-control" name="asal" type="text" value="<?= $pengajuan->asal ?>" disabled> -->
                                        <p><?php echo $pengajuan->asal ?></p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Jurusan</label>
									<div class="col-sm-10">
										<!-- <input class="form-control" name="jurusan" type="text" value="<?= $pengajuan->jurusan ?>" disabled> -->
                                        <p><?php echo $pengajuan->jurusan ?></p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Prodi</label>
									<div class="col-sm-10">
										<!-- <input class="form-control" name="prodi" type="text" value="<?= $pengajuan->prodi ?>" disabled> -->
                                        <p><?php echo $pengajuan->prodi ?></p>
									</div>
								</div>
                                <div class="form-group">
									<label class="col-sm-2 control-label">Tanggal Mulai</label>
									<div class="col-sm-10">
										<!-- <input class="form-control" name="tanggal_mulai" type="date" value="<?= $pengajuan->tanggal_mulai ?>" disabled> -->
                                        <p><?php echo $pengajuan->tanggal_mulai ?></p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tanggal Selesai</label>
									<div class="col-sm-10">
										<!-- <input class="form-control" name="tanggal_selesai" type="date" value="<?= $pengajuan->tanggal_selesai ?>" disabled> -->
                                        <p><?php echo $pengajuan->tanggal_selesai ?></p>
									</div>
								</div>
                                <div class="form-group">
									<label class="col-sm-2 control-label">Tanggal Disetujui</label>
									<div class="col-sm-10">
										<input class="form-control" name="tanggal_disetujui" type="text" value="<?= $pengajuan->tanggal_disetujui ?>" disabled>
                                        <!-- <p><?php echo $pengajuan->tanggal_disetujui ?></p> -->
									</div>
								</div>
                                <div class="form-group">
									<label class="col-sm-2 control-label">Surat Balasan</label>
									<div class="col-sm-10">
										<a name="proposaltmp" class="form-control" href="<?php echo base_url() . 'member/pengajuan/do_download_propo/' . $pengajuan->proposal ?>"><?= $pengajuan->proposal ?></a>
									</div>
								</div>
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
										<td><img src='".base_url('assets/uploads/foto/').$item->foto."' width='42' height='42' disabled></td>
										</tr>";
										$i++;
									} ?>
								</tbody>
							</table>
							<!-- <button class="btn btn-primary" type="submit">Update</button> -->
							<!-- </form> -->
						</div>
						<!-- <button class="btn btn-primary" type="submit">Update</button> -->
						<!-- <button class="btn btn-success" type="submit">Setujui</button> -->
					<!-- </form>
					<button class="btn btn-danger" type="submit">Tolak</button> -->
				</div>
			</div>
		</div>
	</div>
</div>
</div>
