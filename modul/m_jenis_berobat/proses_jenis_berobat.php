<?php
include "../../config/koneksi.php";

if ($_REQUEST['act'] == "save") {

    $query  = mysqli_query($connect, "INSERT INTO m_jenis_berobat (kode_jenis, nama_jenis) VALUES (NULL,'$_POST[nama_jenis]')");
    if (!$query) {
        printf("Error : %s\n", mysqli_error($connect));
        exit();
    }
    if ($query) {
        echo "<script> alert('Data berhasil disimpan!'); document.location='../../page.php?page=view_jenis_berobat'; </script>";
    } else {
        echo "<script> alert('Data gagal disimpan'); document.location='../../page.php?page=form_jenis_berobat&act=save';</script>";
    }
} else {
    $query = mysqli_query($connect, "UPDATE m_jenis_berobat SET `kode_jenis`  = '$_POST[kode_jenis]',
                                                         `nama_jenis`         = '$_POST[nama_jenis]'
                                                         WHERE `kode_jenis`   = '$_POST[kode_jenis]'
                                                        ");
    if ($query) {
        echo "<script> alert('Data berhasil diedit!'); document.location='../../page.php?page=view_jenis_berobat'; </script>";
    } else {
        echo "<scipt> alert('Data gagal diedit'); document.location='../../page.php?page=form_jenis_berobat&act=edit&id=$_POST[kode_jenis_berobat]';</script>";
    }
}
