<?php
include "../../config/koneksi.php";

if ($_REQUEST['act'] == "save") {
    $cek    = mysqli_fetch_array(mysqli_query($connect, "SELECT right(id_pasien,4) as kode FROM m_pasien ORDER BY id_pasien DESC"));
    if (!$cek) {
        printf("Error: %s\n", mysqli_error($connect));
        // exit();
    }
    $no_urut = $cek['kode'] + 1;
    $kode   = str_pad($no_urut, 4, "0", STR_PAD_LEFT);
    $id_pasien = "P" . date("ym") . $kode;


    $query  = mysqli_query($connect, "INSERT INTO m_pasien (id_pasien, nama, alamat, tmp_lahir, tgl_lahir, jenis_kelamin, no_telp) VALUES ('$id_pasien','$_POST[nama]','$_POST[alamat]','$_POST[tmp_lahir]','$_POST[tgl_lahir]','$_POST[jenis_kelamin]','$_POST[no_telp]')");

    if ($query) {
        echo "<script> alert('Data berhasil disimpan!'); document.location='../../page.php?page=view_pasien'; </script>";
    } else {
        echo "<scipt> alert('Data gagal disimpan'); document.location='../../page.php?page=form_pasien&act=save';</script>";
    }
} else {
    $query = mysqli_query($connect, "UPDATE m_pasien SET `id_pasien`       = '$_POST[id_pasien]',
                                                         `nama`            = '$_POST[nama]',
                                                         `alamat`          = '$_POST[alamat]',
                                                         `tmp_lahir`       = '$_POST[tmp_lahir]',
                                                         `tgl_lahir`       = '$_POST[tgl_lahir]',
                                                         `jenis_kelamin`   = '$_POST[jenis_kelamin]',
                                                         `no_telp`         = '$_POST[no_telp]'
                                                         WHERE `id_pasien` = '$_POST[id_pasien]'
                                                        ");
    if ($query) {
        echo "<script> alert('Data berhasil diedit!'); document.location='../../page.php?page=view_pasien'; </script>";
    } else {
        echo "<scipt> alert('Data gagal diedit'); document.location='../../page.php?page=form_pasien&act=edit&id=$_POST[id_pasien]';</script>";
    }
}
