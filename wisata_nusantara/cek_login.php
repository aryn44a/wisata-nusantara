<?php
include "koneksi.php";

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username = '$username' and password = '$password'");

$cek = mysqli_num_rows($query);

$r = mysqli_fetch_array($query);

// echo $cek;

if ($cek > 0) {
    $_SESSION['namaadmin']  = $r['nama_admin'];
    $_SESSION['username']   = $r['username'];
    $_SESSION['password']   = $r['password'];
    $_SESSION['adminid']   = $r['admin_id'];

    if (!empty($_POST["remember"])) {
        setcookie("username", $_POST["username"], time() + (60 * 60 * 24 * 5));
        setcookie("password", $_PORT["password"], time() + (60 * 60 * 24 * 5));
    } else {
        setcookie("username", "");
        setcookie("password", "");
    }

    header("location:dashboard.php");
} else {
    header("location:gagal_login.php");
}

?>