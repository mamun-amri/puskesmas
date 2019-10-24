<?php
if ($_REQUEST['act'] == 'edit') {
    $r = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM m_kemasan WHERE id_kemasan = '$_REQUEST[id]'"));
    $id_kemasan     = $r['id_kemasan'];
    $nama_kemasan   = $r['nama_kemasan'];
    $act            = "edit";
} else {
    $id_kemasan     = "";
    $nama_kemasan   = "";
    $act            = "save";
}
?>
<form action="modul/m_kemasan/proses_kemasan.php?act=<?= $act ?>" method="post">
    <div class="row">
        <div class="form-group col-md-6 col-lg-12">
            <label for="nama_kemasan">Nama kemasan</label>
            <input type="text" name="nama_kemasan" id="nama_kemasan" class="form-control" value=" <?= $nama_kemasan; ?>">
        </div>
    </div>
    <hr>
    <input type="hidden" name="id_kemasan" value="<?= $id_kemasan ?>" class="form-control">
    <button type="submit" class="btn btn-primary"><?= $act ?></button>
    <a href="page.php?page=view_kemasan" class="btn btn-danger">Batal</a>
</form>