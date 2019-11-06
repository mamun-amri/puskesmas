<?php

if ($_REQUEST['act'] == 'edit') {
    $r = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM t_pendaftaran WHERE no_pendaftaran = '$_REQUEST[id]'"));
    $no_pendaftaran      = $r['no_pendaftaran'];
    $id_pasien            = $r['id_pasien'];
    $id_poli           = $r['id_poli'];
    $pelayanan         = $r['pelayanan'];
    $id_dokter      = $r['id_dokter'];
    $tgl_daftar      = $r['tgl_daftar'];
    $jenis_berobat  = $r['jenis_berobat'];
    $no_antrian        = $r['no_antrian'];
    $id_petugas     = $r['id_petugas'];
    $act            = "edit";
} else {
    $no_pendaftaran      = "";
    $id_pasien            = "";
    $id_poli           = "";
    $pelayanan         = "";
    $id_dokter      = "";
    $tgl_daftar      = "";
    $jenis_berobat  = "";
    $no_antrian        = "";
    $id_petugas     = "";
    $act            = "save";
}
?>
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
</div>
<div class='flash-data' data-flashdata='<?= $_SESSION['sweetalert']; ?>'></div>
<?php session_destroy(); ?>
<form action="modul/t_pendaftaran/proses_pendafatran.php?act=<?= $act ?>" method="post">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="formGroupExampleInput">Id Pasien</label>
            <input type="text" autocomplete="off" name="id_pasien" value="<?= $id_pasien ?>" class="form-control" id="formGroupExampleInput" placeholder="id_pasien...">
            <input type="hidden" name="no_pendaftaran" value="<?= $no_pendaftaran ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="formGroupExampleInput2">Id Poli</label>
            <select id="inputState" class="form-control" name="id_poli">
                <?php
                $m_poli = get_all('m_poli');
                foreach ($m_poli as $poli) :
                    ?>
                    <option value="<?= $poli['id_poli']; ?> " <?php if ($id_poli == $poli['id_poli']) {
                                                                        echo "selected";
                                                                    } ?>><?= $poli['nama_poli']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="formGroupExampleInput2">No Antrian</label>
            <input type="text" autocomplete="off" name="no_antrian" value="<?= $no_antrian ?>" class="form-control" id="formGroupExampleInput2" placeholder="no antrian">
        </div>
        <div class="form-group col-md-6">
            <label for="formGroupExampleInput2">Dokter</label>
            <select id="inputState" class="form-control" name="id_dokter">
                <?php
                $m_dokter = get_all('m_dokter');
                foreach ($m_dokter as $dokter) :
                    ?>
                    <option value="<?= $dokter['id_dokter']; ?> " <?php if ($id_dokter == $dokter['id_dokter']) {
                                                                            echo "selected";
                                                                        } ?>><?= $dokter['nama']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="tgl_daftar">Tgl Daftar</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                </div>
                <input name="tgl_daftar" value="<?= $tgl_daftar ?>" class="form-control datepicker" autocomplete="off">
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="inputState">Jenis Berobat</label>
            <select id="inputState" class="form-control" name="jenis_berobat">
                <?php
                $m_jenis_berobat = get_all('m_jenis_berobat');
                foreach ($m_jenis_berobat as $jenis) :
                    ?>
                    <option value="<?= $jenis['kode_jenis']; ?> " <?php if ($jenis_berobat == $jenis['kode_jenis']) {
                                                                            echo "selected";
                                                                        } ?>><?= $jenis['nama_jenis']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="exampleFormControlTextarea1">pelayanan</label>
            <select id="inputState" class="form-control" name="pelayanan">
                <?php
                $m_pelayanan = get_all('m_pelayanan');
                foreach ($m_pelayanan as $mpelayanan) :
                    ?>
                    <option value="<?= $mpelayanan['kode_pelayanan']; ?> " <?php if ($pelayanan == $mpelayanan['kode_pelayanan']) {
                                                                                    echo "selected";
                                                                                } ?>><?= $mpelayanan['nama_pelayanan']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="exampleFormControlTextarea1">Petugas</label>
            <select id="inputState" class="form-control" name="id_petugas">
                <?php
                $m_petugas = get_all('m_petugas');
                foreach ($m_petugas as $mpetugas) :
                    ?>
                    <option value="<?= $mpetugas['id_petugas']; ?> " <?php if ($id_petugas == $mpetugas['id_petugas']) {
                                                                                echo "selected";
                                                                            } ?>><?= $mpetugas['nama']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary"><?= $act ?></button>
    <a href="page.php?page=view_pendaftaran" class="btn btn-danger">Batal</a>
</form>