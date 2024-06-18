<?php
include "conn/koneksi.php"; // Make sure this path is correct and the file exists
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Jadwal Periksa
      </h1>
      <ol class="breadcrumb">
        <li><a href="index_dokter.php"><i class="fa fa-dashboard"></i> HOME </a></li>
      </ol>
      <a class="btn btn-primary" href="index_dokter.php?page=tambah_jadwal_periksa">+   Tambah jadwal baru</a>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          </div>
            <br>
            <div class="box-body table-responsive">
              <table id="jadwal_periksa" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama Dokter</th>
                  <th>Hari</th>
                  <th>Jam Mulai</th>
                  <th>Jam Selesai</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conn/koneksi.php";
                $no=0;
                $query=mysqli_query($koneksi,"SELECT jadwal_periksa.*,dokter.id as id_dok,dokter.nama FROM jadwal_periksa JOIN dokter ON jadwal_periksa.id_dokter = dokter.id WHERE dokter.id = $id ORDER BY jadwal_periksa.id DESC");
                //echo $query;
                while ($row=mysqli_fetch_array($query))
                {
                ?>
                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['nama'];?></td>
                  <td><?php echo $row['hari'];?></td>
                  <td><?php echo $row['jam_mulai'];?></td>
                  <td><?php echo $row['jam_selesai'];?></td>
                  <td><?php echo $row['aktif'];?></td>
                  <td>
                    <a href="index_dokter.php?page=ubah_jadwal_periksa&id=<?=$row['id'];?>" class="btn btn-success" role="button" title="Ubah Data">Edit<i class="glyphicon glyphicon-edit"></i></a>
                    <a href="hapus_jadwal_dokter.php?id_dokter=<?=$row['id_dokter'];?>" class="btn btn-danger" role="button" title="Hapus Data">Hapus<i class="glyphicon glyphicon-trash"></i></a>
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
    $('#jadwal_periksa').DataTable();
  });
</script>