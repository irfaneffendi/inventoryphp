<?php 

$query = "SELECT max(id_user) as maxKode FROM tbuser";
$hasil = mysqli_query($connect, $query);
$data = mysqli_fetch_array($hasil);
$kodeUser = $data['maxKode'];
$noUrut = (int) substr($kodeUser,3,3);
$noUrut ++ ;
$char = "USR";
$kodeUser = $char . sprintf("%03s", $noUrut);



?>

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Tambah User</h4>
              <form class="form-horizontal style-form" method="POST">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode User</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_user" autocomplete="off" readonly value="<?php echo $kodeUser ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Username</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" autofocus="" autocomplete="off" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" autofocus="" autocomplete="off" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama User</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama" autofocus="" autocomplete="off" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Status User</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="status" autofocus="" autocomplete="off" required="">
                    <span class="help-block">pemilik || admin</span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4">
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    <a href="?page=user" class="btn btn-warning">Kembali</a>
                  </div>
                </div>
              </form>  
                
            </div>
          </div>
        </div>
        <!-- /row -->


<?php 
      $id_user           = $_POST['id_user'];
      $username           = $_POST['username'];
      $password           = md5($_POST['password']);
      $nama         = $_POST['nama'];
      $status       = $_POST['status'];


      $simpan              = $_POST['simpan'];

      if ($simpan) {
            
            $sql = $connect->query("INSERT INTO tbuser (id_user, username, password, nama, status) VALUES ('$id_user', '$username', '$password', '$nama', '$status')");

            if ($sql) {
                  ?>
                        <script type="text/javascript">
                              alert ("Data Berhasil di Simpan");
                              window.location.href="?page=user";
                        </script>
                  <?php       
            } 
      } 


 ?>