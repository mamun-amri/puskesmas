<?php
include "../../config/koneksi.php";

if ($_REQUEST['act'] == "save") {

    $query  = mysqli_query($connect, "INSERT INTO m_diagnosa (kode_diagnosa, diagnosa) VALUES (NULL,'$_POST[diagnosa]')");
    // if (!$query) {
    //     printf("Error : %s\n", mysqli_error($connect));
    //     exit();
    // }
    if ($query) {
        echo "<script> alert('Data berhasil disimpan!'); document.location='../../page.php?page=view_diagnosa'; </script>";
    } else {
        echo "<script> alert('Data gagal disimpan'); document.location='../../page.php?page=form_diagnosa&act=save';</script>";
    }
} else {
    $query = mysqli_query($connect, "UPDATE m_diagnosa SET `kode_diagnosa`  = '$_POST[kode_diagnosa]',
                                                         `diagnosa`        = '$_POST[diagnosa]'
                                                         WHERE `kode_diagnosa` = '$_POST[kode_diagnosa]'
                                                        ");
    if ($query) {
        echo "<script> alert('Data berhasil diedit!'); document.location='../../page.php?page=view_diagnosa'; </script>";
    } else {
        echo "<scipt> alert('Data gagal diedit'); document.location='../../page.php?page=form_diagnosa&act=edit&id=$_POST[kode_diagnosa]';</script>";
    }
}
