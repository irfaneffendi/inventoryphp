<?php 

  $id_user = $_GET['id_user'];
  $sql = $connect->query("SELECT * FROM tbuser WHERE id_user='$id_user'");
  while($tampil = mysqli_fetch_array($sql)){

 ?>

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Ubah User</h4>
              <form class="form-horizontal style-form" method="POST">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode User</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_user" autocomplete="off" readonly value="<?php echo $tampil['id_user']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Username</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" autocomplete="off" required="" value="<?php echo $tampil['username']; ?>">
                  </div>
                </div>

                <!-- <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" autocomplete="off" required="" value="<?php echo $tampil['password']; ?>">
                  </div>
                </div> -->

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama User</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama" autocomplete="off" required="" value="<?php echo $tampil['nama']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Status User</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="status" autocomplete="off" required="" value="<?php echo $tampil['status']; ?>">
                    <span class="help-block">pemilik || admin</span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4">
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    <a href="?page=User" class="btn btn-warning">Kembali</a>
                  </div>
                </div>
              </form>  
            <?php } ?>
                
            </div>
          </div>
        </div>
        <!-- /row -->


<?php 
    $id_user     = $_POST['id_user'];
    $username       = $_POST['username'];
    $password       = md5($_POST['password']);
    $nama     = $_POST['nama'];
    $status   = $_POST['status'];

    $simpan         = $_POST['simpan'];

  if ($simpan) {
    
    $sql = $connect->query("UPDATE tbuser SET id_user='$id_user', username='$username', nama='$nama', status='$status' WHERE id_user='$id_user'");

    if ($sql) {
      ?>
        <script type="text/javascript">
          alert ("Data Berhasil di Ubah");
          window.location.href="?page=user";
        </script>
      <?php   
    } 
  } 

 ?>