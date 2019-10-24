<?php
if (isset($_REQUEST['act']) == 'hapus') {
    $id_kemasan = $_REQUEST['id'];
    $query = mysqli_query($connect, "DELETE FROM m_kemasan WHERE id_kemasan = '$id_kemasan'");
    if ($query) {
        echo "<script> alert('Data berhasil dihaspus!'); document.location='page.php?page=view_kemasan'; </script>";
    } else {
        echo "<script> alert('Data gagal dihapus'); document.location='page.php?page=view_kemasan';</script>";
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
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data kemasan</h6>
    </div>
    <div class="card-body">
        <a href="page.php?page=form_kemasan&act=save" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data</a>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Id Kemasan </th>
                        <th>Nama kemasan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query  = mysqli_query($connect, "SELECT * FROM m_kemasan");
                    $i = 1;
                    while ($row = mysqli_fetch_array($query)) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['id_kemasan'] ?></td>
                            <td><?= $row['nama_kemasan'] ?></td>
                            <td>
                                <a href="?page=form_kemasan&act=edit&id=<?= $row['id_kemasan'] ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <a href="?page=view_kemasan&act=hapus&id=<?= $row['id_kemasan'] ?>" onclick="return confirm('yakin mau dihapus!');" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>

                    <?php $i++;
                    endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>