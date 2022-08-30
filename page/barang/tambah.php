<?php 

$query = "SELECT max(kode_barang) as maxKode FROM tbbarang";
$hasil = mysqli_query($connect, $query);
$data = mysqli_fetch_array($hasil);
$kodeBarang = $data['maxKode'];
$noUrut = (int) substr($kodeBarang,3,3);
$noUrut ++ ;
$char = "BRG";
$kodeBarang = $char . sprintf("%03s", $noUrut);



?>

<h3><i class="fa fa-angle-right"></i> Tambah Barang</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <form class="form-horizontal style-form" method="POST">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Barang</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="kode_barang" autocomplete="off" readonly value="<?php echo $kodeBarang ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_barang" autofocus="" autocomplete="off" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="kode_kategori">
                        <option value="">-Pilih-</option>
                        <?php 
                        $sql_kategori = "SELECT * FROM tbkategori";
                        $query = mysqli_query($connect, $sql_kategori);
                        while($k = mysqli_fetch_array($query)){
                            echo "<option value=$k[kode_kategori]>$k[nama_kategori]</option>";
                        }
                         ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Spesifikasi / Satuan</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="spesifikasi" autofocus="" autocomplete="off" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Stok</label>
                  <div class="col-sm-6">
                    <input type="number" class="form-control" name="stok" autofocus="" onkeypress="return hanyaAngka(event)" autocomplete="off" required="">
                  </div>
                </div>

                

                <div class="form-group">
                  <div class="col-sm-4">
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    <a href="?page=barang" class="btn btn-warning">Kembali</a>
                  </div>
                </div>
              </form>  
                
            </div>
          </div>
        </div>
        <!-- /row -->


<?php 
      $kode_barang         = $_POST['kode_barang'];
      $nama_barang         = $_POST['nama_barang'];
      $kode_kategori       = $_POST['kode_kategori'];
      $spesifikasi         = $_POST['spesifikasi'];
      $stok                = $_POST['stok'];

      $simpan              = $_POST['simpan'];

      if ($simpan) {
            
            $sql = $connect->query("INSERT INTO tbbarang (kode_barang, nama_barang, kode_kategori, spesifikasi, stok) VALUES ('$kode_barang', '$nama_barang', '$kode_kategori', '$spesifikasi', '$stok')");

            if ($sql) {
                  ?>
                        <script type="text/javascript">
                              alert ("Data Berhasil di Simpan");
                              window.location.href="?page=barang";
                        </script>
                  <?php       
            } 
      } 


 ?>