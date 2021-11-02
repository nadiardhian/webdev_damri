<div class="row bg-white p-2">
	<div class="col-sm-12">
	<form action="<?= base_url("dashboard/update/{$data->id}") ?>" method="post">
	
		<div class="form-group">
			<label>Asal</label>
			<select id="asal" name="asal" class="form-control" required ></select>
		</div>
		<div class="form-group">
			<label>Tujuan</label>
			<select id="tujuan" name="tujuan" class="form-control" required ></select>
		</div>
		<div class="form-group">
			<label>Tanggal</label>
			<input type="date" value="<?= $data->tglJadwal ?>" name="jadwal" class="form-control" required >
		</div>
		<div class="form-group">
			<label>Waktu</label>
			<input type="time" value="<?= $data->jamKeberangkatan ?>" name="jam" class="form-control" required >
		</div>
		<div class="form-group">
			<label>Harga</label>
			<input name="harga" value="<?= $data->harga ?>" type="number" min="0" class="form-control" required >
		</div>
		<div class="form-group">
			<label>Kursi</label>
			<input name="kursi" value="<?= $data->seat ?>" placeholder="C1" type="text" class="form-control" required >
		</div>
		<div class="float-right">
			<button class="btn btn-primary">Proses</button>
		</div>
	</form>
	</div>
</div>

<script>
const base_url = "<?= base_url('/') ?>";
const _data_   = <?= json_encode($data) ?>;
</script>
<script src="<?= base_url('assets/edit.js') ?>"></script>
