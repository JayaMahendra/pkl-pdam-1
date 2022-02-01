<form action="<?= base_url('member/pengajuan/create') ?>" method="post" enctype="multipart/form-data">
	<div class="container-fluid">
		<div>
			<h1>FORM PENGAJUAN</h1>
			<div class="form-group">
				<div class="form-group col-sm-6 flex-column d-flex">
					<label for="exampleInputEmail1">Proposal</label>
					<input type="file" class="form-control" name="proposal" placeholder="Proposal">
				</div>
				<div class="form-group col-sm-6 flex-column d-flex">
					<label for="exampleInputPassword1">Surat Pengantar</label>
					<input type="file" class="form-control" name="surat_pengantar" placeholder="Surat Pengantar">
				</div>
			</div>
			<div class="form-group">
				<div class="form-group col-sm-6 flex-column d-flex">
					<label for="exampleInputEmail1">Topik</label>
					<input type="text" class="form-control" name="topik" placeholder="Topik">
				</div>
				<div class="form-group col-sm-6 flex-column d-flex">
					<label for="exampleInputPassword1">Instansi</label>
					<input type="text" class="form-control" name="asal" placeholder="Instansi">
				</div>
			</div>
			<div class="form-group">
				<div class="form-group col-sm-6 flex-column d-flex">
					<label for="exampleInputEmail1">Jurusan</label>
					<input type="text" class="form-control" name="jurusan" placeholder="Jurusan">
				</div>
				<div class="form-group col-sm-6 flex-column d-flex">
					<label for="exampleInputPassword1">Prodi</label>
					<input type="text" class="form-control" name="prodi" placeholder="Prodi">
				</div>
			</div>
			<div class="form-group">
				<div class="form-group col-sm-6 flex-column d-flex">
					<label for="exampleInputEmail1">Tanggal Mulai</label>
					<input type="date" class="form-control" name="tanggal_mulai" placeholder="Tanggal Mulai">
				</div>
				<div class="form-group col-sm-6 flex-column d-flex">
					<label for="exampleInputPassword1">Tanggal Selesai</label>
					<input type="date" class="form-control" name="tanggal_selesai" placeholder="Tanggal Selesai">
				</div>
			</div>
		</div>
	</div>
	<br><br>
	<div class="container-fluid">
	<h1>DETAIL MAHASISWA</h1>
	<div class="table-responsive">
		<table class="table table-sm">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama</th>
					<th scope="col">NIM</th>
					<th scope="col">Alamat</th>
					<th scope="col">Email</th>
					<th scope="col">Handphone</th>
					<th scope="col">Foto</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<td><input type="text" name="nama0" style="border: 0;"></td>
					<td><input type="text" name="nim0" style="border: 0;"></td>
					<td><input type="text" name="alamat0" style="border: 0;"></td>
					<td><input type="text" name="email0" style="border: 0;"></td>
					<td><input type="text" name="handphone0" style="border: 0;"></td>
					<td><input type="file" name="foto0" style="border: 0;"></td>
				</tr>
				<tr>
					<th scope="row">2</th>
					<td><input type="text" name="nama1" style="border: 0;"></td>
					<td><input type="text" name="nim1" style="border: 0;"></td>
					<td><input type="text" name="alamat1" style="border: 0;"></td>
					<td><input type="text" name="email1" style="border: 0;"></td>
					<td><input type="text" name="handphone1" style="border: 0;"></td>
					<td><input type="file" name="foto1" style="border: 0;"></td>
				</tr>

				<tr>
					<th scope="row">3</th>
					<td><input type="text" name="nama2" style="border: 0;"></td>
					<td><input type="text" name="nim2" style="border: 0;"></td>
					<td><input type="text" name="alamat2" style="border: 0;"></td>
					<td><input type="text" name="email2" style="border: 0;"></td>
					<td><input type="text" name="handphone2" style="border: 0;"></td>
					<td><input type="file" name="foto2" style="border: 0;"></td>
				</tr>
				<tr>
					<th scope="row">4</th>
					<td><input type="text" name="nama3" style="border: 0;"></td>
					<td><input type="text" name="nim3" style="border: 0;"></td>
					<td><input type="text" name="alamat3" style="border: 0;"></td>
					<td><input type="text" name="email3" style="border: 0;"></td>
					<td><input type="text" name="handphone3" style="border: 0;"></td>
					<td><input type="file" name="foto3" style="border: 0;"></td>
				</tr>
				<tr>
					<th scope="row">5</th>
					<td><input type="text" name="nama4" style="border: 0;"></td>
					<td><input type="text" name="nim4" style="border: 0;"></td>
					<td><input type="text" name="alamat4" style="border: 0;"></td>
					<td><input type="text" name="email4" style="border: 0;"></td>
					<td><input type="text" name="handphone4" style="border: 0;"></td>
					<td><input type="file" name="foto4" style="border: 0;"></td>
				</tr>
			</tbody>
		</table>
	</div>
	<button class="btn btn-primary" type="submit">Submit</button>
</form>
</div>
</div>

</script>