<?php 
    // Include database connection
    include 'conn/koneksi.php';

    // Memeriksa apakah request yang diterima adalah POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Mengambil data dari formulir POST
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_ktp = $_POST['no_ktp'];
        $no_hp = $_POST['no_hp'];

        // Membuat no_rm
        // ambil jumlah total pasien dari database
        $result = mysqli_query($mysqli, "SELECT COUNT(*) as total FROM pasien");
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $totalPasien = $row['total'];

            // Generate no_rm berdasarkan tanggal saat ini dan total pasien
            $no_rm = date('Y') . date('m') . '-' . ($totalPasien + 1);

            // Menyimpan data pasien ke dalam database
            $sql = "INSERT INTO pasien (nama, alamat, no_ktp, no_hp, no_rm) VALUES ('$nama', '$alamat', '$no_ktp', '$no_hp', '$no_rm')";
            $tambah = mysqli_query($mysqli, $sql);
            if ($tambah) {
                $success = "No RM anda adalah $no_rm";
                header("Location: index.php?page=daftar_pasien&no_rm=$no_rm");
            } else {
                $error = "Gagal menambahkan data pasien.";
            }
        } else {
            $error = "Gagal mendapatkan jumlah total pasien.";
        }
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
            <p class="login-box-msg">Daftar sebagai pasien</p>
            <form action="" method="post">
            <div class="form-group">
                <label>Nama</label>
                <input name="nama" class="form-control" placeholder="Nama" required>
                <div class="input-group-append">
                </div>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" class="form-control" placeholder="Alamat" required>
                <div class="input-group-append">
                </div>
            </div>
            <div class="form-group">
                <label>No KTP</label>
                <input name="no_ktp" class="form-control" placeholder="No KTP" required>
                <div class="input-group-append">
                </div>
            </div>
            <div class="form-group">
                <label>No HP</label>
                <input name="no_hp" class="form-control" placeholder="No HP" required>
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
            <a href='login_pasien.php'> Login</a>          
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
