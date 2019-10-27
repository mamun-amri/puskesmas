<?php

if ($_REQUEST['act'] == 'edit') {
    $r = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM m_obat WHERE kode_obat = '$_REQUEST[id]'"));
    $kode_obat  = $r['kode_obat'];
    $nama_obat  = $r['nama_obat'];
    $satuan     = $r['satuan'];
    $kemasan    = $r['kemasan'];
    $stock      = $r['stock'];
    $harga      = $r['harga'];
    $act        = "edit";
} else {
    $kode_obat  = "";
    $nama_obat  = "";
    $satuan     = "";
    $kemasan    = "";
    $stock      = "";
    $harga      = "";
    $act        = "save";
}
?>
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form obat</h6>
</div>
<div class='flash-data' data-flashdata='<?= $_SESSION['sweetalert']; ?>'></div>
<?php session_destroy(); ?>
<form action="modul/m_obat/proses_obat.php?act=<?= $act ?>" method="post">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="formGroupExampleInput">nama obat</label>
            <input type="text" autocomplete="off" name="nama_obat" value="<?= $nama_obat ?>" class="form-control" id="formGroupExampleInput" placeholder="nama obat">
            <input type="hidden" name="kode_obat" value="<?= $kode_obat ?>" class="form-control" id="formGroupExampleInput">
        </div>
        <div class="form-group col-md-6">
            <label for="formGroupExampleInput2">satuan obat</label>
            <input type="text" autocomplete="off" name="satuan" value="<?= $satuan ?>" class="form-control" id="formGroupExampleInput2" placeholder="satuan...">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="formGroupExampleInput2">Stock</label>
            <input type="text" autocomplete="off" name="stock" value="<?= $stock ?>" class="form-control" id="formGroupExampleInput2" placeholder="stock">
        </div>
        <div class="form-group col-md-6">
            <label for="formGroupExampleInput2">Harga</label>
            <input type="text" autocomplete="off" name="harga" value="<?= $harga ?>" class="form-control" id="formGroupExampleInput2" placeholder="contoh : 1000">
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="exampleFormControlTextarea1">kemasan</label>
        <input class="form-control" name="kemasan" id="exampleFormControlTextarea1" value="<?= $kemasan ?>">
    </div>
    <hr>
    <button type="submit" class="btn btn-primary"><?= $act ?></button>
    <a href="page.php?page=view_obat" class="btn btn-danger">Batal</a>
</form>