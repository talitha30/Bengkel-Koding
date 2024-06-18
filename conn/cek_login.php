<?php

include 'koneksi.php';

if (isset($_POST['log'])) {
    $user = mysqli_real_escape_string($koneksi, $_POST['username']);
    $pass = mysqli_real_escape_string($koneksi, $_POST['password']);
    $pass = md5($pass);


    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user' AND password='$pass'");

    $data = mysqli_fetch_array($query);
    $username = $data['username'];
    $password = $data['password'];
    $role = $data['role'];

    if ($user==$username && $pass==$password){

        session_start();
        $_SESSION['name'] = $username;
        $_SESSION['role'] = $role;

        if ($role === 'admin') {
            echo "<script> alert('Anda berhasil login : $role');</script>";
            echo "<meta http-equiv='refresh' content='0; url=../admin/index_admin.php'>";

        }else{
            echo "<script> alert('Anda berhasil login : $role');</script>";
            echo "<meta http-equiv='refresh' content='0; url=../index_dokter.php'>";
        }
    }else{
        echo "<script> alert('Anda tidak berhasil login);</script>";
            echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
    }

}

?>
