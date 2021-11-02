<div class="row bg-white p-2">
	<div class="col-sm-12">
	<form action="<?= base_url("dashboard/updateUser/{$data->username}") ?>" method="post">
	
		<div class="form-group">
			<label>username</label>
			<input id="username" name="username" value="<?= $data->username ?>" class="form-control" required />
		</div>
		<div class="form-group">
			<label>email</label>
			<input id="email" name="email" value="<?= $data->email ?>" class="form-control" required />
		</div>
		<div class="form-group">
			<label>password</label>
			<input type="password" id="password" name="password" class="form-control" required />
		</div>
		<div class="form-group">
			<label>password</label>
			<select name="role" class="form-control">
				<option <?= $data->role == 'Admin' ? "selected":"" ?>>Admin</option>
				<option <?= $data->role == 'Operator' ? "selected":"" ?>>Operator</option>
			</select>
		</div>
		<div class="float-right">
			<button class="btn btn-primary">Proses</button>
		</div>
	</form>
	</div>
</div>

<script>
const _data_   = <?= json_encode($data) ?>;
</script>
