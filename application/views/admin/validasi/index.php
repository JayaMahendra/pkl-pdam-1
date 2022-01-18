
<div class="table-responsive" style="padding-top: 6px">
	<table class="table table-striped table-hover table-condensed" id="mytable" style="width: 100%">
		<thead>
			<tr class="active">
				<th class="text-center" width="30px" style="padding-left: 20px;">No</th>
				<th>Proposal</th>
				<th>Surat Pengantar</th>
				<th>Topik</th>
				<th>Instansi</th>
				<th>Jurusan</th>
				<th>Prodi</th>
				<th>Status</th>
				<th class="text-center" width="160px" style="padding-left: 20px;">Tindakan</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
            foreach ($pengajuans as $pengajuan) { ?>
				<tr>
					<td class="text-center" width="30px" style="padding-left: 20px;"><?= $no++ ?></td>
					<td><?= $pengajuan->proposal ?></td>
					<td><?= $pengajuan->surat_pengantar ?></td>
					<td><?= $pengajuan->topik ?></td>
					<td><?= $pengajuan->asal ?></td>
					<td><?= $pengajuan->jurusan ?></td>
					<td><?= $pengajuan->prodi ?></td>
					<td>
                        <?php 
                            if ($this->session->userdata('tanggal_disetujui') == NULL){
                        ?>
                                BELUM DISETUJUI
                        <?php
                            } else {
                        ?>
                                TELAH DISETUJUI
                                <?php
                            }
                        ?>
                    </td>
					<!-- <td><?= $this->session->userdata('status_pengajuan') ?></td> -->
					<td class="text-center" width="160px" style="padding-left: 20px;">
                        <?php echo anchor('admin/validasi/detail/' . $pengajuan->pengajuan_id, 'Detail'); ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
