<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table id="example1" class="table table-bordered table-hover">
                <h4><i class="fa fa-angle-right"></i> Data Kategori</h4>
                <hr>
                <div class="text-center">
                  <a href="?page=kategori&aksi=tambah" class="btn btn-primary">Tambah Kategori</a>
                </div>
                <br>
                <thead>
                  <tr>
                    <th> Kode Kategori</th>
                    <th> Nama Kategori</th>
                    <th> Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no     = 1;
                    $sql    = $connect->query("SELECT * FROM tbkategori");
                    while   ($data = mysqli_fetch_array($sql)){ 
                  ?>
                  <tr>
                    <td><?php echo $data['kode_kategori']; ?></td>
                    <td><?php echo $data['nama_kategori']; ?></td>
                    <td>
                      <a href="?page=kategori&aksi=ubah&kode_kategori=<?php echo $data['kode_kategori']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pen"></i></a>
                      <a href="?page=kategori&aksi=hapus&kode_kategori=<?php echo $data['kode_kategori']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus')"><i class="fa fa-trash "></i></a>
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