<?php
require_once "koneksi.php";
session_start();

if (isset($_SESSION['user_id'])) {
  # mengambil data dari tabel user  
  $users = mysqli_fetch_array((mysqli_query($mysqli, "SELECT * FROM user WHERE id='$_SESSION[user_id]'")));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
    initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Bootstrap offline -->
    <link rel="stylesheet" href="assets/css/bootstrap.css"> 
    <!-- Bootstrap Online -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">   
    <title>Poliklinik</title>   <!--Judul Halaman-->
</head>

<body>
  <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        Sistem Informasi Poliklinik
      </a>
      <button class="navbar-toggler"
        type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false"
        aria-label="Toggle navigation">
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">
              Home
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
              Data Master
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="index.php?page=dokter">
                  Dokter
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="index.php?page=pasien">
                  Pasien
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="index.php?page=obat">
                  Obat
                </a>
              </li>
            </ul>
          </li>
          <li>
              <a class="nav-link" href="index.php?page=periksa">
                Periksa
              </a>
          </li>
        </ul>
      </div>
      <?php
        if (isset($_SESSION['login'])) {
        ?>
        <form action="">
            <div class="collapse navbar-collapse" id="navbarNavRegis">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </form>
        <?php
        } else {
          ?>
          <form action="">
          <div class="collapse navbar-collapse" id="navbarNavRegis">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=register">
                  Registrasi
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=login">
                  Login
                </a>
              </li>
            </ul>
          </form>
          <?php
        }
        ?>
    </div>
  </nav>
</body>
</html>
<main role="main" class="container">
    <?php
    if (isset($_GET['page'])) {
    ?>
        <h2><?php echo ucwords($_GET['page']) ?></h2>
    <?php
        include($_GET['page'] . ".php");
    } else {
        echo "Selamat Datang di Sistem Informasi Poliklinik";
    }
    ?>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>