<?php
session_start();
header("Cache-Control: no_store, no-cache, musk-revalidate, max-age=0");
if(!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location: index.php?p=Silahkan login terlebih dahulu!");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HOME WEB</title>
    <link rel="stylesheet" href="style.css">
    <script src="sript.js"></script>
</head>
<body>
    <?php include "navigasi.php"; ?>
    <div id="main">
        <div class="container">
        <h2> APLIKASI MANAGEMEN SISWA</h2>
        <hr>
        <p>Selamat datang di aplikasi data siswa SMK PGRI 3 MALANG</p>
</div>
</body>
</html>