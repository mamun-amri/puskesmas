<?php
if (isset($_REQUEST['act']) == 'hapus') {
    $id_pasien = $_REQUEST['id'];
    $query = mysqli_query($connect, "DELETE FROM m_pasien WHERE id_pasien = '$id_pasien'");
    if ($query) {
        $_SESSION['sweetalert'] = 'hapus';
        $_SESSION['href'] = $_SERVER['HTTP_REFERER'];
    } else {
        $_SESSION['sweetalert'] = 'gagal_hapus';
        $_SESSION['href'] = $_SERVER['HTTP_REFERER'];
    }
}
?>

<link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page level plugins -->
<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/datatables-demo.js"></script>
<!-- DataTales Example -->
<div class='href' data-flashdata='<?= $_SESSION['href']; ?>'></div>
<div class='flash-data' data-flashdata='<?= $_SESSION['sweetalert']; ?>'></div>
<?php session_destroy(); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
    </div>
    <div class="card-body">
        <a href="page.php?page=form_pasien&act=save" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data</a>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>TTL</th>
                        <th>Kelamin</th>
                        <th>No Telp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query  = mysqli_query($connect, "SELECT * FROM m_pasien");
                    while ($row = mysqli_fetch_array($query)) :
                        $tgl = tgl_indo($row['tgl_lahir']);
                        ?>
                        <tr>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td><?= ucfirst($row['tmp_lahir']) . "," . $tgl ?></td>
                            <td><?= ucfirst($row['jenis_kelamin']) ?></td>
                            <td><?= $row['no_telp'] ?></td>
                            <td>
                                <a href="?page=form_pasien&act=edit&id=<?= $row['id_pasien'] ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <a href="?page=view_pasien&act=hapus&id=<?= $row['id_pasien'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt tombol-hapus"></i></a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>
</div>