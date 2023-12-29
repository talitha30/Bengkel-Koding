<?php

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['login'])) {
    // Jika belum login, arahkan kembali ke halaman login
    header('Location: index.php?page=login');
    exit;
}

include_once("koneksi.php");

if (isset($_POST['simpan'])) {
    if (isset($_POST['id'])) {
        $ubah = mysqli_query($mysqli, "UPDATE periksa SET 
                                            id_pasien = '" . $_POST['id_pasien'] . "',
                                            id_dokter = '" . $_POST['id_dokter'] . "',
                                            tgl_periksa = '" . $_POST['tgl_periksa'] . "',
                                            catatan = '" . $_POST['catatan'] . "'
                                            WHERE id = '" . $_POST['id'] . "'");
        $hapus_detail = mysqli_query($mysqli, "DELETE FROM detail_periksa WHERE id_periksa = '" . $_POST['id'] . "'");
        foreach ($_POST['obat'] as $obat) {
            $tambah_detail = mysqli_query($mysqli, "INSERT INTO detail_periksa (id_periksa, id_obat) 
                                            VALUES (
                                                '" . $_POST['id'] . "',
                                                '" . $obat . "'
                                            )");
        }
    } else {
        $tambah = mysqli_query($mysqli, "INSERT INTO periksa (id_pasien, id_dokter, tgl_periksa, catatan) 
                                            VALUES (
                                                '" . $_POST['id_pasien'] . "',
                                                '" . $_POST['id_dokter'] . "',
                                                '" . $_POST['tgl_periksa'] . "',
                                                '" . $_POST['catatan'] . "'
                                            )");
        $periksa_id = mysqli_insert_id($mysqli);
        foreach ($_POST['obat'] as $obat) {
            $tambah_detail = mysqli_query($mysqli, "INSERT INTO detail_periksa (id_periksa, id_obat) 
                                            VALUES (
                                                '" . $periksa_id . "',
                                                '" . $obat . "'
                                            )");
        }
    }
    echo "<script> 
                document.location='index.php?page=periksa';
                </script>";
}



if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        $hapus = mysqli_query($mysqli, "DELETE FROM periksa WHERE id = '" . $_GET['id'] . "'");
    }

    echo "<script> 
                document.location='index.php?page=periksa';
                </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap Online -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Poliklinik</title>   <!-- Judul Halaman -->
</head>

<body>
    <div class="container">
     
    <!--Form Input Data-->

<form class="form row" method="POST" action="" name="myForm" onsubmit="return(validate());">
    <!-- Kode php untuk menghubungkan form dengan database -->
    <?php
    $id_pasien = '';
    $id_dokter = '';
    $tgl_periksa = '';
    $catatan = '';
    $obat = [];
    if (isset($_GET['id'])) {
        $ambil = mysqli_query($mysqli, "SELECT * FROM periksa WHERE id='" . $_GET['id'] . "'");
        while ($row = mysqli_fetch_array($ambil)) {
            $id_pasien = $row['id_pasien'];
            $id_dokter = $row['id_dokter'];
            $tgl_periksa = $row['tgl_periksa'];
            $catatan = $row['catatan'];
            $detail_periksa = mysqli_query($mysqli, "SELECT * FROM detail_periksa WHERE id_periksa='" . $_GET['id'] . "'");
            while ($row = mysqli_fetch_array($detail_periksa)) {
                $obat[] = $row['id_obat'];
            }
        }
    ?>
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    <?php
    }
    ?>
    <div class="form-group mx-sm-3 mb-2">
    <label for="inputPasien" class="form-label fw-bold">Pasien</label>
    <div>
        <select class="form-control" name="id_pasien">
        <option hidden>Pilih Pasien</option>
            <?php
            $selected = '';
            $pasien = mysqli_query($mysqli, "SELECT * FROM pasien");
            while ($data = mysqli_fetch_array($pasien)) {
                if ($data['id'] == $id_pasien) {
                    $selected = 'selected="selected"';
                } else {
                    $selected = '';
                }
            ?>
                <option value="<?php echo $data['id'] ?>" <?php echo $selected ?>><?php echo $data['nama'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    </div>

    <div class="form-group mx-sm-3 mb-2">
    <label for="inputDokter" class="form-label fw-bold">Dokter</label>
    <div>
        <select class="form-control" name="id_dokter">
        <option hidden>Pilih Dokter</option>
            <?php
            $selected = '';
            $dokter = mysqli_query($mysqli, "SELECT * FROM dokter");
            while ($data = mysqli_fetch_array($dokter)) {
                if ($data['id'] == $id_dokter) {
                    $selected = 'selected="selected"';
                } else {
                    $selected = '';
                }
            ?>
                <option value="<?php echo $data['id'] ?>" <?php echo $selected ?>><?php echo $data['nama'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    </div>

    <div class="form-group mx-sm-3 mb-2">
        <label for="inputTglPeriksa" class="form-label fw-bold">
            Tanggal Periksa
        </label>
        <input type="datetime-local" class="form-control" name="tgl_periksa" id="inputTglPeriksa" placeholder="Tanggal Periksa" value="<?php echo $tgl_periksa ?>">
    </div>

    <div class="form-group mx-sm-3 mb-2">
        <label for="inputCatatan" class="form-label fw-bold">
            Catatan
        </label>
        <input type="text" class="form-control" name="catatan" id="inputCatatan" placeholder="Tambahkan Catatan" value="<?php echo $catatan ?>">
    </div>

    <div class="form-group mx-sm-3 mb-2">
        <label for="inputObat" class="form-label fw-bold">Obat</label>
        <select class="form-control js-example-basic-multiple" name="obat[]" multiple="multiple">
            <?php
            $selected = '';
            $all_obat = mysqli_query($mysqli, "SELECT * FROM obat");
            while ($data = mysqli_fetch_array($all_obat)) {
                for ($i = 0; $i < count($obat); $i++) {
                    $obat_terpilih = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM obat WHERE id='" . $obat[$i] . "'"));
                    if ($obat_terpilih['id'] == $data['id']) {
                        $selected = 'selected="selected"';
                    } else {
                        $selected = '';
                        }
                    // jika tidak diinput
                    if ($_GET['id'] != null) {
                        if ($obat_terpilih == null) {
                                ?>
                                <option value="<?php echo $data['id'] ?>" ><?= $data['nama_obat'] ?></option>
                                <?php
                            }
                            if ($data['id'] == $obat_terpilih['id']) {
                                ?>
                                <option value="<?php echo $data['id'] ?>" <?php echo $selected ?>><?= $data['nama_obat'] ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $data['id'] ?>" <?php echo $selected ?>><?= $data['nama_obat'] ?></option>
                                <?php
                            }
                        }
                    }
                    if ($_GET['id'] == null) {
                        ?>
                        <option value="<?php echo $data['id'] ?>" <?php echo $selected ?>><?= $data['nama_obat'] ?></option>
                        <?php
                    }
                }
                ?>
        </select>
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary rounded-pill px-3" name="simpan">Simpan</button>
    </div>
</form>  
<br>
<!-- <br> -->
<!-- Table-->
<table class="table table-hover">
    <!--thead atau baris judul-->
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Pasien</th>
            <th scope="col">Dokter</th>
            <th scope="col">Tanggal Periksa</th>
            <th scope="col">Catatan</th>
            <th scope="col">Obat</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <!--tbody berisi isi tabel sesuai dengan judul atau head-->
    <tbody>
        <!-- Kode PHP untuk menampilkan semua isi dari tabel urut
        berdasarkan status dan tanggal awal-->
        <?php
        $result = mysqli_query($mysqli,
        "SELECT 
                    pr.*,
                    d.nama AS 'nama_dokter', 
                    p.nama AS 'nama_pasien', 
                    GROUP_CONCAT(o.nama_obat SEPARATOR ', ') AS 'obat'
                FROM periksa pr 
                LEFT JOIN dokter d ON (pr.id_dokter = d.id) 
                LEFT JOIN pasien p ON (pr.id_pasien = p.id)
                LEFT JOIN detail_periksa dp ON (pr.id = dp.id_periksa)
                LEFT JOIN obat o ON (dp.id_obat = o.id)
                GROUP BY pr.id
                ORDER BY pr.tgl_periksa DESC");

        $no = 1;
        while ($data = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data['nama_pasien'] ?></td>
                <td><?php echo $data['nama_dokter'] ?></td>
                <td><?php echo $data['tgl_periksa'] ?></td>
                <td><?php echo $data['catatan'] ?></td>
                <td style="width: 25%"><?php echo $data['obat'] == null ? 'Tidak ada obat' : $data['obat']; ?></td>
                <td>
                    <a class="btn btn-success rounded-pill px-3" href="index.php?page=periksa&id=<?php echo $data['id'] ?>">Ubah</a>
                    <a class="btn btn-danger rounded-pill px-3"href="index.php?page=periksa&id=<?php echo $data['id'] ?>&aksi=hapus">Hapus</a>
                    <a class="btn btn-warning rounded-pill px-3" href="index.php?page=nota&id=<?= $data['id'] ?>">Nota</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });
</script>

</body>
</html>