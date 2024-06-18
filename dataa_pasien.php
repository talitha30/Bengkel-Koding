<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
    <!-- Include Bootstrap CSS and other necessary stylesheets -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Data Pasien</h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <!-- Form to Add/Edit Patient Data -->
                        <form role="form" method="post" action="../auth_tambah_pasien.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Pasien" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                                </div>
                                <div class="form-group">
                                    <label>No KTP</label>
                                    <input type="text" name="no_ktp" class="form-control" placeholder="No KTP" required>
                                </div>
                                <div class="form-group">
                                    <label>No RM</label>
                                    <input type="text" name="no_rm" class="form-control" placeholder="No RM" required>
                                </div>
                                <div class="form-group">
                                    <label>No Hp</label>
                                    <input type="text" name="no_hp" class="form-control" placeholder="No Hp" required>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Poli</label>
                                    <input type="text" name="poli" class="form-control" placeholder="Poli" required>
                                </div> -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" title="Simpan Data">
                                    <i class="glyphicon glyphicon-floppy-disk"></i> Simpan
                                </button>
                                <button type="reset" class="btn btn-secondary" title="Reset Data">
                                    <i class="glyphicon glyphicon-plus"></i> Reset
                                </button>
                            </div>
                        </form>
                        <br>

                        <!-- Table to Display Patient Data -->
                        <div class="box-body table-responsive">
                            <table id="pasien" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No KTP</th>
                                    <th>No RM</th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                include "conn/koneksi.php";
                                $query = mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY id DESC");
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['nama']; ?></td>
                                        <td><?php echo $row['alamat']; ?></td>
                                        <td><?php echo $row['no_ktp']; ?></td>
                                        <td><?php echo $row['no_rm']; ?></td>
                                        <td><?php echo $row['no_hp']; ?></td>
                                        <td>
                                            <a href="../ubah_pasien.php?id=<?php echo $row['id']; ?>" class="btn btn-success" title="Ubah Data">
                                                <i class="glyphicon glyphicon-edit"></i> Ubah
                                            </a>
                                            <a href="../hapus_pasien.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" title="Hapus Data">
                                                <i class="glyphicon glyphicon-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- Include jQuery, Bootstrap, and DataTables scripts -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/dist/js/adminlte.min.js"></script>

<!-- Initialize DataTables -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#pasien').DataTable();
    });
</script>
</body>
</html>
