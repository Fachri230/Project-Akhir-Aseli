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
    <link rel="stylesheet" href="./style/style.css">
    <script src="./script/sript.js"></script>
</head>
<body>
    <?php include "navigasi.php"; ?>
    <div id="main">
        <div class="container">
        <h2> APLIKASI MANAGEMEN SISWA</h2>
        <hr>
        <p>Selamat datang di aplikasi data siswa SMK PGRI 3 MALANG</p>
        <?php
        date_default_timezone_set("asia/jakarta");
        $jam = date("H");

        if($jam >= 3 && $jam < 9) {
            $sapa = "Selamat Pagi";
        } else if($jam >= 9 && $jam < 14) {
            $sapa = "Selamat Siang";
        } else if($jam >=14 && $jam < 19){
            $sapa = "Selamat Sore";
        }else { 
            $sapa = "Selamat Malam";
        }
        
        ?>
        <div class="sapa">

            <?php echo date('l,d,m,y'); ?><br>
            <?php echo $sapa; ?>

        </div>

</div>
</body>
</html>