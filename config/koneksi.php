<?php
$database = "sim_puskesmas";
$hostname = "localhost";
$password = "";
$username = "root";

$connect = mysqli_connect($hostname,$username,$password,$database);
if($connect){
    // echo "berhasil koneksi database";
}else{
    echo "gagal koneksi database : " . mysqli_connect_error();   
}