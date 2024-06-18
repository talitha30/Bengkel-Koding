<?php
include "conf/conn.php";
$sql = "SELECT * FROM dokter WHERE id_dokter='" . $_GET['id_dokter'] . "'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

if ($_POST) {
    $id_dokter = $_POST['id_dokter'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $poli = $_POST['poli'];

    // Update query
    $update_query = "UPDATE dokter SET nama = '$nama', alamat = '$alamat', no_hp = '$no_hp', id_poli = '$poli' WHERE id_dokter='$id_dokter'";

    if (!mysqli_query($conn, $update_query)) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo '<script>alert("Data Berhasil Diubah !!!"); window.location.href="admin/index_admin.php?page=data_dokter"</script>';
    }
}

// Query to retrieve list of poli
$poli_query = "SELECT id, nama_poli FROM poli";
$poli_result = mysqli_query($conn, $poli_query);

$poli_options = [];
while ($poli_row = mysqli_fetch_assoc($poli_result)) {
    $poli_options[$poli_row['id']] = $poli_row['nama_poli'];
}

mysqli_close($conn); // Close the database connection
?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      UBAH DATA OBAT
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">UBAH OBAT</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="">
              <div class="box-body">
                <input type="hidden" name="id_dokter" value="<?php echo $row['id_dokter']; ?>">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control"  value="<?php echo $row['nama']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" required>
                </div>
                <div class="form-group">
                  <label>No. HP</label>
                  <input type="text" name="no_hp" class="form-control" value="<?php echo $row['no_hp']; ?>" required>
                </div>
                  <?php
                  include  "conf/conn.php";
                  $sql="SELECT id, nama_poli FROM poli";
                  //echo $sql;
                  $query = "SELECT id, nama_poli FROM poli";
                  $result = $conn->query($query);

                  $poli_options = [];
                  while ($row = $result->fetch_assoc()) {
                  $poli_options[$row['id']] = $row['nama_poli'];
                  }
                  $conn->close(); ?>
                  <div class="form-group">
                  <label>POLI</label>
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
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->