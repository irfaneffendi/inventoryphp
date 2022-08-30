<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">

            	<div class="row">
        <?php if($_SESSION['status'] == 'pemilik'): ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php 
                      $sql  = "SELECT * FROM tbuser";
                      $query = mysqli_query($connect, $sql);
                      $count = mysqli_num_rows($query);
                      echo "$count";
                     ?>
              </h3>

              <p>Pengguna</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?page=barang" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php 
                      $sql  = "SELECT * FROM tbbarang";
                      $query = mysqli_query($connect, $sql);
                      $count = mysqli_num_rows($query);
                      echo "$count";
                     ?>
              </h3>

              <p>Jumlah Barang</p>
            </div>
            <div class="icon">
              <i class="fa fa-bars"></i>
            </div>
            <a href="?page=barang" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <?php endif; ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php 
                      $sql  = "SELECT * FROM tbpenerimaan";
                      $query = mysqli_query($connect, $sql);
                      $count = mysqli_num_rows($query);
                      echo "$count";
                     ?>
                     
              </h3>

              <p>Transaksi Penerimaan</p>
            </div>
            <div class="icon">
              <i class="fa fa-backward"></i>
            </div>
            <a href="?page=penerimaan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
              	<?php 
                      $sql  = "SELECT * FROM tbpengeluaran";
                      $query = mysqli_query($connect, $sql);
                      $count = mysqli_num_rows($query);
                      echo "$count";
                     ?>
              </h3>

              <p>Transaksi Pengeluaran</p>
            </div>
            <div class="icon">
              <i class="fa fa-forward"></i>
            </div>
            <a href="?page=pengeluaran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->


            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->


<?php 
  
  $departement = mysqli_query($connect, "SELECT nama_departement , SUM(jumlah_barang) As total FROM tbpenerimaan LEFT JOIN tbdetail_penerimaan on tbpenerimaan.kode_terima = tbdetail_penerimaan.kode_terima LEFT join tbdepartement on tbpenerimaan.kode_departement = tbdepartement.kode_departement GROUP BY nama_departement")

?>

<!--           <div>
            <div class="col-lg-9 main-chart">
              <div class="border-head">
                <h3>Grafik Penerimaan Barang</h3>
              </div>
              <div class="custom-bar-chart">
                <ul class="y-axis">
                  
                </ul>

                <?php 
                  while($data = mysqli_fetch_array($departement)){
                 ?>
                <div class="bar">
                  <div class="tittle"><?php echo $data['nama_departement'] ?></div>
                  <div class="value tooltips" data-original-tittle="<?php echo $data['total'] ?>" data-toogle="tooltip" data-placement="top"><?php echo $data['total'] ?></div>
                </div>
              <?php 
              }
              ?>
              </div>
            </div>
          </div> -->
        </div>
        <!-- /row -->