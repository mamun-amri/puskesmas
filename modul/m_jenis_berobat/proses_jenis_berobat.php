<?php
session_start();
include "../../config/koneksi.php";

if ($_REQUEST['act'] == "save") {

    $query  = mysqli_query($connect, "INSERT INTO m_jenis_berobat (kode_jenis, nama_jenis) VALUES (NULL,'$_POST[nama_jenis]')");
    // if (!$query) {
    //     printf("Error : %s\n", mysqli_error($connect));
    //     exit();
    // }
    if ($query) {
        $_SESSION['sweetalert'] = 'tambah';
        header('location:../../page.php?page=view_jenis_berobat');
    } else {
        $_SESSION['sweetalert'] = 'gagal_tambah';
        header('location:../../page.php?page=view_jenis_berobat');
    }
} else {
    $query = mysqli_query($connect, "UPDATE m_jenis_berobat SET `kode_jenis`  = '$_POST[kode_jenis]',
                                                         `nama_jenis`         = '$_POST[nama_jenis]'
                                                         WHERE `kode_jenis`   = '$_POST[kode_jenis]'
                                                        ");
    if ($query) {
        $_SESSION['sweetalert'] = 'edit';
        header('location:../../page.php?page=view_jenis_berobat');
    } else {
        $_SESSION['sweetalert'] = 'gagal_edit';
        header('location:../../page.php?page=view_jenis_berobat');
    }
}
