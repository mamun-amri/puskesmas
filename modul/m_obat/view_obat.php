<?php
if (isset($_REQUEST['act']) == 'hapus') {
    $kode_obat = $_REQUEST['id'];
    $query = mysqli_query($connect, "DELETE FROM m_obat WHERE kode_obat = '$kode_obat'");
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
        <h6 class="m-0 font-weight-bold text-primary">Data obat</h6>
    </div>
    <div class="card-body">
        <a href="page.php?page=form_obat&act=save" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data</a>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Satuan</th>
                        <th>Nama Obat</th>
                        <th>Kemasan</th>
                        <th>Stock</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query  = mysqli_query($connect, "SELECT kode_obat, nama_obat, stock, satuan, kemasan, harga, nama_kemasan, nama_satuan
                    FROM m_obat JOIN m_kemasan
                      ON m_obat.kemasan = m_kemasan.id_kemasan
                      JOIN m_satuan
                      ON m_obat.satuan = m_satuan.id_satuan");
                    while ($row = mysqli_fetch_array($query)) : ?>
                        <tr>
                            <td><?= $row['nama_satuan'] ?></td>
                            <td><?= $row['nama_obat'] ?></td>
                            <td><?= $row['nama_kemasan'] ?></td>
                            <td><?= ucfirst($row['stock']) ?></td>
                            <td><?= ucfirst($row['harga']) ?></td>
                            <td>
                                <a href="?page=form_obat&act=edit&id=<?= $row['kode_obat'] ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <a href="?page=view_obat&act=hapus&id=<?= $row['kode_obat'] ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>
</div>