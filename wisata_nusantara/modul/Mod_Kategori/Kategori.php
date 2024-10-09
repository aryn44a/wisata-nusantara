<div class="container-fluid">
    <div class="card">
        <div class="card-header">

        <a href="dashboard.php?Halaman=Tambah_Kategori" class="btn btn-primary"><i class="bi bi-plus-square"></i> Data Kategori</a>
        <div class="card-body">
            <table id="example" class="display" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                    while($r = mysqli_fetch_array($sql)) { 
                    ?>
                    <tr>
                        <td></td>-
                        <td><?php echo $r['nama_kategori'] ?></td>
                        <td><?php echo $r['keterangan'] ?></td>
                        <td>
                            <a href= "dashboard.php?Halaman=edit_kategori&id=<?php echo $r['id_kategori']?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
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