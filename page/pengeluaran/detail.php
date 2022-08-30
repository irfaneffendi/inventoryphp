<?php 

$kode_keluar = $_GET['kode_keluar'];

$dataAtas    = $connect->query("SELECT * FROM tbpengeluaran");
$data = mysqli_fetch_array($dataAtas);
?>
<div class="col-lg-12 mt">
	<div class="row content-panel">
		<div class="col-lg-12 col-lg-offset-1">
			<div class="pull-left">
				<h2>Detail Pengeluaran Barang</h2>
			</div>
				<div class="clearfix"></div>

					<table id="example1" class="table table-bordered table-hover">
						<thead>
								<?php 
								$dataBawah    = $connect->query("SELECT * FROM tbpengeluaran LEFT JOIN tbdetail_pengeluaran ON tbdetail_pengeluaran.kode_keluar=tbpengeluaran.kode_keluar LEFT JOIN tbbarang ON tbbarang.kode_barang=tbdetail_pengeluaran.kode_barang WHERE tbpengeluaran.kode_keluar = '$kode_keluar'");
								?>
							<tr>
								<th>NOMOR KELUAR</th>
								<th>KODE BARANG</th>
								<th>NAMA BARANG</th>
								<th>TOTAL</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							while   ($data = mysqli_fetch_array($dataBawah)){  
							?>
							<tr>
								<td><?php echo $data['kode_keluar'] ?></td>
								<td><?php echo $data['kode_barang'] ?></td>
								<td><?php echo $data['nama_barang'] ?></td>
								<td><?php echo $data['jumlah_barang'] ?></td>
							</tr>
						<?php  
						}
						?>	
						</tbody>
					</table>

					

		</div>
			<div class="form-group">
				<div class="col-sm-4">
					<a href="?page=pengeluaran" class="btn btn-info">Kembali</a>
				</div>
			</div>
	</div>
</div>