<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "proyek_penilaian";

$koneksi = mysqli_connect($host, $username, $password, $database);

if($koneksi) {
    //memilih database
    $pilih_db = mysqli_select_db($koneksi, $database);
    if($pilih_db){
        //echo "Database terpilih";
    }
} else {
    echo "koneksi gagal, periksa lagi" . mysqli_error();
}
?>