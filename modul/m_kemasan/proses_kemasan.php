<?php
include "../../config/koneksi.php";

if ($_REQUEST['act'] == "save") {

    $query  = mysqli_query($connect, "INSERT INTO m_kemasan (id_kemasan, nama_kemasan) VALUES (NULL,'$_POST[nama_kemasan]')");
    // if (!$query) {
    //     printf("Error : %s\n", mysqli_error($connect));
    //     exit();
    // }
    if ($query) {
        echo "<script> alert('Data berhasil disimpan!'); document.location='../../page.php?page=view_kemasan'; </script>";
    } else {
        echo "<script> alert('Data gagal disimpan'); document.location='../../page.php?page=form_kemasan&act=save';</script>";
    }
} else {
    $query = mysqli_query($connect, "UPDATE m_kemasan SET `id_kemasan`      = '$_POST[id_kemasan]',
                                                         `nama_kemasan`     = '$_POST[nama_kemasan]'
                                                         WHERE `id_kemasan` = '$_POST[id_kemasan]'
                                                        ");
    if ($query) {
        echo "<script> alert('Data berhasil diedit!'); document.location='../../page.php?page=view_kemasan'; </script>";
    } else {
        echo "<scipt> alert('Data gagal diedit'); document.location='../../page.php?page=form_kemasan&act=edit&id=$_POST[id_kemasan]';</script>";
    }
}
