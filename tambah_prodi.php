<?php
session_start();
include "koneksi.php";
$error = "";

//proses simpan
if (isset($_POST['simpan'])) {
    $kd_prodi = $_POST['kd_prodi'];
    $nama_prodi = $_POST['nama_prodi'];
    //cek apakah kode sudah ada
    $cek = mysqli_query($koneksi, "SELECT * FROM prodi WHERE kd_prodi='$kd_prodi'");
    if(mysqli_num_rows($cek) > 0) {
        echo $error = "Kode Prodi sudah digunakan";
    } else {
        mysqli_query($koneksi, "INSERT INTO prodi VALUES(NULL,
        '$kd_prodi','$nama_prodi')");
        $_SESSION['status'] = "berhasil!!";
        header("location: prodi.php");
        exit();
    }
}
?>

<link rel="stylesheet" href="./style/style.css">
<form class="container" method="POST">
    <label>Kode Prodi</label>
    <input type="text" name="kd_prodi" required><br><br>
    <label>Nama Prodi</label>
    <input type="text" name="nama_prodi" required><br><br>
    <button type="submit" name="simpan" class="submit">SIMPAN</button><br><br>
    <a href="prodi.php" class="batal" style="color: white;">BATAL</a>
</form>