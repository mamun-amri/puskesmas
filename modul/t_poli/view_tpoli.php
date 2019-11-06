<?php
if (isset($_REQUEST['act']) == 'hapus') {
    $id_poli = $_REQUEST['id'];
    $query = mysqli_query($connect, "DELETE FROM t_poli WHERE id_poli = '$id_poli'");
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
        <h6 class="m-0 font-weight-bold text-primary">Data poli</h6>
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
                        <th>Nama Dokter</th>
                        <th>Nama Ruangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query  = mysqli_query($connect, "SELECT t_poli.id_poli,nama, ruangan ,nama_poli
                                                        FROM t_poli JOIN m_poli
                                                    ON t_poli.id_poli = m_poli.id_poli 
                                                        JOIN m_dokter
                                                    ON t_poli.id_dokter = m_dokter.id_dokter 
                                                        JOIN m_ruangan 
                                                    ON t_poli.kode_ruangan = m_ruangan.kode_ruangan
                                                    ");
                    if (!$query) {
                        printf("Error : %s\n", mysqli_error($connect));
                        exit();
                    }
                    $i = 1;
                    while ($row = mysqli_fetch_array($query)) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['nama_poli'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['ruangan'] ?></td>
                            <td>
                                <button data-toggle="modal" data-target="#poli<?= $row['id_poli'] ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></button>
                                <a href="?page=view_tpoli&act=hapus&id=<?= $row['id_poli'] ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash-alt"></i></a>
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
            <form action="modul/t_poli/proses_tpoli.php?act=save" method="post">
                <div class="modal-body">
                    <label for="id_poli">Poli</label>
                    <select name="id_poli" class="custom-select">
                        <option value="" selected>---Pilih Poli---</option>
                        <?php
                        $id_poli = get_all('m_poli');
                        foreach ($id_poli as $ip) :
                            ?>
                            <option value="<?= $ip['id_poli'] ?>"> <?= $ip['nama_poli'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="id_dokter">Dokter</label>
                    <select name="id_dokter" class="custom-select">
                        <option value="" selected>---Pilih Dokter---</option>
                        <?php
                        $id_dokter = get_all('m_dokter');
                        foreach ($id_dokter as $id) :
                            ?>
                            <option value="<?= $id['id_dokter'] ?>"> <?= $id['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="kode_ruangan">Ruangan</label>
                    <select name="kode_ruangan" class="custom-select">
                        <option value="" selected>---Pilih Ruangan---</option>
                        <?php
                        $kode_ruangan = get_all('m_ruangan');
                        foreach ($kode_ruangan as $kode) :
                            ?>
                            <option value="<?= $kode['kode_ruangan'] ?>"> <?= $kode['ruangan'] ?></option>
                        <?php endforeach; ?>
                    </select>
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
$row = mysqli_query($connect, "SELECT * FROM t_poli");
foreach ($row as $r) :
    $poli     = $r['id_poli'];
    $dokter   = $r['id_dokter'];
    $ruangan   = $r['kode_ruangan'];
    $act            = "edit";
    ?>
    <!-- edit modal -->
    <!-- Modal -->
    <div class="modal fade" id="poli<?= $poli; ?>" tabindex="-1" role="dialog" aria-labelledby="poliLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="poliLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="modul/t_poli/proses_tpoli.php?act=<?= $act ?>" method="post">
                    <div class="modal-body">
                        <label for="id_poli">Poli</label>
                        <select name="id_poli" class="custom-select">
                            <option value="">---Pilih Poli---</option>
                            <?php
                                $id_poli = get_all('m_poli');
                                foreach ($id_poli as $ip) :
                                    if ($ip['id_poli'] == $poli) {
                                        echo "<option value='$ip[id_poli]' selected>$ip[nama_poli]</option>";
                                    } else {
                                        echo "<option value='$ip[id_poli]'>$ip[nama_poli]</option>";
                                    }

                                endforeach; ?> endforeach; ?>
                        </select>
                        <label for="id_dokter">Dokter</label>
                        <select name="id_dokter" class="custom-select">
                            <option value="">---Pilih Dokter---</option>
                            <?php
                                $id_dokter = get_all('m_dokter');
                                foreach ($id_dokter as $id) :
                                    if ($id['id_dokter'] == $dokter) {
                                        echo "<option value='$id[id_dokter]' selected>$id[nama]</option>";
                                    } else {
                                        echo "<option value='$id[id_dokter]'>$id[nama]</option>";
                                    }

                                endforeach; ?>
                        </select>
                        <label for="kode_ruangan">Ruangan</label>
                        <select name="kode_ruangan" class="custom-select">
                            <option value="">---Pilih Ruangan---</option>
                            <?php
                                $kode_ruangan = get_all('m_ruangan');
                                foreach ($kode_ruangan as $kode) :
                                    if ($kode['kode_ruangan'] == $ruangan) {
                                        echo "<option value='$kode[kode_ruangan]' selected>$kode[ruangan]</option>";
                                    } else {
                                        echo "<option value='$kode[kode_ruangan]'>$kode[ruangan]</option>";
                                    }

                                endforeach; ?>
                        </select>
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