<?php
// Periksa apakah pengguna sudah login
if (!isset($_SESSION['login'])) {
    // Jika belum login, arahkan kembali ke halaman login
    header('Location: index.php?page=loginUser');
    exit;
}

include_once("koneksi.php");

?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Nota Pembayaran</title>
  <style>
    body {
  font-family: sans-serif;
}

.container {
  width: 800px;
  margin: 0 auto;
}

.header {
  background-color: #000;
  color: #fff;
  padding: 10px;
}

.body {
  padding: 20px;
}

.table {
  border-collapse: collapse;
  width: 100%;
}

.table th, .table td {
  border: 1px solid #000;
  padding: 10px;
  /* margin-right: 50px; */
}

.table th {
  background-color: #ccc;
  /* margin-right: 10px; */
}

.total th, .total td {
  text-align: left;
  width: 83%;
}

.footer {
  text-align: center;
}

  </style>
</head>
<body>

  <div class="container">
    <!-- <div class="header">
      <h1>Nota Pembayaran</h1>
    </div> -->
    <?php
                include('koneksi.php');
                date_default_timezone_set("Asia/Jakarta");
                $result = mysqli_query($mysqli, "SELECT pr.*, d.nama as 'nama_dokter', d.alamat as 'alamat_dokter', d.no_hp as 'no_hp_dokter', p.nama as 'nama_pasien', p.alamat as 'alamat_pasien', p.no_hp as 'no_hp_pasien'
                        FROM periksa pr 
                        LEFT JOIN dokter d ON (pr.id_dokter = d.id) 
                        LEFT JOIN pasien p ON (pr.id_pasien = p.id) 
                        WHERE pr.id='" . $_GET['id'] . "'");
                $no = 1;
                $total_invoice = 0;
                $total_obat = 0;
                while ($data = mysqli_fetch_array($result)) {
                    ?>
    <div class="body">
        <div class="row">
          <div class="col-6">
            <p class="d-block">No. Periksa</p>
            <p><b>#<?php echo $data['id'] ?></b></p>
          </div>
          <div class="col-6">
            <p class="d-block">Tanggal Periksa</p>
            <p><b><?php echo date('d-M-Y H:i:s', strtotime($data['tgl_periksa'])) ?></b></p>
          </div>
        </div>
        <div class="row">
          <table>
          <div class="col-6">
            <p class="d-block">Pasien:</p>
            <p><b><?php echo $data['nama_pasien'] ?></b></p>
            <p><?php echo $data['alamat_pasien'] ?></p>
            <p><?php echo $data['no_hp_pasien'] ?></p>
          </div>
          <div class="col-6">
            <p class="d-block">Dokter:</p>
            <p><b><?php echo $data['nama_dokter'] ?></b></p>
            <p><?php echo $data['alamat_dokter'] ?></p>
            <p><?php echo $data['no_hp_dokter'] ?></p>
          </div>
          </table>
        </div>
        <table class="table">
          <thead>
          <div>
            <tr>
              <th>Deskripsi</th>
              <th>Harga</th>
            </tr>
          </div>
          <div>
              <tr>
                <td>Jasa Dokter</td>
                <td>Rp 150.000</td>
              </tr>
          </div>
          </thead>
          <tbody>
                <!-- <tr><td class="">Daftar Obat:</td></tr> -->
                  <?php
                  $result_obat = mysqli_query($mysqli, "SELECT dp.*, o.nama_obat as 'nama_obat', o.harga as 'harga'
                                                      FROM detail_periksa dp
                                                      LEFT JOIN obat o ON (dp.id_obat = o.id)
                                                      WHERE dp.id_periksa = '" . $_GET['id'] . "'");
                  while ($data_obat = mysqli_fetch_array($result_obat)) {
                    ?>
                    <tr>
                      <td><?php echo $data_obat['nama_obat']; ?><br></td>
                      <td>Rp <?php echo number_format($data_obat['harga'], 2, ',', '.'); ?></td>
                    </tr>
                    <?php
                      $total_obat += $data_obat['harga'];
                      }
                    ?>
            </tbody>
        </table>
        <table class="total">
              <tr>
                <th>Jasa Dokter</th>
                <td>Rp 150.000</td>
              </tr>
              <tr>
                <th>Subtotal Obat</th>
                <td><?= "Rp " . number_format($total_obat, 2, ',', '.'); ?></td>
              </tr>
              <tr>
                <th>Total</th>
                <td><?= "Rp " . number_format($total_obat + 150000, 2, ',', '.'); ?></td>
              </tr>
        </table>
      <!-- </div> -->
      <?php
        }
        ?>
    </div>

    <div class="footer">
      Terima kasih atas kunjungan Anda.
    </div>
    <a class="btn btn-primary my-2" href="index.php?page=periksa">Kembali</a>
  </div>

  <!-- <script type="text/javascript">
        window.print();
    </script> -->
</body>
</html>

