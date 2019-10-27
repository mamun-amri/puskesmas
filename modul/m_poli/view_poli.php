<?php
if (isset($_REQUEST['act']) == 'hapus') {
    $id_poli = $_REQUEST['id'];
    $query = mysqli_query($connect, "DELETE FROM m_poli WHERE id_poli = '$id_poli'");
    if ($query) {
        $_SESSION['sweetalert'] = 'hapus';
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
<?php Session_destroy(); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary ">Data poli</h6>
    </div>
    <div class="card-body">
        <button class="btn btn-primary tombol-tambah" data-toggle="modal" data-target="#poli"> <i class="fas fa-plus"></i> Tambah Data</button>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama poli</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query  = mysqli_query($connect, "SELECT * FROM m_poli");
                    $i = 1;
                    while ($row = mysqli_fetch_array($query)) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['nama_poli'] ?></td>
                            <td>
                                <button data-toggle="modal" data-target="#poli<?= $row['id_poli'] ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></button>
                                <a href="?page=view_poli&act=hapus&id=<?= $row['id_poli'] ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>

                    <?php $i++;
                    endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- insert modal -->
<!-- Modal -->
<div class="modal fade" id="poli" tabindex="-1" role="dialog" aria-labelledby="poliLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="poliLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="modul/m_poli/proses_poli.php?act=save" method="post">
                <div class="modal-body">
                    <label for="nama_poli">Nama poli</label>
                    <input type="text" name="nama_poli" id="nama_poli" class="form-control" autocomplete="off">
                    <input type="hidden" name="id_poli" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    <a href="page.php?page=view_poli" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end insert modal -->

<?php
$row = mysqli_query($connect, "SELECT * FROM m_poli");
foreach ($row as $r) :
    $id_poli     = $r['id_poli'];
    $nama_poli   = $r['nama_poli'];
    $act            = "edit";
    ?>
    <!-- edit modal -->
    <!-- Modal -->
    <div class="modal fade" id="poli<?= $id_poli; ?>" tabindex="-1" role="dialog" aria-labelledby="poliLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="poliLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="modul/m_poli/proses_poli.php?act=<?= $act ?>" method="post">
                    <div class="modal-body">
                        <label for="nama_poli">Nama poli</label>
                        <input type="text" name="nama_poli" id="nama_poli" class="form-control" value=" <?= $nama_poli; ?>">
                        <input type="hidden" name="id_poli" value="<?= $id_poli ?>" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><?= $act ?></button>
                        <a href="page.php?page=view_poli" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end edit modal -->
<?php endforeach; ?>