<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location: index.php?p=Silahkan login terlebih dahulu!");
    exit();
}
include "koneksi.php";

//ambil data siswa + prodi (JOIN)
$filter = "";
if(isset($_GET['cari'])) {
                    $filter = $_GET['cari'];
                    $data = mysqli_query($koneksi, "SELECT s.*, p.nama_prodi FROM siswa s JOIN prodi p ON s.kd_prodi = p.kd_prodi WHERE s.nama LIKE %$filter% OR s.nis LIKE %$filter% ORDER BY ASC");
                    }else {
                        $data = mysqli_query($koneksi, "SELECT s.*, p.nama_prodi FROM siswa s JOIN prodi p ON s.kd_prodi = p.kd_prodi ORDER BY s.nis ASC");
                    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="./style/style.css">
    <script src="./script/script.js"></script>
</head>
<body>
    <?php include "koneksi.php";
    include "navigasi.php"; ?>
    <div id="main">
        <div class="container">
            <h2>Data Siswa</h2>
            <div class="">
                <?php
                if(isset($_SESSION['tambah'])) {
                    echo ($_SESSION['tambah']);
                    unset ($_SESSION['tambah']);
                } else if(isset($_SESSION[''])){
                    echo ($_SESSION['']);
                    unset ($_SESSION['']);
                } else if(isset($_SESSION[''])){
                    echo ($_SESSION['']);
                    unset ($_SESSION['']);
                }
                ?>
            </div>
            <hr>
            <a href="tambah_siswa.php" class="tambah">TAMBAH DATA</a>
            <div class="search">
                <form method="GET">
                    <input type="text" name="search" placeholder="Cari Siswa" value="<?php echo isset($_GET['cari']) ? $_GET['cari']:'';?>">
                    <button type="submit"class="btn-src">Cari</button>
                </form>
            </div><br>

            <table>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Tahun Ajaran</th>
                    <th>Prodi</th>
                    <th>ACTION</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($data)) {?>
                <tr>
                    <td><?php echo $row['nis']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['kelas']; ?></td>
                    <td><?php echo $row['tahun_ajaran']; ?></td>
                    <td><?php echo $row['nama_prodi']; ?></td>
                    <td>
                        <a href="edit_siswa.php?id=<?php echo $row['id']; ?>" class="edit">EDIT</a>
                        <a href="hapus_siswa.php?id=<?php echo $row['id']; ?>"class="hapus" onclick="return confirm('Yakin ingin hapus?')">DELETE</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

    </div>
</body>
</html>