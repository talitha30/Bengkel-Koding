<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>DAFTAR PERIKSA PASIEN</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col">
            <table id="periksa_pasien" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No. Urut</th>
                  <th>Nama Pasien</th>
                  <th>Keluhan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conn/koneksi.php";
                $id_dokter = $_SESSION['id'];
                $no=0;
                $query=mysqli_query($koneksi,"SELECT *,pasien.nama as nama_pasien,
                  daftar_poli.id as id_daftar_poli,
                  pasien.id as id_pasien,
                  periksa.id as id_periksa,
                  dokter.id as id_dokter 
                  FROM daftar_poli
                  JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id
                  JOIN dokter ON jadwal_periksa.id_dokter = dokter.id
                  JOIN poli ON dokter.id_poli = poli.id
                  JOIN pasien ON daftar_poli.id_pasien = pasien.id
                  LEFT JOIN periksa ON periksa.id_daftar_poli = daftar_poli.id
                  WHERE id_dokter=$id_dokter ORDER BY daftar_poli.id DESC");
                while ($row=mysqli_fetch_array($query))
                {
                ?>
                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['nama_pasien'];?></td>
                  <td><?php echo $row['keluhan'];?></td>
                  <td>
                    <?php
                    if (!empty(trim($row['id_periksa']))){?>
                      <a href="index_dokter.php?page=periksa_pasien_edit&id=<?=$row['id_daftar_poli'];?>" class="btn btn-primary" role="button" title="Edit"></i>Edit</a>
                    <?php
                    } else {
                    ?>
                    <a href="index_dokter.php?page=periksa_pasien&id=<?=$row['id_daftar_poli'];?>" class="btn btn-success" role="button" title="Periksa"></i>Periksa</a>
                    <?php
                    }
                    ?>
                  </td>
                </tr>

                <?php } ?>

                </tbody>
              </table>
          </div>
        
        </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->