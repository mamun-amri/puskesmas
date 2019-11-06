<?php
if (isset($_REQUEST['act']) == 'hapus') {
    $no_pendaftaran = $_REQUEST['id'];
    $query = mysqli_query($connect, "DELETE FROM t_pendaftaran WHERE no_pendaftaran = '$no_pendaftaran'");
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
    <div class="card-header py-3 mb-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pendaftaran</h6>
    </div>

    <!-- navbar -->
    <ul class="nav nav-pills ml-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a href="#pills-tampil" class="nav-link active" id="pills-tampil-tab" role="tab" data-toggle="pill" aria-controls="pills-tampil" aria-selected="true">Tampil Data</a>
        </li>
        <li class="nav-item">
            <a href="#pills-pendaftaran" class="nav-link false" id="pills-pendaftaran-tab" role="tab" data-toggle="pill" aria-controls="pills-pendaftaran" aria-selected="false">Pendaftaran Baru</a>
        </li>
    </ul>
    <!-- end navbar -->

    <!-- navbar yang ditampilkan -->
    <div class="tab-content" id="pills-tabContent">
        <!-- tab tampil -->
        <div class="tab-pane fade show active" id="pills-tampil" role="tabpanel" aria-labelledby="pills-tampil-tab">
            <div class="card-body">
                <!-- <a href="page.php?page=form_pendaftaran&act=save" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data</a> -->
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pasien</th>
                                <th>Poli</th>
                                <th>Pelayan</th>
                                <th>pendaftaran</th>
                                <th>Tgl Daftar</th>
                                <th>Jenis Berobat</th>
                                <th>No Antrian</th>
                                <th>Petugas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query  = mysqli_query($connect, "SELECT * FROM t_pendaftaran");
                            $i = 1;
                            while ($row = mysqli_fetch_array($query)) :
                                $tgl = tgl_indo($row['tgl_lahir']);
                                ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $row['nip'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['alamat'] ?></td>
                                    <td><?= ucfirst($row['tmp_lahir']) . "," . $tgl ?></td>
                                    <td><?= ucfirst($row['jenis_kelamin']) ?></td>
                                    <td><?= $row['no_telp'] ?></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="?page=form_pendaftaran&act=edit&id=<?= $row['no_pendaftaran'] ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="?page=view_pendaftaran&act=hapus&id=<?= $row['no_pendaftaran'] ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php $i++;
                            endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end tab tampil -->
        <!-- tab pendaftaran -->
        <div class="tab-pane fade" id="pills-pendaftaran" role="tabpanel" aria-labelledby="pills-pendaftaran-tab">

        </div>
        <!-- end tab pendaftaram -->
    </div>
    <!-- end navbar yang ditampilkan -->
</div>