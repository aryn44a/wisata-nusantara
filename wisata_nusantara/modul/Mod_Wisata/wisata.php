<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <a href="dashboard.php?Halaman=tambah_wisata" class="btn btn-primary">Data Wisata</a> 
        </div>
        <div class="card-body">
            <table id="example" class="display" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Wisata</th>
                        <th>Kategori</th>
                        <th>Lokasi Wisata</th>
                        <th>Maps</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_wisata, tbl_kategori WHERE tbl_wisata.id_kategori = tbl_kategori.id_kategori");
                    while($r = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                        <td></td>
                        <td><?php echo $r['nama_wisata']?></td>
                        <td><?php echo $r['id_kategori']?></td>
                        <td><?php echo $r['lokasi_wisata']?></td>
                        <td>
                        <iframe width="175" height="100"
                          src="<?php echo $r['link_peta']?>"  style="border: 1px solid black"></iframe><br/>
                        </td>
                        <td>
                            <a href="dashboard.php?Halaman=edit_wisata&id=<?php echo $r['id_wisata']?>" class="btn 
                            btn-success"><i class="bi bi-pencil-square"></i></a>

                            <a href="dashboard.php?Halaman=hapus_wisata&id=<?php echo ['id_wisata'] ?>" class="btn btn-danger"><i class="bi bi-x-square"></i></a>
                        </td>
                
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
        </table>
        </div>
    </div>
</div>