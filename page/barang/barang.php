<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table id="example1" class="table table-bordered table-hover">
                <h4><i class="fa fa-angle-right"></i> Data barang</h4>
                <hr>
                <div class="text-center">
                  <a href="?page=barang&aksi=tambah" class="btn btn-primary">Tambah barang</a>
                </div>
                <br>
                <thead>
                  <tr>
                    <th> Kode Barang</th>
                    <th> Nama Barang</th>
                    <th> Kategori</th>
                    <th> Spesifikasi/Satuan</th>
                    <th> Stok Awal</th>
                    <th> Stok Sekarang</th>
                    <th> Lokasi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no     = 1;
                    $sql    = $connect->query("SELECT * FROM tbbarang LEFT JOIN tbkategori ON tbkategori.kode_kategori=tbbarang.kode_kategori");
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

                  ?>
                  <tr>
                    <td><?php echo $data['kode_barang'] ?></td>
                    <td><?php echo $data['nama_barang'] ?></td>
                    <td><?php echo $data['nama_kategori'] ?></td>
                    <td><?php echo $data['spesifikasi']; ?></td>
                    <td><?php echo $data['stok'] ?></td>
                    <td><?php echo $data['stok'] + $barangTerima['jumlah_barang'] - $barangKeluar['jumlah_barang'] ?></td>
                    <td>
                      <a href="?page=barang&aksi=ubah&kode_barang=<?php echo $data['kode_barang']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pen"></i></a>
                      <a href="?page=barang&aksi=hapus&kode_barang=<?php echo $data['kode_barang']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus')"><i class="fa fa-trash "></i></a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->