<?php
include "conn/koneksi.php"; // Include your database connection file

if ($_POST) {
    $no_rm = $_POST['no_rm'];
    $poli = $_POST['poli'];
    $id = $_POST['id'];
    $keluhan = $_POST['keluhan'];
    
    $query = "INSERT INTO daftar_poli (no_rm, poli, id_jadwal, keluhan) 
              VALUES ('$no_rm', '$poli', '$id', '$keluhan')";
    
    if (!$koneksi->query($query)) { // Use $koneksi here, not $mysqli
        die("Query error: " . $koneksi->error); // Use $koneksi->error for error handling
    } else {
        echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="login_pasien.php"</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Poli</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <style>
    .card-header {
      background-color: #3081D0;
      color: white;
      width: 100%;
      height: 10%;
      margin: 0 auto;
      border-radius: 10px;
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 0;
    }
    .card-header, .login-box-msg {
      text-align: left;
    }
    .register-logo {
      text-align: left;
    }
  </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>Daftar Poli</b></a>
  </div>

  <div class="card-header">
      <h3><p class="login-box-msg">Daftar Poli</p></h3>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <form action="data_pasien.php" method="post">
      <b>Nomor Rekam Medis</b>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nomor Rekam Medis" name="no_rm" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-card"></span>
            </div>
          </div>
        </div>
        <b>Poli</b>
        <div class="input-group mb-3">

        <?php
          $query = "SELECT id, nama_poli FROM poli";
          $result = $mysqli->query($query);

          $poli_options = [];
          while ($row = $result->fetch_assoc()) {
              $poli_options[$row['id']] = $row['nama_poli'];
          }
        ?>
          <select name="poli" class="form-control" placeholder="Poli" required>
            <?php foreach ($poli_options as $id => $nama_poli) {
                echo '<option value="' . $id . '">' . $nama_poli . '</option>';} ?>
          </select>
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-hospital"></span>
            </div>
          </div>
        </div>
        <b>Jadwal</b>
        <div class="input-group mb-3">

        <?php
          $query = "SELECT id, hari, jam_mulai, jam_selesai FROM jadwal_periksa";
          $result = $mysqli->query($query);

          $jadwal_options = [];
          while ($row = $result->fetch_assoc()) {
              $jadwal_options[$row['id']] = $row['hari'] . ' ' . $row['jam_mulai'] . ' - ' . $row['jam_selesai'];
          }
        ?>
          <select name="id" class="form-control" placeholder="Daftar Poli" required>
            <?php 
            foreach ($jadwal_options as $id => $jadwal) {
                echo '<option value="' . $id . '">' . $jadwal . '</option>';} ?>
          </select>

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
        </div>
        <b>Keluhan</b>
        <div class="input-group mb-3">
          <textarea class="form-control" placeholder="Tulis Keluhanmu" name="keluhan"></textarea>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-comment-medical"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
