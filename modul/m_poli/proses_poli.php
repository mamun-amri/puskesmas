<?php
include "../../config/koneksi.php";
Session_start();
if ($_REQUEST['act'] == "save") {
    $cek    = mysqli_fetch_array(mysqli_query($connect, "SELECT right(id_poli,4) as kode FROM m_poli ORDER BY id_poli DESC"));
    $no_urut = $cek['kode'] + 1;
    $kode   = str_pad($no_urut, 4, "0", STR_PAD_LEFT);
    $id_poli = "PL" . date("ym") . $kode;

    $query  = mysqli_query($connect, "INSERT INTO m_poli (id_poli, nama_poli) VALUES ('$id_poli','$_POST[nama_poli]')");
    // if (!$query) {
    //     printf("Error : %s\n", mysqli_error($connect));
    //     exit();
    // }
    if ($query) {
        $_SESSION['sweetalert'] = 'tambah';
        header('location:../../page.php?page=view_poli');
    } else {
        $_SESSION['sweetalert'] = 'gagal_tambah';
        header('location:../../page.php?page=view_poli');
    }
} else {
    $query = mysqli_query($connect, "UPDATE m_poli SET `id_poli`      = '$_POST[id_poli]',
                                                         `nama_poli`     = '$_POST[nama_poli]'
                                                         WHERE `id_poli` = '$_POST[id_poli]'
                                                        ");
    if ($query) {

        $_SESSION['sweetalert'] = 'edit';
        header('location:../../page.php?page=view_poli');
    } else {
        $_SESSION['sweetalert'] = 'gagal_edit';
        header('location:../../page.php?page=view_poli');
    }
}
