<?php
include "conn/koneksi.php"; // Make sure this path is correct and the file exists
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>DATA DOKTER</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">

      <form role="form" method="post" action="../auth_tambah_dokter.php">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" placeholder="Nama Dokter" required>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" placeholder="Alamat Dokter" required>
                </div>
                <div class="form-group">
                  <label>No Hp</label>
                  <input type="text" name="no_hp" class="form-control" placeholder="No Hp" required>
                </div>
                
                <?php
                  include  "conn/koneksi.php";
                  $sql="SELECT id, nama_poli FROM poli";
                  //echo $sql;
                  $query = "SELECT id, nama_poli FROM poli";
                  $result = $koneksi->query($query);

                  $poli_options = [];
                  while ($row = $result->fetch_assoc()) {
                  $poli_options[$row['id']] = $row['nama_poli'];
                  }
                  $koneksi->close(); ?>
                  <div class="form-group">
                  <label>Poli</label>
                  <select name="poli" class="form-control" placeholder="Poli" required>
                    <?php foreach ($poli_options as $id => $nama_poli) {
                        echo '<option value="' . $id . '">' . $nama_poli . '</option>';} ?>
                  </select>
                  </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
              </div>
              <br>
              <div class="box-header">
                <button type="reset" class="btn btn-secondary" role="button" title="Reset Data" value="Reset"><i class="glyphicon glyphicon-plus"></i>Reset</a>
              </div>
            </form>
            <br>

            <div class="box-body table-responsive">
              <table id="dokter" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>NAMA</th>
                  <th>ALAMAT</th>
                  <th>NO HP</th>
                  <th>POLI</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conn/koneksi.php";
                $no=0;
                $query=mysqli_query($koneksi,"SELECT dokter.*, poli.nama_poli FROM dokter JOIN poli ON dokter.id_poli = poli.id ORDER BY id DESC");
                //echo $query;
                while ($row=mysqli_fetch_array($query))
                {
                ?>
                <tr>
                  <td><?php echo $row['nama'];?></td>
                  <td><?php echo $row['alamat'];?></td>
                  <td><?php echo $row['no_hp'];?></td>
                  <td><?php echo $row['nama_poli'];?></td>
                  <td>
                    <a href="index_admin.php?page=ubah_dokter&id=<?=$row['id'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i>Ubah</a>
                    <a href="hapus_dokter.php?id=<?=$row['id'];?>" class="btn btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i>Hapus</a>
                  </td>
                </tr>

                <?php } ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->

<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#dokter').DataTable();
  });
</script>