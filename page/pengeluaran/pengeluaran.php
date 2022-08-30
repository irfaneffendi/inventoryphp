<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table id="example1" class="table table-bordered table-hover">
                <h4><i class="fa fa-forward"></i> Data Pengeluaran Barang</h4>
                <hr>
                <div class="text-center">
                  <a href="?page=pengeluaran&aksi=tambah" class="btn btn-primary">Tambah Pengeluaran</a>
                </div>
                <br>
                <thead>
                  <tr>
                    <th> Kode Pengeluaran</th>
                    <th> Tanggal Keluar</th>
                    <th> Jumlah Item</th>
                    <th> Nama Admin</th>
                    <th> Keterangan</th>
                    <th> Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no     = 1;
                    $sql    = $connect->query("SELECT * FROM tbpengeluaran LEFT JOIN tbuser on tbuser.id_user=tbpengeluaran.id_user");
                    while   ($data = mysqli_fetch_array($sql)){ 
                  ?>
                  <tr>
                    <td><?php echo $data['kode_keluar'] ?></td>
                    <td><?php echo tgl_indo( $data['tanggal_keluar']) ?></td>
                    <td><?php echo $data['jumlah_item'] ?></td>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['keterangan'] ?></td>
                    <td>
                      <a href="?page=pengeluaran&aksi=detail&kode_keluar=<?php echo $data['kode_keluar']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-info" data-toogle="tooltip" title="detail"></i></a>
                      <a href="?page=pengeluaran&aksi=hapus&kode_keluar=<?php echo $data['kode_keluar']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus')"><i class="fa fa-trash"></i></a>
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