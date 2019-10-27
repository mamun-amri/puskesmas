<?php
include "../../config/koneksi.php";
Session_start();
if ($_REQUEST['act'] == "save") {
    $query  = mysqli_query($connect, "INSERT INTO m_satuan (id_satuan, nama_satuan) VALUES (NULL,'$_POST[nama_satuan]')");
    // if (!$query) {
    //     printf("Error : %s\n", mysqli_error($connect));
    //     exit();
    // }
    if ($query) {
        $_SESSION['sweetalert'] = 'tambah';
        header('location:../../page.php?page=view_satuan');
    } else {
        $_SESSION['sweetalert'] = 'gagal_tambah';
        header('location:../../page.php?page=view_satuan');
    }
} else {
    $query = mysqli_query($connect, "UPDATE m_satuan SET `id_satuan`      = '$_POST[id_satuan]',
                                                         `nama_satuan`     = '$_POST[nama_satuan]'
                                                         WHERE `id_satuan` = '$_POST[id_satuan]'
                                                        ");
    if ($query) {

        $_SESSION['sweetalert'] = 'edit';
        header('location:../../page.php?page=view_satuan');
    } else {
        $_SESSION['sweetalert'] = 'gagal_edit';
        header('location:../../page.php?page=view_satuan');
    }
}
