<?php
session_start();
include "../../config/koneksi.php";

if ($_REQUEST['act'] == "save") {
    $cek    = mysqli_fetch_array(mysqli_query($connect, "SELECT right(kode_ruangan,4) as kode FROM m_ruangan ORDER BY kode_ruangan DESC"));
    // if (!$cek) {
    //     printf("Error : %s\n", mysqli_error($connect));
    //     exit();
    // }
    $no_urut = $cek['kode'] + 1;
    $kode   = str_pad($no_urut, 4, "0", STR_PAD_LEFT);
    $kode_ruangan = "R" . date("ym") . $kode;

    $query  = mysqli_query($connect, "INSERT INTO m_ruangan (kode_ruangan, kelas, ruangan, harga) VALUES ('$kode_ruangan','$_POST[kelas]','$_POST[ruangan]','$_POST[harga]')");
    // if (!$query) {
    //     printf("Error : %s\n", mysqli_error($connect));
    //     exit();
    // }
    if ($query) {
        $_SESSION['sweetalert'] = 'tambah';
        header('location:../../page.php?page=view_ruangan');
    } else {
        $_SESSION['sweetalert'] = 'gagal_tambah';
        header('location:../../page.php?page=form_ruangan&act=save');
    }
} else {
    $query = mysqli_query($connect, "UPDATE m_ruangan SET `kode_ruangan`  = '$_POST[kode_ruangan]',
                                                         `kelas`          = '$_POST[kelas]',
                                                         `ruangan`        = '$_POST[ruangan]',
                                                         `harga`          = '$_POST[harga]'
                                                         WHERE `kode_ruangan` = '$_POST[kode_ruangan]'
                                                        ");
    if ($query) {
        $_SESSION['sweetalert'] = 'edit';
        header('location:../../page.php?page=view_ruangan');
    } else {
        $_SESSION['sweetalert'] = 'gagal_edit';
        header('location:../../page.php?page=form_ruangan&act=edit&id=' . $_POST['kode_ruangan']);
    }
}
