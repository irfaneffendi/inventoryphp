<?php 

$kode_terima = $_GET['kode_terima'];

$dataAtas    = $connect->query("SELECT * FROM tbpenerimaan");
$data = mysqli_fetch_array($dataAtas);
?>
<div class="col-lg-12 mt">
	<div class="row content-panel">
		<div class="col-lg-12 col-lg-offset-1">
			<div class="pull-left">
				<h2>Detail Penerimaan Barang</h2>
			</div>
				<div class="clearfix"></div>


					<table id="example1" class="table table-bordered table-hover">
						<thead>
							<?php 
								$dataBawah    = $connect->query("SELECT * FROM tbpenerimaan LEFT JOIN tbdetail_penerimaan ON tbdetail_penerimaan.kode_terima=tbpenerimaan.kode_terima LEFT JOIN tbbarang ON tbbarang.kode_barang=tbdetail_penerimaan.kode_barang WHERE tbpenerimaan.kode_terima = '$kode_terima'");
								?>
							<tr>
								<th >NOMOR TERIMA</th>
								<th >KODE BARANG</th>
								<th >NAMA BARANG</th>
								<th >TOTAL</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							while   ($data = mysqli_fetch_array($dataBawah)){  
							?>
							<tr>
								<td><?php echo $data['kode_terima'] ?></td>
								<!-- <td><?php echo tgl_indo( $data['tanggal_terima']) ?></td> -->
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
					<a href="?page=penerimaan" class="btn btn-info">Kembali</a>
				</div>
			</div>
	</div>
</div>