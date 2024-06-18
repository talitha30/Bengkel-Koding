<?php
    include "conn/koneksi.php";
    if($_POST){
        $nama_poli = $_POST['nama_poli'];
        $keterangan = $_POST['keterangan'];
        $harga = $_POST['harga'];
        $query = ("INSERT INTO poli(nama_poli,keterangan) 
           VALUES ('".$nama_poli."','".$keterangan."')");
        if(!mysqli_query($koneksi,$query)){
            die(mysql_error);
        }else
        {
            echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="admin/index_admin.php?page=data_poli"</script>';
        }
    }
?>
