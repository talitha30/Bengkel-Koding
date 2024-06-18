<?php
// session_start(); // Ensure session is started if you intend to use $_SESSION

include "conn/koneksi.php";

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $aktif = $_POST['aktif'];
    $id = $_POST['id_dokter'];

    $query = "INSERT INTO jadwal_periksa(hari, jam_mulai, jam_selesai, id_dokter, aktif) 
              VALUES ('$hari', '$jam_mulai', '$jam_selesai', '$id', '$aktif')";
    
    if (!mysqli_query($koneksi, $query)) {
        die(mysqli_error($koneksi));
    } else {
        echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="index_dokter.php?page=jadwal_periksa"</script>';
    }
}

// Fetch current data
$sql = "SELECT * FROM jadwal_periksa WHERE id_dokter = '{$_SESSION['id']}'"; // Adjust query to fetch data for current session id
$query = mysqli_query($koneksi, $sql);

// Initialize $row with default values to avoid null warnings
$row = [
    'jam_mulai' => '',
    'jam_selesai' => '',
    'aktif' => ''
];
if ($query && mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Dokter</title>

  <!-- Include your CSS and JS links here -->

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar and Sidebar code goes here -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Tambah Jadwal Periksa</h1>
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
                <div class="form-group">
                  <label>ID Dokter</label>
                  <input readonly name="id_dokter" class="form-control" value="<?php echo $_SESSION['id']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Jam Mulai</label>
                  <input type="time" name="jam_mulai" class="form-control" value="<?php echo $row['jam_mulai']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Jam Selesai</label>
                  <input type="time" name="jam_selesai" class="form-control" value="<?php echo $row['jam_selesai']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Aktif</label>
                  <input name="aktif" class="form-control" value="<?php echo $row['aktif']; ?>" required>
                </div>		
                <div class="form-group">
                  <label>Hari</label>
                  <select name="hari" class="form-control" placeholder="Hari" required>
                    <?php 
                      $query1 = "SHOW COLUMNS FROM jadwal_periksa WHERE Field = 'hari'";
                      $result1 = $koneksi->query($query1);
                      
                      if ($result1->num_rows > 0) {
                          $row = $result1->fetch_assoc();
                          // Parse nilai-nilai dari kolom enum
                          $enum_values = explode(",", str_replace("'", "", substr($row['Type'], 5, -1)));
                      }
                      foreach ($enum_values as $value) {
                          echo '<option value="' . $value . '">' . $value . '</option>';
                      }
                    ?>
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

  <!-- Include your Footer and Control Sidebar here -->

</div>
<!-- ./wrapper -->

<!-- Include your JS scripts here -->

</body>
</html>
