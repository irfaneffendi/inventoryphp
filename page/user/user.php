<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Data User</h4>
                <hr>
                <div class="text-center">
                  <a href="?page=user&aksi=tambah" class="btn btn-primary">Tambah User</a>
                </div>
                <br>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Kode user</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Nama user</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Status user</th>
                    <th><i class=" fa fa-edit"></i> Aksi</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no     = 1;
                    $sql    = $connect->query("SELECT * FROM tbuser");
                    while   ($data = mysqli_fetch_array($sql)){ 
                  ?>
                  <tr>
                    <td><?php echo $data['id_user']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                    <td>
                      <a href="?page=user&aksi=ubah&id_user=<?php echo $data['id_user']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pen"></i></a>
                      <a href="?page=user&aksi=hapus&id_user=<?php echo $data['id_user']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus')"><i class="fa fa-trash "></i></a>
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