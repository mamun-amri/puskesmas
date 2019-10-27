<?php
include "../../config/koneksi.php";
Session_start();
if ($_REQUEST['act'] == "save") {

    $query  = mysqli_query($connect, "INSERT INTO m_pelayanan (kode_pelayanan, nama_pelayanan) VALUES (NULL,'$_POST[nama_pelayanan]')");
    // if (!$query) {
    //     printf("Error : %s\n", mysqli_error($connect));
    //     exit();
    // }
    if ($query) {
        $_SESSION['sweetalert'] = 'tambah';
        header('location:../../page.php?page=view_pelayanan');
    } else {
        $_SESSION['sweetalert'] = 'gagal_tambah';
        header('location:../../page.php?page=view_pelayanan');
    }
} else {
    $query = mysqli_query($connect, "UPDATE m_pelayanan SET `kode_pelayanan`      = '$_POST[kode_pelayanan]',
                                                         `nama_pelayanan`     = '$_POST[nama_pelayanan]'
                                                         WHERE `kode_pelayanan` = '$_POST[kode_pelayanan]'
                                                        ");
    if ($query) {

        $_SESSION['sweetalert'] = 'edit';
        header('location:../../page.php?page=view_pelayanan');
    } else {
        $_SESSION['sweetalert'] = 'gagal_edit';
        header('location:../../page.php?page=view_pelayanan');
    }
}
