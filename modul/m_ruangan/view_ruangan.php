<?php
if (isset($_REQUEST['act']) == 'hapus') {
    $kode_ruangan = $_REQUEST['id'];
    $query = mysqli_query($connect, "DELETE FROM m_ruangan WHERE kode_ruangan = '$kode_ruangan'");
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
        <h6 class="m-0 font-weight-bold text-primary">Data ruangan</h6>
    </div>
    <div class="card-body">
        <a href="page.php?page=form_ruangan&act=save" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data</a>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kelas</th>
                        <th>Ruangan</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query  = mysqli_query($connect, "SELECT * FROM m_ruangan");
                    $i = 1;
                    while ($row = mysqli_fetch_array($query)) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['kelas'] ?></td>
                            <td><?= $row['ruangan'] ?></td>
                            <td><?= 'Rp.' . $row['harga'] ?></td>
                            <td>
                                <a href="?page=form_ruangan&act=edit&id=<?= $row['kode_ruangan'] ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <a href="?page=view_ruangan&act=hapus&id=<?= $row['kode_ruangan'] ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>

                    <?php $i++;
                    endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>