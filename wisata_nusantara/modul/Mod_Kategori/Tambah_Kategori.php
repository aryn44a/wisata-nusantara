<div class="container-fluid">
    <div class="card">
        <div class="card-header"><strong>Form Tambah Data</strong></div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori" placeholder="Masukan Kategori" required>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" rows="2" placeholder="Masukan Keterangan" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            
            <?php
                // Memastikan file koneksi sudah disertakan
                require_once 'koneksi.php'; 

                // Memproses data saat form di-submit
                if (isset($_POST['submit'])) {
                    // Mengambil data dari form dan melindunginya dari SQL Injection
                    $nama_kategori = mysqli_real_escape_string($koneksi, $_POST['nama_kategori']);
                    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

                    // Menyisipkan data ke database
                    $query = "INSERT INTO tbl_kategori (nama_kategori, keterangan) VALUES ('$nama_kategori', '$keterangan')";
                    if (mysqli_query($koneksi, $query)) {
                        // Berhasil memasukkan data, menampilkan pesan sukses
                        echo "<script>alert('Kategori Berhasil ditambahkan'); window.location = 'dashboard.php?Halaman=Kategori';</script>";
                    } else {
                        // Gagal memasukkan data, menampilkan pesan error
                        echo "<script>alert('Gagal menambahkan kategori. Coba lagi.');</script>";
                    }
                }
            ?>
        </div>
    </div>
</div>
