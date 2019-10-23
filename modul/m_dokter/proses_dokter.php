<?php 
    include "../../config/koneksi.php";

    if($_REQUEST['act'] == "save"){
        $cek    = mysqli_fetch_array(mysqli_query($connect,"SELECT right(id_dokter,4) as kode FROM m_dokter ORDER BY id_dokter DESC"));
        $no_urut= $cek['kode'] +1;
        $kode   = str_pad($no_urut,4,"0",STR_PAD_LEFT);
        $id_dokter = "D".date("ym").$kode; 

        $query  = mysqli_query($connect,"INSERT INTO m_dokter (id_dokter, nip, nama, alamat, tmp_lahir, tgl_lahir, jenis_kelamin, no_telp) VALUES ('$id_dokter','$_POST[nip]','$_POST[nama]','$_POST[alamat]','$_POST[tmp_lahir]','$_POST[tgl_lahir]','$_POST[jenis_kelamin]','$_POST[no_telp]')");
    }
?>