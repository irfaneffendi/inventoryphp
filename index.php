<?php 
include 'koneksi.php';
include 'fungsiTanggal.php';
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

  if ($_SESSION) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Warung Mie Aceh Bang Udin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="lte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="lte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="lte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="lte/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="lte/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan" class="nav-link">Pesan</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="logout.php" class="nav-link">Logout</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php if($_SESSION['status'] == 'pemilik'): ?>
            <img src="lte/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
          <?php endif ?>
          <?php if($_SESSION['status'] == 'admin'): ?>
            <img src="lte/dist/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
          <?php endif ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nama'] ?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php"" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <?php if($_SESSION['status'] == 'pemilik'): ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=kategori" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=barang" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=penerimaan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penerimaan Barang</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=pengeluaran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengeluaran Barang</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="?page=laporan" class="nav-link">
              <i class="nav-icon far fa-file"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=ubahpassword" class="nav-link">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>
                Ubah Password
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
                        <?php
                          $page = @$_GET['page'];
                          $aksi = @$_GET['aksi'];

                          if ($page == "kategori") {
                            if ($aksi == "" ) {
                              include "page/kategori/kategori.php";               
                            }elseif ($aksi == "tambah"){
                              include "page/kategori/tambah.php";
                            }elseif ($aksi == "ubah"){
                              include "page/kategori/ubah.php";
                            }elseif ($aksi == "hapus"){
                              include "page/kategori/hapus.php";
                            }

                          }elseif ($page == "barang") {
                            if ($aksi == "" ) {
                              include "page/barang/barang.php";               
                            }elseif ($aksi == "tambah"){
                              include "page/barang/tambah.php";
                            }elseif ($aksi == "ubah"){
                              include "page/barang/ubah.php";
                            }elseif ($aksi == "hapus"){
                              include "page/barang/hapus.php";
                            }

                          }elseif ($page == "user") {
                            if ($aksi == "" ) {
                              include "page/user/user.php";               
                            }elseif ($aksi == "tambah"){
                              include "page/user/tambah.php";
                            }elseif ($aksi == "ubah"){
                              include "page/user/ubah.php";
                            }elseif ($aksi == "hapus"){
                              include "page/user/hapus.php";
                            }

                          }elseif ($page == "penerimaan") {
                            if ($aksi == "" ) {
                              include "page/penerimaan/penerimaan.php";               
                            }elseif ($aksi == "tambah"){
                              include "page/penerimaan/tambah.php";
                            }elseif ($aksi == "ubah"){
                              include "page/penerimaan/ubah.php";
                            }elseif ($aksi == "hapus"){
                              include "page/penerimaan/hapus.php";
                            }elseif ($aksi == "hapussementara"){
                              include "page/penerimaan/hapussementara.php";
                            }elseif ($aksi == "detail"){
                              include "page/penerimaan/detail.php";
                            } 

                          }elseif ($page == "pengeluaran") {
                            if ($aksi == "" ) {
                              include "page/pengeluaran/pengeluaran.php";               
                            }elseif ($aksi == "tambah"){
                              include "page/pengeluaran/tambah.php";
                            }elseif ($aksi == "ubah"){
                              include "page/pengeluaran/ubah.php";
                            }elseif ($aksi == "hapus"){
                              include "page/pengeluaran/hapus.php";
                            }elseif ($aksi == "hapussementara"){
                              include "page/pengeluaran/hapussementara.php";
                            }elseif ($aksi == "detail"){
                              include "page/pengeluaran/detail.php";
                            } 

                          }elseif ($page == "laporan") {
                            if ($aksi == "" ) {
                              include "page/laporan/laporan.php";               
                            }

                          }elseif ($page == "ubahpassword") {
                            if ($aksi == "" ) {
                              include "page/ubahpassword/ubahpassword.php";               
                            }elseif ($aksi == "prosesubahpassword"){
                              include "page/ubahpassword/prosesubahpassword.php";
                            }

                              
                          }elseif ($page=="") {
                                include "home.php";
                          }


                        ?>     
            <!-- modal input -->
  <div id="modalpesan" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pesan Notification</h4>
        </div>
        <div class="modal-body">
          <?php 
          $periksa=mysqli_query($connect, "SELECT * from tbbarang LEFT JOIN tbkategori ON tbkategori.kode_kategori=tbbarang.kode_kategori");
          while($data=mysqli_fetch_array($periksa)){ 
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
            if($total<=10){
            ?>
            <script>
              $(document).ready(function(){
                $('#pesan_sedia').css("color","red");
                $('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
              });
            </script>
          <?php      
              echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $data['nama_barang']."</a> yang tersisa sudah kurang dari 10 . silahkan tambah barang lagi !!</div>"; 
            }
          }
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>           
        </div>
        
      </div>
    </div>
  </div>                       

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="lte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="lte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="lte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="lte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="lte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="lte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="lte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="lte/plugins/moment/moment.min.js"></script>
<script src="lte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="lte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="lte/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="lte/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="lte/dist/js/pages/dashboard.js"></script> -->
<!-- DataTables  & Plugins -->
<script src="lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="lte/plugins/jszip/jszip.min.js"></script>
<script src="lte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="lte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript">
  function hanyaAngka(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
  </script>
</body>
</html>

<?php 
    }else{
        header("location:login.php");
    }
 ?>
