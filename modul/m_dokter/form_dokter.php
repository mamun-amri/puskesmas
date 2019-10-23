<?php
if ($_REQUEST['act'] == 'edit') {
    $r = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM m_dokter WHERE id_dokter = '$_REQUEST[id]'"));
    $id_dokter      = $r['id_dokter'];
    $nip            = $r['nip'];
    $nama           = $r['nama'];
    $alamat         = $r['alamat'];
    $tmp_lahir      = $r['tmp_lahir'];
    $tgl_lahir      = $r['tgl_lahir'];
    $jenis_kelamin  = $r['jenis_kelamin'];
    $no_telp        = $r['no_telp'];
    $act            = "edit";
} else {
    $id_dokter      = "";
    $nip            = "";
    $nama           = "";
    $alamat         = "";
    $tmp_lahir      = "";
    $tgl_lahir      = "";
    $jenis_kelamin  = "";
    $no_telp        = "";
    $act            = "save";
}
?>
<form action="modul/m_dokter/proses_dokter.php?act=<?= $act ?>" method="post">
    <div class="form-group">
        <label for="formGroupExampleInput">NIP</label>
        <input type="text" name="nip" value="<?= $nip ?>" class="form-control" id="formGroupExampleInput" placeholder="nip...">
        <input type="hidden" name="id_dokter" value="<?= $id_dokter ?>" class="form-control" id="formGroupExampleInput">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Nama Dokter</label>
        <input type="text" name="nama" value="<?= $nama ?>" class="form-control" id="formGroupExampleInput2" placeholder="nama...">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Alamat</label>
        <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"><?= $alamat ?></textarea>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Tmp Lahir</label>
        <input type="text" name="tmp_lahir" value="<?= $tmp_lahir ?>" class="form-control" id="formGroupExampleInput2" placeholder="tempat lahir...">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Tgl Lahir</label>
        <input type="text" name="tgl_lahir" value="<?= $tgl_lahir ?>" class="form-control" id="formGroupExampleInput2" placeholder="tanggal lahir...">
    </div>
    <div class="form-group">
        <label for="inputState">Jenis Kelamin</label>
        <select id="inputState" class="form-control" name="jenis_kelamin">
            <option value="l" <?php if ($jenis_kelamin == "l") {
                                    echo "selected";
                                } ?>>Laki-Laki</option>
            <option value="p" <?php if ($jenis_kelamin == "p") {
                                    echo "selected";
                                } ?>>Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">No Telp</label>
        <input type="text" name="no_telp" value="<?= $no_telp ?>" class="form-control" id="formGroupExampleInput2" placeholder="no telp...">
    </div>
    <hr>
    <button type="submit" class="btn btn-primary"><?= $act ?></button>
    <button class="btn btn-danger">Batal</button>
</form>