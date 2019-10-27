<?php
if ($_REQUEST['act'] == 'edit') {
    $r = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM m_ruangan WHERE kode_ruangan = '$_REQUEST[id]'"));
    $kode_ruangan   = $r['kode_ruangan'];
    $kelas          = $r['kelas'];
    $ruangan        = $r['ruangan'];
    $harga          = $r['harga'];
    $act            = "edit";
} else {
    $kode_ruangan   = "";
    $kelas          = "";
    $ruangan        = "";
    $harga          = "";
    $act            = "save";
}
?>
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Ruangan</h6>
</div>
<div class='flash-data' data-flashdata='<?= $_SESSION['sweetalert']; ?>'></div>
<?php session_destroy(); ?>
<form action="modul/m_ruangan/proses_ruangan.php?act=<?= $act ?>" method="post">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="kelas">Kelas</label>
            <input type="text" autocomplete="off" name="kelas" value="<?= $kelas ?>" class="form-control" id="kelas" placeholder="kelas...">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="ruangan">Ruangan</label>
            <input type="text" autocomplete="off" name="ruangan" value="<?= $ruangan ?>" class="form-control" id="ruangan" placeholder="ruangan">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="harga">Harga</label>
            <input type="text" autocomplete="off" name="harga" value="<?= $harga ?>" class="form-control" id="harga" placeholder="harga">
        </div>
    </div>
    <hr>
    <input type="hidden" name="kode_ruangan" value="<?= $kode_ruangan; ?>">
    <button type="submit" class="btn btn-primary"><?= $act ?></button>
    <a href="page.php?page=view_ruangan" class="btn btn-danger">Batal</a>
</form>