<?php 

  $kode_barang = $_GET['kode_barang'];
  $sql = $connect->query("SELECT * FROM tbbarang LEFT JOIN tbkategori ON tbkategori.kode_kategori=tbbarang.kode_kategori WHERE kode_barang='$kode_barang'");
  while($tampil = mysqli_fetch_array($sql)){
?>

<h3><i class="fa fa-angle-right"></i> Ubah Barang</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <form class="form-horizontal style-form" method="POST">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Barang</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="kode_barang" autocomplete="off" readonly value="<?php echo $tampil['kode_barang']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_barang" autocomplete="off" required="" value="<?php echo $tampil['nama_barang']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="kode_kategori">
                        <?php 
                        $query = mysqli_query($connect, "SELECT * FROM tbkategori");
                        while($k = mysqli_fetch_array($query)){
                            if($tampil['kode_kategori']==$k['kode_kategori']){
                            echo "<option value=$k[kode_kategori] selected>$k[nama_kategori]</option>";
                          }else{
                            echo "<option value=$k[kode_kategori] >$k[nama_kategori]</option>";
                          }
                        }
                         ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Spesifikasi</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="spesifikasi" autocomplete="off" required="" value="<?php echo $tampil['spesifikasi']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Stok</label>
                  <div class="col-sm-6">
                    <input type="number" class="form-control" onkeypress="return hanyaAngka(event)" name="stok" autocomplete="off" required="" value="<?php echo $tampil['stok']; ?>">
                  </div>
                </div>

              

                <div class="form-group">
                  <div class="col-sm-4">
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    <a href="?page=barang" class="btn btn-warning">Kembali</a>
                  </div>
                </div>
              </form>  
            <?php } ?>
                
            </div>
          </div>
        </div>
        <!-- /row -->


<?php 
    $kode_barang    = $_POST['kode_barang'];
    $nama_barang    = $_POST['nama_barang'];
    $kode_kategori  = $_POST['kode_kategori'];
    $spesifikasi    = $_POST['spesifikasi'];
    $stok           = $_POST['stok'];

    $simpan         = $_POST['simpan'];

  if ($simpan) {
    
    $sql = $connect->query("UPDATE tbbarang SET kode_barang='$kode_barang', nama_barang='$nama_barang', kode_kategori='$kode_kategori', spesifikasi='$spesifikasi', stok='$stok' WHERE kode_barang='$kode_barang'");

    if ($sql) {
      ?>
        <script type="text/javascript">
          alert ("Data Berhasil di Ubah");
          window.location.href="?page=barang";
        </script>
      <?php   
    } 
  } 

 ?>