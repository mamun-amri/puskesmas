<?php
if ($_REQUEST['act'] == 'edit') {
    $r = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM m_diagnosa WHERE kode_diagnosa = '$_REQUEST[id]'"));
    $kode_diagnosa   = $r['kode_diagnosa'];
    $diagnosa        = $r['diagnosa'];
    $act            = "edit";
} else {
    $kode_diagnosa   = "";
    $diagnosa        = "";
    $act            = "save";
}
?>
<form action="modul/m_diagnosa/proses_diagnosa.php?act=<?= $act ?>" method="post">
    <div class="row">
        <div class="form-group col-md-6 col-lg-12">
            <label for="diagnosa">Diagnosa</label>
            <textarea name="diagnosa" id="diagnosa" class="form-control" cols="15" rows="8"> <?= $diagnosa; ?></textarea>
        </div>
    </div>
    <hr>
    <input type="hidden" name="kode_diagnosa" value="<?= $kode_diagnosa ?>" class="form-control">
    <button type="submit" class="btn btn-primary"><?= $act ?></button>
    <a href="page.php?page=view_diagnosa" class="btn btn-danger">Batal</a>
</form>