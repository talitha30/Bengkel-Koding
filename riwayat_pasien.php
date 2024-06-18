<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Riwayat Pasien
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">
            <div class="box-body table-responsive">
              <table id="obat" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama Pasien</th>
                  <th>Alamat</th>
                  <th>No. KTP</th>
                  <th>No. Telepon</th>
                  <th>No. RM</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conn/koneksi.php";
                $id_dokter = $_SESSION['id'];
                $no=0;
                $query=mysqli_query($koneksi,"SELECT *,pasien.nama as nama_pasien FROM pasien 
                JOIN daftar_poli ON daftar_poli.id_pasien = pasien.id
                JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id
                JOIN dokter ON jadwal_periksa.id_dokter = dokter.id
                WHERE dokter.id = $id
                ORDER BY pasien.id DESC");
                while ($row=mysqli_fetch_array($query))
                {
                ?>
                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['nama_pasien'];?></td>
                  <td><?php echo $row['alamat'];?></td>
                  <td><?php echo $row['no_ktp'];?></td>
                  <td><?php echo $row['no_hp'];?></td>
                  <td><?php echo $row['no_rm'];?></td>
                  <td>
                    <a href="index_dokter.php?page=detail_riwayat_pasien&id=<?=$row['id'];?>" class="btn btn-success" role="button" title="Detail">Detail Riwayat Periksa<i class="glyphicon glyphicon-edit"></i></a>
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
    $('#obat').DataTable();
  });
</script>