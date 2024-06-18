<?php
include "conn/koneksi.php"; // Make sure this path is correct and the file exists
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>DATA POLI</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">

      <form role="form" method="post" action="../auth_tambah_poli.php">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Poli</label>
                  <input type="text" name="nama_poli" class="form-control" placeholder="Nama Poli" required>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" name="keterangan" class="form-control" placeholder="keterangan" required>
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
              <table id="poli" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>NAMA POLI</th>
                  <th>KETERANGAN</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conn/koneksi.php";
                $no=0;
                $query=mysqli_query($koneksi,"SELECT * FROM poli ORDER BY id DESC");
                //echo $query;
                while ($row=mysqli_fetch_array($query))
                {
                ?>
                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['nama_poli'];?></td>
                  <td><?php echo $row['keterangan'];?></td>
                  <td>
                    <a href="index_admin.php?page=ubah_poli&id=<?=$row['id'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i>Ubah</a>
                    <a href="hapus_poli.php?id=<?=$row['id'];?>" class="btn btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i>Hapus</a>
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
    $('#poli').DataTable();
  });
</script>