<div class="container-fluid">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="" method="POST">
            <div class="form-group">
                <label for=>Nama Wisata</label>
                <input type="text" class="form-control" name="nama_wisata" placeholder="Masukan Nama Wisata">
            </div>
                    <div class="form-group">
            <label>Kategori Wisata</label>
            <select class="form-control" name="id_kategori">
            <option value="0"> <seleced ></select>--pilih kategori wisata--</option>
            
      <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM tbl_kategori ORDER BY id_kategori");
        while($r =mysqli_fetch_array($sql)) { ?>
            <option value="<?php echo $r['id_kategori']?>"><?php echo $r['nama_kategori']?></option>
        <?php
        }
      ?>
    </select>
  </div>
  <div class="form-group">
                <label for=>Lokasi Wisata</label>
                <input type="text" class="form-control" name="lokasi_wisata" placeholder="Masukan lokasi Wisata">
            </div>
            <div class="form-group">
                <label>Link Peta</label>
                <textarea class="form-control" name="Link Peta" rows="2" placeholder="Masukan Link Peta"></textarea>
        </div>
        <div class="form-group">
                <label>deskripsi</label>
                <textarea class="form-control ckeditor" id="ckeditor" name="deskripsi" rows="5" placeholder="Masukan deskripsi"></textarea>
        </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
            <?php
                if(isset($_POST['submit'])) {
                    $nama_wisata = $_POST['nama_wisata'];
                    $id_kategori = $_POST['kategori'];
                    $lokasi_wisata = $_POST['lokasi_wisata'];
                    $link_peta = $_POST['link_peta'];
                    $deskripsi = $_POST['deskripsi'];

                    mysqli_query($koneksi, "INSERT INTO tbl_wisata (nama_wisata, id_kategori, lokasi_wisata, 
                    link_peta, deskripsi) VALUES ($nama_wisata',' $id_kategori',' $lokasi_wisata',' $link_peta',' $deskripsi')");

                    echo "<script>alert('Wisata berhasi di tambahkan'); window.location = 'dashboard.php?Halaman=wisata'<
                    /script";
                }
            ?>
        </div>
    </div>
</div>