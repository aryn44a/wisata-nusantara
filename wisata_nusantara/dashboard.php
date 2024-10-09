<?php
require_once "koneksi.php";
date_default_timezone_set("Asia/Jakarta");
session_start();

// Mengecek apakah pengguna sudah login atau belum
if (empty($_SESSION["username"]) || empty($_SESSION["password"])) {
    echo "
    <center>
    <br><br><br><br><br><br><br><br><br><br>
    <b>Maaf, Silakan Melakukan Login!</b><br>
    <b>Anda telah keluar dari sistem</b><br>
    <b>atau anda belum melakukan login</b><br>
    <a href='index.php'  title='Klik Gambar ini untuk kembali ke Halaman login'>
    <img src='img/key-login.png' height='100' width='100'></a>
    </center>
    ";
    exit(); // Menghentikan eksekusi skrip jika pengguna belum login
} else {
    // Jika pengguna sudah login, maka lanjutkan ke halaman dashboard
    $kategori_wisata = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
    while ($r = mysqli_fetch_assoc($kategori_wisata)) {
    $nama_kategori[] = $r['nama_kategori'];

    $jml_wisata = mysqli_query($koneksi, "SELECT COUNT(id_kategori) AS total FROM tbl_wisata WHERE id_kategori = {$r['id_kategori']}");
    $a = mysqli_fetch_assoc($jml_wisata);
    $total_wisata[] = $a['total'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:dashboard  <?php echo ucfirst(isset($_GET["Halaman"]) ? $_GET["Halaman"] : "Beranda") ?>:</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="//cdn.ckeditor.com/4.25.0/full/ckeditor.js"></script> <!-- ckeditor -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <!-- Grafik -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 py-3 bg-primary fixed-top">
            <div class="dropdown float-right">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pengguna
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">
                        <div class="media">
                            <img class="align-self-center mr-3" src="img/neosantara-tour-information-favicon-color.png" height="50" width="50" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0"><?php echo $_SESSION['namaadmin'] ?></h5>
                                <small><p class="mb-0"><i class="bi bi-clock-fill"></i> Waktu: <?php echo date('H:i') ?> WIB</p></small>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item" href="dashboard.php?Halaman=Pengguna"><i class="bi bi-gear"></i> Pengaturan</a>
                    <a class="dropdown-item" href="Logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')">
                    <i class="bi bi-box-arrow-left"></i> Keluar
                    </a>

                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4" style="padding-top:50px">
        <div class="col-lg-2 position-fixed vh-100">
            <!-- Menu navigasi -->
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link <?php echo (isset($_GET['Halaman']) && $_GET['Halaman'] == "Beranda") ? "active" : ""; ?>" href="dashboard.php?Halaman=Beranda">Beranda</a>
<a class="nav-link 
    <?php 
        echo (isset($_GET['Halaman']) && 
        ($_GET['Halaman'] == "Kategori" || $_GET['Halaman'] == "Tambah_Kategori" || $_GET['Halaman'] == "edit_kategori")) 
        ? "active" : ""; 
    ?>" 
    href="dashboard.php?Halaman=Kategori">Kategori</a>

                <a class="nav-link <?php echo (isset($_GET['Halaman']) && $_GET['Halaman'] == "Wisata") ? "active" : ""; ?>" href="dashboard.php?Halaman=Wisata">Wisata</a>
<a class="nav-link 
    <?php 
        echo (isset($_GET['Halaman']) && 
        ($_GET['Halaman'] == "galeri" || $_GET['Halaman'] == "Tambah_galeri" || $_GET['Halaman'] == "edit_galeri")) 
        ? "active" : ""; 
    ?>" 
    href="dashboard.php?Halaman=galeri">Galeri</a>
<a class="nav-link 
    <?php 
        echo (isset($_GET['Halaman']) && 
        ($_GET['Halaman'] == "berita" || $_GET['Halaman'] == "Tambah_berita" || $_GET['Halaman'] == "edit_berita")) 
        ? "active" : ""; 
    ?>" 
        href="dashboard.php?Halaman=berita">berita</a>
                <a class="nav-link <?php echo (isset($_GET['Halaman']) && $_GET['Halaman'] == "Profil") ? "active" : ""; ?>" href="dashboard.php?Halaman=Profil">Profil</a>
            </div>
        </div>
        <div class="col-lg-10 offset-2">
            <?php 
            if(isset($_GET['Halaman'])) {
                switch($_GET['Halaman']){
                case "Beranda":
                    include "modul/Mod_Beranda/Beranda.php";
                    break;
                case "Profil":
                    include "modul/Mod_Profil/Profil.php";
                    break;
                case "Galeri":
                    include "modul/Mod_galeri/galeri.php";
                    break;
                case 'tambah_galeri':
                    include "modul/Mod_galeri/Tambah_galeri.php";
                    break;
                case 'edit_galeri':
                    include "modul/Mod_galeri/edit_galeri.php";
                    break;
                case "Wisata":
                    include "modul/Mod_Wisata/Wisata.php";
                    break;
                case "Kategori":
                    include "modul/Mod_Kategori/Kategori.php";
                    break;
                case 'Tambah_Kategori':
                    include "modul/Mod_Kategori/Tambah_Kategori.php";
                    break;
                case 'Edit_Kategori':
                    include "modul/Mod_Kategori/edit_Kategori.php";
                    break;
                case "berita":
                    include "modul/Mod_Berita/Berita.php";
                    break;
                case "Pengguna":
                    include"modul/Mod_Pengguna/Pengguna.php";
                    break;
                default:
                    echo "<h3>Maaf, Aplikasi masih dalam tahap pengembangan </h3>";
                    break;
                }
            } else {
                header("location:dashboard.php?Halaman=Beranda");
            }
            ?>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    $(document).ready(function () {
        var t = $('#example').DataTable({
            columnDefs: [
                {
                    searchable: false,
                    orderable: false,
                    targets: 0
                },
            ],
            order: [[1, 'asc']],
        });

        t.on('order.dt search.dt', function () {
            let i = 1;

            t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
                this.data(i++);
            });


        }).draw();
    });

            var x = <?php echo json_encode($nama_kategori)?>;
            var y = <?php echo json_encode($total_wisata)?>;
            var warna_bar = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e745"
            ];
            new Chart("grafikWisata", {
            type: "pie",
            data: {
                labels: x,
                datasets: [{
                backgroundColor: warna_bar,
                data: y
                }]
            },
            options: {
                title: {
                display: true,
                text: "jumblah data wisata "
                }
                }
                });
                </script>

            </body>
        </html>

    <?php
    }
?>