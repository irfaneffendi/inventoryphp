<?php 

$today = date("Ymd");
$query = "SELECT MAX(RIGHT(kode_keluar,12)) as akhir FROM tbpengeluaran WHERE RIGHT(kode_keluar,12) LIKE '$today%'";
$hasil = mysqli_query($connect, $query);
$data = mysqli_fetch_array($hasil);
$noAkhirKeluar = $data['akhir'];
$noAkhirUrut = substr($noAkhirKeluar,8,4);
$noUrutSelanjutnya = $noAkhirUrut + 1;
$noKeluarSelanjutnya = $today . sprintf("%04s", $noUrutSelanjutnya);
$kode = "K";
$no_baru = $kode.$noKeluarSelanjutnya;





	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['tambah'])){
      $kode_keluar         = $_POST['kode_keluar'];
      $kode_barang         = $_POST['kode_barang'];
      $jumlah       	   = $_POST['jumlah'];


       $sql    = $connect->query("SELECT * FROM tbbarang LEFT JOIN tbkategori ON tbkategori.kode_kategori=tbbarang.kode_kategori WHERE kode_barang = '$kode_barang'");
                    while   ($data = mysqli_fetch_array($sql)){ 

                      error_reporting(0);
                      // menghitung jumlah barang masuk
                      $jumlahBarangTerima = "SELECT SUM(jumlah_barang) AS jumlah_barang FROM tbdetail_penerimaan WHERE kode_barang = '$data[kode_barang]'";
                      $hasilBarangMasuk = @mysqli_query($connect, $jumlahBarangTerima) or die (mysqli_error());
                      $barangTerima = mysqli_fetch_array($hasilBarangMasuk);

                      // menghitung jumlah barang keluar
                      $jumlahBarangKeluar = "SELECT SUM(jumlah_barang) AS jumlah_barang FROM tbdetail_pengeluaran WHERE kode_barang = '$data[kode_barang]'";
                      $hasilBarangKeluar = @mysqli_query($connect, $jumlahBarangKeluar) or die (mysqli_error());
                      $barangKeluar = mysqli_fetch_array($hasilBarangKeluar);
        $total = $data['stok'] + $barangTerima['jumlah_barang'] - $barangKeluar['jumlah_barang'];
    }


      // cek apakah ada kode barang yang sama di tabel sementara_pengeluaran	
      $cekData = "SELECT kode_barang FROM tbsementara_pengeluaran WHERE kode_barang='$kode_barang'";
      $ada = mysqli_query($connect, $cekData) or die (mysqli_error());

      if ($jumlah > $total) {
				?>

					<script type="text/javascript">
						alert("Tidak dapat menambah stok keluar karena stok tidak cukup");
						window.location.href="?page=pengeluaran&aksi=tambah";
					</script>
				<?php
	  }else{
		      if (mysqli_num_rows($ada) > 0) {
		      	// jika ada 1 kode barang yang duplikat di tabel sementara_pengeluaran maka jumlah kode barang tersebut akan ditambahkan melalui proses update

		      $ubah = mysqli_query($connect, "UPDATE tbsementara_pengeluaran SET jumlah = jumlah + '$jumlah' WHERE kode_barang = '$kode_barang'");
		      }else{
		      	// apabila kode barang tidak sama maka akan langsung menambahkan data
		      	$simpan = mysqli_query($connect, "INSERT INTO tbsementara_pengeluaran VALUES('', '$kode_keluar', '$kode_barang', '$jumlah')");
			      	if ($simpan) {
			                  echo  "<meta http-equiv='refresh' content='0 url=?page=pengeluaran&aksi=tambah'>";
			        } 
		      }
      }
    }


    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['simpan'])){
      $kode_keluar         = $_POST['kode_keluar'];
      $jumlah_item         = $_POST['jumlah_item'];
      $kode_departement    = $_POST['kode_departement'];
      $id_user			   = $_SESSION['id_user'];
      $keterangan		   = $_POST['keterangan'];

      $simpanData = mysqli_query($connect, "INSERT INTO tbpengeluaran VALUES('$kode_keluar', '$today', '$jumlah_item', '$id_user', '$keterangan')");
	      	if ($simpanData) {
	           // pindahkan data yang ada di tabel sementara_pengeluaran ke tabel detail_pengeluaran
	           $simpanTMP = mysqli_query($connect, "INSERT INTO tbdetail_pengeluaran (kode_keluar, kode_barang, jumlah_barang) SELECT kode, kode_barang, jumlah FROM tbsementara_pengeluaran");

	           // setelah data yang ada di tabel sementara_pengeluaran dipindahkan ke tabel detail_pengeluaran, maka hapus  semua data yang ada di tabel sementara_pengeluaran
	           $hapusTMP = mysqli_query($connect, "DELETE FROM tbsementara_pengeluaran") or die(mysqli_error());

	           echo  "<script>
	           			window.alert('Data Pengeluaran Barang Berhasil di Simpan')
					  </script>";
			   echo "<meta http-equiv='refresh' content='0 url=?page=pengeluaran'>";     
	        } 
      
    }


?>

<!-- Panel atas -->
<div class="form-panel">
	<h3><i class="fa fa-backward"> Tambah Data Pengeluaran</i></h3>
	<div class="row">
		<div class="col-md-12">
			<div class="row">

				<!-- row kiri -->
				<div class="col-md-6">
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>No Keluar</label>
							<input class="form-control" type="text" required="" readonly autocomplete="off" name="kode_keluar" value="<?php echo $no_baru ?>">
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
		                    $sql    = $connect->query("SELECT * FROM tbsementara_pengeluaran LEFT JOIN tbbarang ON tbbarang.kode_barang = tbsementara_pengeluaran.kode_barang");
		                    while   ($data = mysqli_fetch_array($sql)){ 
		                  ?>
			                  <tr>
			                    <td><?php echo $data['kode_barang']; ?></td>
			                    <td><?php echo $data['nama_barang']; ?></td>
			                    <td><?php echo $data['jumlah']; ?></td>
			                    <td>
			                      <a href="?page=pengeluaran&aksi=hapussementara&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus')"><i class="fa fa-trash "></i></a>
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
	<h3><i class="fa fa-save"> Simpan Data Pengeluaran</i></h3>
	<div class="row">
		<div class="col-md-12">
			<div class="row">

				<!-- row kiri -->
				<div class="col-md-6">
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>No Keluar</label>
							<input class="form-control" type="text" required="" readonly autocomplete="off" name="kode_keluar" value="<?php echo $no_baru ?>">
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
							<input class="form-control" type="text" required="" readonly autocomplete="off" value=" <?php echo $_SESSION['nama'] ?> ">
					</div>

					<div class="form-group">
							<label>Jumlah Item Barang</label>
								<?php 
					                $item = mysqli_query($connect, "SELECT kode_barang FROM tbsementara_pengeluaran");
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
