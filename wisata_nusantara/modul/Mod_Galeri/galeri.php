<div class="container-fluid">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Keterangan Foto</th>
                        <th>Nama Wisata</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_galeri, tbl_wisata WHERE tbl_galeri.id_wisata=tbl_wisata.id_wisata");

                    while ($r = mysqli_fetch_array($sql)){ ?>
                    <tr>
                        <td></td>
                        <td><?php echo $r['keterngan_foto']?></td>
                        <td><?php echo $r['nama_wisata'] ?></td>
                        <td>img src="././img_galeri/<?php echo $r['nama_foto'] ?>" height="100" width="100"></td>
                        </td>
                    </tr>
                   <?php }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>