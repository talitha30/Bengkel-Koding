<?php
include 'conn/koneksi.php';

//login itu menampung data si pelogin dalam session

//logout itu menghapus data itu
session_start();
session_destroy();
echo "<script>alert('anda telah logout')</script>";
echo "<script>location='index.php'</script>";
?>
