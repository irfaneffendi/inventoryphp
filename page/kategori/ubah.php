<?php 

  $kode_kategori = $_GET['kode_kategori'];
  $sql = $connect->query("SELECT * FROM tbkategori WHERE kode_kategori='$kode_kategori'");
  while($tampil = mysqli_fetch_array($sql)){

 ?>

<h3><i class="fa fa-angle-right"></i> Ubah Kategori</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <form class="form-horizontal style-form" method="POST">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Kategori</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_kategori" value="<?php echo $tampil['nama_kategori']; ?>" autocomplete="off" >
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4">
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    <a href="?page=kategori" class="btn btn-warning">Kembali</a>
                  </div>
                </div>
              </form>  
            <?php } ?>
                
            </div>
          </div>
        </div>
        <!-- /row -->


<?php 
    $nama_kategori = $_POST['nama_kategori'];

    $simpan        = $_POST['simpan'];

  if ($simpan) {
    
    $sql = $connect->query("UPDATE tbkategori SET nama_kategori='$nama_kategori' WHERE kode_kategori='$kode_kategori'");

    if ($sql) {
      ?>
        <script type="text/javascript">
          alert ("Data Berhasil di Ubah");
          window.location.href="?page=kategori";
        </script>
      <?php   
    } 
  } 

 ?>