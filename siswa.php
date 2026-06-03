<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location: index.php?p=Silahkan login terlebih dahulu!");
    exit();
}
include "koneksi.php";

//ambil data siswa + prodi (JOIN)
$data = mysqli_query($koneksi, "SELECT s.*, p.nama_prodi FROM siswa s JOIN prodi p ON s.kd_prodi = p.kd_prodi");
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
            <hr>
            <a href="tambah_siswa.php" class="tambah">TAMBAH DATA</a>
            <div>
                
            </div>
            <br><br>
            <table>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
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