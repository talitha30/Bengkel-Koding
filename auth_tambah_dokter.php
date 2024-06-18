<?php
    include "conn/koneksi.php";
    if($_POST){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $poli = $_POST['id_poli'];
        $password = $_POST['password'];
        $query = ("INSERT INTO dokter(nama,alamat,no_hp,id_poli,password) 
           VALUES ('".$nama."','".$alamat."','".$no_hp."','".$poli."','".$password."')");
        if(!mysqli_query($koneksi,$query)){
            die(mysql_error);
        }else
        {
            echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="login_dokter.php"</script>';
        }
    }
?>