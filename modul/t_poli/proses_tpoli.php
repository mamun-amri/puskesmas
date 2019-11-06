<?php
Session_start();
include "../../config/koneksi.php";

if ($_REQUEST['act'] == "save") {

    $query  = mysqli_query($connect, "INSERT INTO t_poli (id_poli, id_dokter,kode_ruangan) VALUES ('$_POST[id_poli]','$_POST[id_dokter]','$_POST[kode_ruangan]')");
    // if (!$query) {
    //     printf("Error : %s\n", mysqli_error($connect));
    //     exit();
    // }
    if ($query) {
        $_SESSION['sweetalert'] = 'tambah';
        header('location:../../page.php?page=view_tpoli');
    } else {
        $_SESSION['sweetalert'] = 'gagal_tambah';
        header('location:../../page.php?page=view_tpoli');
    }
} else {
    $query = mysqli_query($connect, "UPDATE t_poli SET `id_poli`      = '$_POST[id_poli]',
                                                         `id_dokter`  = '$_POST[id_dokter]',
                                                         `kode_ruangan`    = '$_POST[kode_ruangan]'
                                                         WHERE `id_poli` = '$_POST[id_poli]'
                                                        ");
    if ($query) {

        $_SESSION['sweetalert'] = 'edit';
        header('location:../../page.php?page=view_tpoli');
    } else {
        $_SESSION['sweetalert'] = 'gagal_edit';
        header('location:../../page.php?page=view_tpoli');
    }
}
