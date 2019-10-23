<?php
include "../../config/koneksi.php";

if ($_REQUEST['act'] == "save") {
    $cek    = mysqli_fetch_array(mysqli_query($connect, "SELECT right(id_dokter,4) as kode FROM m_dokter ORDER BY id_dokter DESC"));
    $no_urut = $cek['kode'] + 1;
    $kode   = str_pad($no_urut, 4, "0", STR_PAD_LEFT);
    $id_dokter = "D" . date("ym") . $kode;

    $query  = mysqli_query($connect, "INSERT INTO m_dokter (id_dokter, nip, nama, alamat, tmp_lahir, tgl_lahir, jenis_kelamin, no_telp) VALUES ('$id_dokter','$_POST[nip]','$_POST[nama]','$_POST[alamat]','$_POST[tmp_lahir]','$_POST[tgl_lahir]','$_POST[jenis_kelamin]','$_POST[no_telp]')");

    if ($query) {
        echo "<script> alert('Data berhasil disimpan!'); document.location='../../page.php?page=view_dokter'; </script>";
    } else {
        echo "<scipt> alert('Data gagal disimpan'); document.location='../../page.php?page=form_dokter&act=save';</script>";
    }
} else {
    $query = mysqli_query($connect, "UPDATE m_dokter SET `id_dokter`       = '$_POST[id_dokter]',
                                                         `nip`             = '$_POST[nip]',
                                                         `nama`            = '$_POST[nama]',
                                                         `alamat`          = '$_POST[alamat]',
                                                         `tmp_lahir`       = '$_POST[tmp_lahir]',
                                                         `tgl_lahir`       = '$_POST[tgl_lahir]',
                                                         `jenis_kelamin`   = '$_POST[jenis_kelamin]',
                                                         `no_telp`         = '$_POST[no_telp]'
                                                         WHERE `id_dokter` = '$_POST[id_dokter]'
                                                        ");
    if ($query) {
        echo "<script> alert('Data berhasil diedit!'); document.location='../../page.php?page=view_dokter'; </script>";
    } else {
        echo "<scipt> alert('Data gagal diedit'); document.location='../../page.php?page=form_dokter&act=edit&id=$_POST[id_dokter]';</script>";
    }
}
