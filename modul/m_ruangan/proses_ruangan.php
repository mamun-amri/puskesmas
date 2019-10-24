<?php
include "../../config/koneksi.php";

if ($_REQUEST['act'] == "save") {
    $cek    = mysqli_fetch_array(mysqli_query($connect, "SELECT right(kode_ruangan,4) as kode FROM m_ruangan ORDER BY kode_ruangan DESC"));
    if (!$cek) {
        printf("Error: %s\n", mysqli_error($connect));
        // exit();
    }
    $no_urut = $cek['kode'] + 1;
    $kode   = str_pad($no_urut, 4, "0", STR_PAD_LEFT);
    $kode_ruangan = "R" . date("ym") . $kode;

    $query  = mysqli_query($connect, "INSERT INTO m_ruangan (kode_ruangan, kelas, ruangan, harga) VALUES ('$kode_ruangan','$_POST[kelas]','$_POST[ruangan]','$_POST[harga]'");
    // if (!$query) {
    //     printf("Error: %s\n", mysqli_error($connect));
    //     // exit();
    // }
    if ($query) {
        echo "<script> alert('Data berhasil disimpan!'); document.location='../../page.php?page=view_ruangan'; </script>";
    } else {
        echo "<scipt> alert('Data gagal disimpan'); document.location='../../page.php?page=form_ruangan&act=save';</script>";
    }
} else {
    $query = mysqli_query($connect, "UPDATE m_ruangan SET `kode_ruangan`  = '$_POST[kode_ruangan]',
                                                         `kelas`          = '$_POST[kelas]',
                                                         `ruangan`        = '$_POST[ruangan]',
                                                         `harga`          = '$_POST[harga]'
                                                         WHERE `kode_ruangan` = '$_POST[kode_ruangan]'
                                                        ");
    if ($query) {
        echo "<script> alert('Data berhasil diedit!'); document.location='../../page.php?page=view_ruangan'; </script>";
    } else {
        echo "<scipt> alert('Data gagal diedit'); document.location='../../page.php?page=form_ruangan&act=edit&id=$_POST[kode_ruangan]';</script>";
    }
}
