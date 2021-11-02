<div class="row bg-white p-2">
	<div class="col-sm-12">
	<a href="<?= base_url('/dashboard/addUser') ?>" class="btn btn-primary mb-2">Add user</a>
		<table id="tbl-user" class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>username</th>
					<th>email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div>

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
<script src="<?= base_url('assets/user.js') ?>"></script>
