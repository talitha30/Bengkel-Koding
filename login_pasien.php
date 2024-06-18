<?php
session_start();
// Include database connection
include 'conn/koneksi.php';

// Memeriksa apakah request yang diterima adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no_rm = $_POST['no_rm'];

    // query mencari pasien berdasarkan nomor rekam medis
    $query = "SELECT * FROM pasien WHERE no_rm = '$no_rm'";
    $result = $koneksi->query($query);  // Change $mysqli to $koneksi

    // Memeriksa apakah query berhasil dieksekusi
    if (!$result) {
        die("Query error: " . $koneksi->error);  // Change $mysqli to $koneksi
    }

    // Memeriksa apakah ada satu baris data pasien yang sesuai dengan nomor rekam medis
    if ($result->num_rows == 1) {
        // Mengambil data pasien dari hasil query
        $row = $result->fetch_assoc();

        // Menyimpan informasi nama dan id_pasien ke dalam sesi
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['id_pasien'] = $row['id'];
        header("Location: data_pasien.php?no_rm=$no_rm");
        exit();
    } else {
        $error = "No. Rekam Medis tidak ditemukan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="login-logo">
      <a href=""><b>Poli</b>klinik</a>
      <hr>
    </div>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input id="norm" type="text" name="no_rm" class="form-control" placeholder="No-RM" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="rememberme">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button name="log" type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
          <a>Belum punya akun?</a> 
          <a href='daftar_pasien.php'> Register</a> 
        </div>
      </form>

      <?php
      if (isset($error)) {
          echo "<p style='color:red;'>$error</p>";
      }
      ?>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>