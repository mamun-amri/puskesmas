<?php
session_start();
include "../../config/koneksi.php";

if ($_REQUEST['act'] == "save") {

    $query  = mysqli_query($connect, "INSERT INTO m_diagnosa (kode_diagnosa, diagnosa) VALUES (NULL,'$_POST[diagnosa]')");
    // if (!$query) {
    //     printf("Error : %s\n", mysqli_error($connect));
    //     exit();
    // }
    if ($query) {
        $_SESSION['sweetalert'] = 'tambah';
        header('location:../../page.php?page=view_diagnosa');
    } else {
        $_SESSION['sweetalert'] = 'gagal_tambah';
        header('location:../../page.php?page=view_diagnosa');
    }
} else {
    $query = mysqli_query($connect, "UPDATE m_diagnosa SET `kode_diagnosa`  = '$_POST[kode_diagnosa]',
                                                         `diagnosa`        = '$_POST[diagnosa]'
                                                         WHERE `kode_diagnosa` = '$_POST[kode_diagnosa]'
                                                        ");
    if ($query) {
        $_SESSION['sweetalert'] = 'edit';
        header('location:../../page.php?page=view_diagnosa');
    } else {
        $_SESSION['sweetalert'] = 'gagal_edit';
        header('location:../../page.php?page=view_diagnosa');
    }
}
