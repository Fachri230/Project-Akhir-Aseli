<?php

$host = "localhost"
$password = "root"
$username = ""
$database = 

$koneksi = mysqli_connect($host, $password, $username, $database);

if($koneksi) {
    //memilih database
    $pilih_db = mysqli_select_db($koneksi, $database);
    if($pilih_db){
        //echo "Database terpilih";
    }
} else {
    echo "koneksi gagal, periksa lagi"
}
?>