<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table id="example1" class="table table-bordered table-hover">
                <h4><i class="fa fa-backward"></i> Data Penerimaan Barang</h4>
                <hr>
                <div class="text-center">
                  <a href="?page=penerimaan&aksi=tambah" class="btn btn-primary">Tambah Penerimaan</a>
                </div>
                <br>
                <thead>
                  <tr>
                    <th> Kode Penerimaan</th>
                    <th> Tanggal Terima</th>
                    <th> Jumlah Item</th>
                    <th> Nama</th>
                    <th> Keterangan</th>
                    <th> Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no     = 1;
                    $sql    = $connect->query("SELECT * FROM tbpenerimaan LEFT JOIN tbuser on tbuser.id_user=tbpenerimaan.id_user");
                    while   ($data = mysqli_fetch_array($sql)){ 
                  ?>
                  <tr>
                    <td><?php echo $data['kode_terima'] ?></td>
                    <td><?php echo tgl_indo( $data['tanggal_terima']) ?></td>
                    <td><?php echo $data['jumlah_item'] ?></td>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['keterangan'] ?></td>
                    <td>
                      <a href="?page=penerimaan&aksi=detail&kode_terima=<?php echo $data['kode_terima']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-info" data-toogle="tooltip" title="detail"></i></a>
                      <a href="?page=penerimaan&aksi=hapus&kode_terima=<?php echo $data['kode_terima']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus')"><i class="fa fa-trash"></i></a>
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