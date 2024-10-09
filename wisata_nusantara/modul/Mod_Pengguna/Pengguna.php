<div class="container-fluid">
    <div class="card">
        <div class="card_header"></div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group w-25">
                    <label>Username</label>
                    <input type="text" name="username" id="" class="form-control" placeholder="Masukan Username" autocomplete="off" required>
                </div>
                <div class="form-group w-25">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="" placeholder="Masukan Password" required>
                </div>
                <div class="form-group w-25">
                    <label>Konfirmasi Password</label>
                    <input type="password" class="form-control" name="konfirmasi_password" placeholder="Masukan Kembali Password" required>
                </div>
                <button type="submit" name="submit" class="btn-primary">Update</button>
            </form>

            <?php 
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $konfirmasi_password = $_POST['konfirmasi_password'];
                $id_user_login = $_SESSION['adminid'];

                if ($password == $konfirmasi_password) {
                    $password_md5 = md5($password); // Hash password using MD5

                    mysqli_query($koneksi, "UPDATE tbl_admin SET username='$username', password='$password_md5' WHERE admin_id=$id_user_login");

                    echo "<script>alert('Berhasil Diubah'); window.location = 'dashboard.php?Halaman=Pengguna'</script>";
                } else {
                    echo "<script>alert('Password Tidak Sama'); window.location = 'dashboard.php?Halaman=Pengguna'</script>";
                }
            }
            ?>
        </div>
    </div>
</div>
