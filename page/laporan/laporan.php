<div class="col-md-6">
	<div class="form-panel">
		<h3><i class="fa fa-file-o"> Laporan Penerimaan Barang</i></h3>
		<form method="POST" action="laporanpenerimaan.php" target="blank-page">
			<div class="form-group">
				<label>Tanggal Awal</label>
				<input class="form-control" type="date" name="tgl-awal">
			</div>
			<div class="form-group">
				<label>Tanggal Akhir</label>
				<input class="form-control" type="date" name="tgl-akhir">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" name="cetakpenerimaan"><i class="fa fa-print"></i> Cetak</button>
			</div>
		</form>
	</div>
</div>

<div class="col-md-6">
	<div class="form-panel">
		<h3><i class="fa fa-file-o"> Laporan Pengeluaran Barang</i></h3>
		<form method="POST" action="laporanpengeluaran.php" target="blank-page">
			<div class="form-group">
				<label>Tanggal Awal</label>
				<input class="form-control" type="date" name="tgl-awal">
			</div>
			<div class="form-group">
				<label>Tanggal Akhir</label>
				<input class="form-control" type="date" name="tgl-akhir">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" name="cetakpengeluaran"><i class="fa fa-print"></i> Cetak</button>
			</div>
		</form>
	</div>
</div>