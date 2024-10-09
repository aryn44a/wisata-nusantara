<?php
$server     = "127.0.0.1:3308";
$username   = "root";
$password   = "";
$db_name    = "wisata_nusantara";

$koneksi = mysqli_connect($server,
 $username,
  $password,
   $db_name);

if (!$koneksi) {
    echo "Gagal terkoneksi: " . mysqli_connect_error();
} else {
    echo "tunggu sebentar...";
}
?>