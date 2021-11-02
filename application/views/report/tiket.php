<!DOCTYPE html>
<html>
	<head>
	<style>
	*{font-family:helvetica}
	table{border-collapse:collapse}
	table th{text-align:left;border-bottom:1px solid silver}
	table td{text-align:left;border-bottom:1px solid silver}
	</style>
	</head>
	<body>
	<h3 align='center'>Report tiket</h3>
		<table class="table" width="100%" cellpadding="4px">
			<thead>
				<tr>
					<th>#</th>
					<th>Asal</th>
					<th>Tujuan</th>
					<th>Jadwal</th>
					<th>Waktu</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>
		<?php
		$no = 1;
		foreach($data as $row) {
			echo "<tr>
					<td>".($no)."</td>
					<td>{$row->asal}</td>
					<td>{$row->tujuan}</td>
					<td>{$row->tglJadwal}</td>
					<td>{$row->jamKeberangkatan}</td>
					<td>".number_format($row->harga,0,'.',',')."</td>
				 </tr>";
			$no++;
		}
		?>
			</tbody>
		</table>
	</body>
</html>
