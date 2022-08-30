<?php 

$today = date("Ymd");
$bulan = date("m");
$query = "SELECT MAX(RIGHT(kode_terima,12)) as akhir FROM tbpenerimaan WHERE RIGHT(kode_terima,12) LIKE '$today%'";
$hasil = mysqli_query($connect, $query);
$data = mysqli_fetch_array($hasil);
$noAkhirTerima = $data['akhir'];
$noAkhirUrut = substr($noAkhirTerima,8,4);
$noUrutSelanjutnya = $noAkhirUrut + 1;
$noTerimaSelanjutnya = $today . sprintf("%04s", $noUrutSelanjutnya);
$kode = "M";
$no_baru = $kode.$noTerimaSelanjutnya;





	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['tambah'])){
      $kode_terima         = $_POST['kode_terima'];
      $kode_barang         = $_POST['kode_barang'];
      $jumlah       	   = $_POST['jumlah'];


      // cek apakah ada kode barang yang sama di tabel sementara_penerimaan	
      $cekData = "SELECT kode_barang FROM tbsementara_penerimaan WHERE kode_barang='$kode_barang'";
      $ada = mysqli_query($connect, $cekData) or die (mysqli_error());

      if (mysqli_num_rows($ada) > 0) {
      	// jika ada 1 kode barang yang duplikat di tabel sementara_penerimaan maka jumlah kode barang tersebut akan ditambahkan melalui proses update

      $ubah = mysqli_query($connect, "UPDATE tbsementara_penerimaan SET jumlah = jumlah + '$jumlah' WHERE kode_barang = '$kode_barang'");
      }else{
      	// apabila kode barang tidak sama maka akan langsung menambahkan data
      	$simpan = mysqli_query($connect, "INSERT INTO tbsementara_penerimaan VALUES('', '$kode_terima', '$kode_barang', '$jumlah')");
	      	if ($simpan) {
	                  echo  "<meta http-equiv='refresh' content='0 url=?page=penerimaan&aksi=tambah'>";
	        } 
      }
      
    }


    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['simpan'])){
      $kode_terima         = $_POST['kode_terima'];
      $jumlah_item         = $_POST['jumlah_item'];
      $id_user			   = $_SESSION['id_user'];
      $keterangan		   = $_POST['keterangan'];

      $simpanData = mysqli_query($connect, "INSERT INTO tbpenerimaan VALUES('$kode_terima', '$today', '$jumlah_item', '$id_user', '$keterangan')");
	      	if ($simpanData) {
	           // pindahkan data yang ada di tabel sementara_penerimaan ke tabel detail_penerimaan
	           $simpanTMP = mysqli_query($connect, "INSERT INTO tbdetail_penerimaan (kode_terima, kode_barang, jumlah_barang) SELECT kode, kode_barang, jumlah FROM tbsementara_penerimaan");

	           // setelah data yang ada di tabel sementara_penerimaan dipindahkan ke tabel detail_penerimaan, maka hapus  semua data yang ada di tabel sementara_penerimaan
	           $hapusTMP = mysqli_query($connect, "DELETE FROM tbsementara_penerimaan") or die(mysqli_error());

	           echo  "<script>
	           			window.alert('Data Penerimaan Barang Berhasil di Simpan')
					  </script>";
			   echo "<meta http-equiv='refresh' content='0 url=?page=penerimaan'>";     
	        } 
      
    }


?>

<!-- Panel atas -->
<div class="form-panel">
	<h3><i class="fa fa-backward"> Tambah Data Penerimaan</i></h3>
	<div class="row">
		<div class="col-md-12">
			<div class="row">

				<!-- row kiri -->
				<div class="col-md-6">
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>No Terima</label>
							<input class="form-control" type="text" required="" readonly autocomplete="off" name="kode_terima" value="<?php echo $no_baru ?>">
						</div>

						<div class="form-group">
							<label>Nama Barang</label>
							<select class="form-control" type="text" name="kode_barang" onchange="changeValue(this.value)">
			                        <?php 
			                        $sql_barang = "SELECT * FROM tbbarang";
			                        $query = mysqli_query($connect, $sql_barang);
			                        while($k = mysqli_fetch_array($query)){
			                            echo "<option value=$k[kode_barang] selected>$k[nama_barang]</option>";
			                        }
			                         ?>
                    		</select>
						</div>

						<div class="form-group">
							<label>Jumlah</label>
							<input type="number" class="form-control" name="jumlah" onkeypress="return hanyaAngka(event)" autocomplete="off" required="">
						</div>

						<div class="form-group">
							<button class="btn btn-primary" name="tambah">Tambah</button>
						</div>
					</form>
				</div>
				<!-- tutup row kiri -->

				<!-- row kanan -->
				<div class="col-md-6">
					<table class="table table-striped table-advance table-hover">
						<thead>
							<tr>
								<th>Kode Barang</th>
								<th>Nama Barang</th>
								<th>Jumlah</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
		                  <?php 
		                    $no     = 1;
		                    $sql    = $connect->query("SELECT * FROM tbsementara_penerimaan LEFT JOIN tbbarang ON tbbarang.kode_barang = tbsementara_penerimaan.kode_barang");
		                    while   ($data = mysqli_fetch_array($sql)){ 
		                  ?>
			                  <tr>
			                    <td><?php echo $data['kode_barang']; ?></td>
			                    <td><?php echo $data['nama_barang']; ?></td>
			                    <td><?php echo $data['jumlah']; ?></td>
			                    <td>
			                      <a href="?page=penerimaan&aksi=hapussementara&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus')"><i class="fa fa-trash "></i></a>
			                    </td>
			                  </tr>
		                  <?php } ?>
		                </tbody>
					</table>
				</div>
				<!-- tutup row kanan -->
			</div>
		</div>
	</div>
</div>
<!-- tutup panel atas -->


<!-- panel bawah -->
<div class="form-panel">
	<h3><i class="fa fa-save"> Simpan Data Penerimaan</i></h3>
	<div class="row">
		<div class="col-md-12">
			<div class="row">

				<!-- row kiri -->
				<div class="col-md-6">
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>No Terima</label>
							<input class="form-control" type="text" required="" readonly autocomplete="off" name="kode_terima" value="<?php echo $no_baru ?>">
						</div>

						<div class="form-group">
							<label>Keterangan</label>
							<input class="form-control" type="text" required="" id="keterangan" autocomplete="off" name="keterangan">
						</div>


						<div class="form-group">
							<button class="btn btn-primary" name="simpan">Simpan</button>
						</div>
				</div>
				<!-- tutup row kiri -->

				<!-- row kanan -->
				<div class="col-md-6">


					<div class="form-group">
							<label>Penanggung Jawab</label>
							<input class="form-control" type="text" required="" readonly autocomplete="off" name="penerima" value=" <?php echo $_SESSION['nama'] ?> ">
					</div>

					<div class="form-group">
							<label>Jumlah Item Barang</label>
								<?php 
					                $item = mysqli_query($connect, "SELECT kode_barang FROM tbsementara_penerimaan");
					                $jumlahItem = mysqli_num_rows($item);
					            ?>
							<input class="form-control" type="text" readonly value=" <?php echo $jumlahItem ?> " id="jumlah_item" autocomplete="off" name="jumlah_item">
					</div>

				</div>
				<!-- tutup row kanan -->
					</form>
			</div>
		</div>
	</div>
</div>
<!-- tutup panel bawah -->
