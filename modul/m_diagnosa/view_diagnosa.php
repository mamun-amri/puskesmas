<?php
if (isset($_REQUEST['act']) == 'hapus') {
    $kode_diagnosa = $_REQUEST['id'];
    $query = mysqli_query($connect, "DELETE FROM m_diagnosa WHERE kode_diagnosa = '$kode_diagnosa'");
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
<div class="href" data-flashdata="<?= $_SESSION['href'] ?>"></div>
<div class='flash-data' data-flashdata='<?= $_SESSION['sweetalert']; ?>'></div>
<?php Session_destroy(); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data diagnosa</h6>
    </div>
    <div class="card-body">
        <button class="btn btn-primary tombol-tambah" data-toggle="modal" data-target="#diagnosa"> <i class="fas fa-plus"></i> Tambah Data</button>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama diagnosa</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query  = mysqli_query($connect, "SELECT * FROM m_diagnosa");
                    $i = 1;
                    while ($row = mysqli_fetch_array($query)) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['diagnosa'] ?></td>
                            <td>
                                <button data-toggle="modal" data-target="#diagnosa<?= $row['kode_diagnosa'] ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></button>
                                <a href="?page=view_diagnosa&act=hapus&id=<?= $row['kode_diagnosa'] ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash-alt"></i></a>
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
<div class="modal fade" id="diagnosa" tabindex="-1" role="dialog" aria-labelledby="diagnosaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="diagnosaLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="modul/m_diagnosa/proses_diagnosa.php?act=save" method="post">
                <div class="modal-body">
                    <label for="diagnosa">Nama diagnosa</label>
                    <input type="text" name="diagnosa" id="diagnosa" class="form-control" autocomplete="off">
                    <input type="hidden" name="kode_diagnosa" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    <a href="page.php?page=view_diagnosa" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end insert modal -->

<?php
$row = mysqli_query($connect, "SELECT * FROM m_diagnosa");
foreach ($row as $r) :
    $kode_diagnosa     = $r['kode_diagnosa'];
    $diagnosa   = $r['diagnosa'];
    $act            = "edit";
    ?>
    <!-- edit modal -->
    <!-- Modal -->
    <div class="modal fade" id="diagnosa<?= $kode_diagnosa; ?>" tabindex="-1" role="dialog" aria-labelledby="diagnosaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="diagnosaLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="modul/m_diagnosa/proses_diagnosa.php?act=<?= $act ?>" method="post">
                    <div class="modal-body">
                        <label for="diagnosa">Nama diagnosa</label>
                        <input type="text" name="diagnosa" id="diagnosa" class="form-control" value=" <?= $diagnosa; ?>">
                        <input type="hidden" name="kode_diagnosa" value="<?= $kode_diagnosa ?>" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><?= $act ?></button>
                        <a href="page.php?page=view_diagnosa" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end edit modal -->
<?php endforeach; ?>