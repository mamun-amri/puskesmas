<?php
session_start();
include "../../config/koneksi.php";

if ($_REQUEST['act'] == "save") {
    $cek    = mysqli_fetch_array(mysqli_query($connect, "SELECT right(kode_obat,4) as kode FROM m_obat ORDER BY kode_obat DESC"));
    $no_urut = $cek['kode'] + 1;
    $kode   = str_pad($no_urut, 4, "0", STR_PAD_LEFT);
    $kode_obat = "D" . date("ym") . $kode;

    $query  = mysqli_query($connect, "INSERT INTO m_obat (kode_obat, satuan, nama_obat, kemasan, stock, harga) VALUES ('$kode_obat','$_POST[satuan]','$_POST[nama_obat]','$_POST[kemasan]','$_POST[stock]','$_POST[harga]')");

    if ($query) {
        $_SESSION['sweetalert'] = 'tambah';
        header('location:../../page.php?page=view_obat');
    } else {
        $_SESSION['sweetalert'] = 'gagal_tambah';
        header('location:../../page.php?page=form_obat&act=save');
    }
} else {
    $query = mysqli_query($connect, "UPDATE m_obat SET `kode_obat`     = '$_POST[kode_obat]',
                                                         `satuan`      = '$_POST[satuan]',
                                                         `nama_obat`   = '$_POST[nama_obat]',
                                                         `kemasan`     = '$_POST[kemasan]',
                                                         `stock`       = '$_POST[stock]',
                                                         `harga`       = '$_POST[harga]'
                                                         WHERE `kode_obat` = '$_POST[kode_obat]'
                                                        ");
    if ($query) {
        $_SESSION['sweetalert'] = 'edit';
        header('location:../../page.php?page=view_obat');
    } else {
        $_SESSION['sweetalert'] = 'gagal_edit';
        header('location:../../page.php?page=form_obat&act=edit&id=' . $_POST['kode_obat']);
    }
}
