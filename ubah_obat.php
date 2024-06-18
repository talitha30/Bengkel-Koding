<?php
include "conn/koneksi.php";

// Proses update data jika form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_obat = $_POST['nama_obat'];
    $kemasan = $_POST['kemasan'];
    $harga = $_POST['harga'];

    // Query untuk melakukan update data obat
    $query = "UPDATE obat SET nama_obat='$nama_obat', kemasan='$kemasan', harga='$harga' WHERE id ='$id'";

    // Eksekusi query
    if (!mysqli_query($koneksi, $query)) {
        die('Error: ' . mysqli_error($koneksi));
    } else {
        // Redirect setelah berhasil diubah
        echo '<script>alert("Data Berhasil Diubah !!!"); window.location.href="admin/index.php?page=data_obat"</script>';
    }
}

// Query untuk mengambil data obat berdasarkan id
$id_obat = $_GET['id'];  // Dapatkan ID obat dari parameter GET
$sql = "SELECT * FROM obat WHERE id='$id_obat'";
$query = mysqli_query($koneksi, $sql);

// Memeriksa apakah query berhasil dieksekusi
if (!$query) {
    die('Error: ' . mysqli_error($koneksi));
}

// Memeriksa apakah data obat dengan ID tersebut ditemukan
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
} else {
    die('Data obat tidak ditemukan.');
}
?>

<!-- HTML start here -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ubah Data Obat</title>

  <!-- Include your CSS links here -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Ubah Data Obat</h2>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <div class="form-group">
          <label>Nama Obat</label>
          <input type="text" name="nama_obat" class="form-control" value="<?php echo $row['nama_obat']; ?>" required>
        </div>
        
        <div class="form-group">
          <label>Kemasan</label>
          <input type="text" name="kemasan" class="form-control" value="<?php echo $row['kemasan']; ?>" required>
        </div>
        
        <div class="form-group">
          <label>Harga</label>
          <input type="text" name="harga" class="form-control" value="<?php echo $row['harga']; ?>" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="admin/index.php?page=data_obat" class="btn btn-default">Kembali</a>
      </form>
    </div>
  </div>
</div>

<!-- Include your JS scripts here -->
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
