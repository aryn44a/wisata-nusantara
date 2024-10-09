<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <strong>Form Ubah Data</strong>
        </div>
        <div class="card-body">
            <?php

use function PHPSTORM_META\map;

                $id = $_GET['id'];
                $sql =mysqli_query($koneksi, "SELECT * FROM tbl_wisata WHERE id_wisata=$id");
                $r =mysqli_fetch_array($sql);
            ?>
            <form action="" method="POST">
            <div class="form-group">
                <label>Nama wisata</label>
                <input type="text name" name="nama_wisata" class="form-control" value="<?php echo $r['nama_wisata']?>">
            </div>
                <div class="form-group">
                    <label>Kategori Wisata</label>
                    <select name="id_kategori" class="form-control">
                        <?php
                            if ($r['id_kategori'] ==0 ) { ?>
                                <option value="0" selected>--pilih kategori wisata--</option>
                                <?php
                            }


                            $tampil =mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                            while($a =mysqli_fetch_array($tampil)) {
                                if ($r['id_kategori'] == $a['id_kategori']) { ?>
                                    <option value="<?php echo $a['id_kategori'] ?>" selected>
                                    <?php echo $a['nama_kategori'] ?></option>
                                <?php
                                } else{ ?>
                                    <option value="<?php echo $a['id_kategori'] ?>" selected>
                                    <?php echo $a['nama_kategori'] ?></option>
                                    <?php
                                    
                                }

                            }
                        ?>
                        
                    </select>
                </div>

                <div class="form-group">
                <label>Lokasi wisata</label>
                <input type="text name" name="lokasi_wisata" class="form-control" value="<?php echo $r['lokasi_wisata']?>">
            </div>
            <div class="form-gruop">
                <label>Link Peta</label>
                <textarea rows="4" class="form-control" name="link_peta"><?php echo $r['Link_peta'] ?></textarea>
            </div>

            <div class="form-gruop">
                <label>deskripsi</label>
                <textarea rows="5" class="form-control" id="ckeditor" name="deskripsi"><?php echo $r['deskripsi'] ?></textarea>
            </div>

            <div class="form-group">
            <button type="submit" name="submit" class="btn btn -primary">Submit</button>
            </div>
            </form>
            <?php
                if(isset($_POST['submit'])) {
                    $nama_wisata =$_POST['nama_wisata'];
                    $id_kategori =$_POST['id_kategori'];
                    $link_peta =$_POST['link_peta'];
                    $lokasi_wisata =$_POST['lokasi_wisata'];
                    $deskripsi =$_POST['deskripsi'];

                    mysqli_query($koneksi, "UPDATE tbl_wisata SET nama_wisata='$nama_wisata',
                                                                id_kategori='$id_kategori',
                                                                lokasi_wisata=$_lokasi_wisata,
                                                                link_wisata='$link_peta',
                                                                deskripsi='$deskripsi',
                                                    WHERE id_wisata='$id'");

                    echo "<script>alert('Wisata Berhasil  di Ubah'); window.location='dashboard.php?Halaman=wisata'</script>";
                                                                
                }

            ?>
        </div>
    </div>
</div>