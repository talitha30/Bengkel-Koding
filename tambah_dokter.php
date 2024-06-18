<?php
if (!isset($_SESSION)) {
    session_start();
}

?>
<head>
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
            <a><b>Poli</b>klinik</a>
            <hr>
        </div>
        <div class="card-body login-card-body">
            <p class="login-box-msg">Daftar sebagai dokter</p>
            <form action="auth_tambah_dokter.php" method="post">
            <div class="form-group">
                <label>Nama</label>
                <input name="nama" class="form-control" placeholder="Nama">
                <div class="input-group-append">
                </div>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" class="form-control" placeholder="Alamat" >
                <div class="input-group-append">
                </div>
            </div>
            <div class="form-group">
                <label>No HP</label>
                <input name="no_hp" class="form-control" placeholder="No HP" >
                <div class="input-group-append">
                </div>
            </div>

            <?php
            include "conn/koneksi.php";
            $query = "SELECT id, nama_poli FROM poli";
            $result = $koneksi->query($query);

            $poli_options = [];
            while ($row = $result->fetch_assoc()) {
            $poli_options[$row['id']] = $row['nama_poli'];
            }
            $koneksi->close(); ?>
            <div class="form-group">
            <label>Poli</label>
            <select name="id_poli" class="form-control" placeholder="Poli" required>
                <?php foreach ($poli_options as $id => $nama_poli) {
                    echo '<option value="' . $id . '">' . $nama_poli . '</option>';} ?>
            </select>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password" >
                <div class="input-group-append">
                </div>
            </div>
            <div class="row">
                
                <!-- /.col -->
                <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                </div>
                <!-- /.col -->
            </div>
            <a>Sudah punya akun?</a> 
            <a href='../../login_dokter.php'> Login</a>          
            </form>
            <!-- /.social-auth-links -->
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