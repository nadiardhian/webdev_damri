<div class="row bg-white p-2">
	<div class="col-sm-12">
		<a href="<?= base_url('dashboard/create') ?>" class="btn btn-outline-primary mb-2" >Tambah data</a>
		
		<?php if($_SESSION['user-log'][0]->role == 'Admin'): ?>
		<div class="float-right">
			<button class="btn btn-info btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
				<i class="fas fa-book"></i>&nbsp;Export&nbsp;<span class="sr-only"></span>
			</button>
			<div class="dropdown-menu">
				<a href="<?= base_url('dashboard/report') ?>" target="_blank" class="dropdown-item">.pdf</a>
				<a href="<?= base_url('dashboard/excel') ?>" target="_blank" class="dropdown-item">.excel</a>
			</div>
		</div>
		<?php endif; ?>
		
		<table id="tbl" class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Asal</th>
					<th>Tujuan</th>
					<th>Kursi</th>
					<th>Jadwal</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div>

<!-- 
	--- detail --- 
-->
<div class="modal" id="modal-detail" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Informasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-6">
						Kursi: <h6 id="kursi" class="d-inline"></h6>
					</div>
					<div class="col-sm-6 text-right">
						Tanggal: <h5 id="jadwal" class="d-inline"></h5>
					</div>
				</div>
				<table class="table mt-1">
					<thead>
					<tr>
						<th>Asal</th>
						<th>Tujuan</th>
						<th>Waktu</th>
					</tr>
					</thead>
					<tbody>
						<tr>
							<td id="asal"></td>
							<td id="tujuan"></td>
							<td id="waktu"></td>
						</tr>
					</tbody>
				</table>
				<p class="text-right mt-3">Total biaya: <b id="biaya"></b></p>
			</div>
		</div>
	</div>
</div>
<!-- 
	--- trash --- 
-->
<div class="modal" id="modal-trash" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Peringatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<input type="hidden" id="id-trash">
				<p>Yakin ingin menghapus data ini ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button onClick="doTrash()" type="button" class="btn btn-primary">Hapus</button>
			</div>
		</div>
	</div>
</div>
<script>
const base_url = "<?= base_url('/') ?>";
</script>
<script src="<?= base_url('assets/pemesanan.js') ?>"></script>
