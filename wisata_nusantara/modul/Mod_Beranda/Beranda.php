<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-group">
                <div class="card text-white bg-primary mb-3 m-2" style="max-width: 18rem;">
                    <div class="card-body">
                        <?php
                        $sql_kategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                        $jumblah_kategori = mysqli_num_rows($sql_kategori);
                        ?>
                        <h1 class="card-title"><?php echo $jumblah_kategori ?></h1>
                        <p class="card-text">Total Data Kategori</p>
                        <div class="card-header text-center">
                            <a class="card-footer text-center"><a class="text-white text-decoration-none" href="dashboard.php?Halaman=Kategori">Lihat Data  <i
                            class="bi bi-arrow-right-circle-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card text-white bg-success mb-3 m-2" style="max-width: 18rem;">
                    <div class="card-body">
                        <?php
                        $sql_wisata = mysqli_query($koneksi, "SELECT * FROM tbl_wisata");
                        $jumblah_wisata = mysqli_num_rows($sql_wisata);
                        ?>
                        <h1 class="card-title"><?php echo $jumblah_wisata ?></h1>
                        <p class="card-text">Total Data Wisata</p>
                        <div class="card-header text-center">
                            <a class="card-footer text-center"><a class="text-white text-decoration-none" href="dashboard.php?Halaman=Wisata">Lihat Data    <i
                            class="bi bi-arrow-right-circle-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card text-white bg-danger mb-3 m-2" style="max-width: 18rem;">
                    <div class="card-body">
                        <?php
                        $sql_galeri = mysqli_query($koneksi, "SELECT * FROM tbl_galeri");
                        $jumblah_galeri = mysqli_num_rows($sql_galeri);
                        ?>
                        <h1 class="card-title"><?php echo $jumblah_galeri ?></h1>
                        <p class="card-text">Total Data galeri</p>
                        <div class="card-header text-center">
                            <a class="card-footer text-center"><a class="text-white text-decoration-none" href="dashboard.php?Halaman=Galeri">Lihat Data    <i
                            class="bi bi-arrow-right-circle-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row border mt2">
        <div class="col-md-6">
            <canvas id="grafikWisata" style="width:100%;max-width:700px"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="grafikGaleri" style="width:100%;max-width:700px"></canvas>
        </div>
    </div>
</div>
