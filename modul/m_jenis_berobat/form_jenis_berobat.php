<?php
if ($_REQUEST['act'] == 'edit') {
    $r = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM m_jenis_berobat WHERE kode_jenis = '$_REQUEST[id]'"));
    $kode_jenis = $r['kode_jenis'];
    $nama_jenis = $r['nama_jenis'];
    $act        = "edit";
} else {
    $kode_jenis = "";
    $nama_jenis = "";
    $act        = "save";
}
?>
<form action="modul/m_jenis_berobat/proses_jenis_berobat.php?act=<?= $act ?>" method="post">
    <div class="row">
        <div class="form-group col-md-6 col-lg-12">
            <label for="nama_jenis">Nama Jenis Berobat</label>
            <input type="text" name="nama_jenis" id="nama_jenis" class="form-control" value=" <?= $nama_jenis; ?>">
        </div>
    </div>
    <hr>
    <input type="hidden" name="kode_jenis" value="<?= $kode_jenis ?>" class="form-control">
    <button type="submit" class="btn btn-primary"><?= $act ?></button>
    <a href="page.php?page=view_jenis_berobat" class="btn btn-danger">Batal</a>
</form>