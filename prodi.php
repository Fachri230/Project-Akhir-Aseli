<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
if(!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location: index.php?p=Silahkan login terlebih dahulu!");
    exit();

}
include "koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM prodi");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Prodi</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <?php include "koneksi.php"; ?>
    <div id="main">
        <div class="container">
            <h2>Data Prodi</h2>
            <hr>
            <a href="tambah_prodi.php" class="tambah">TAMBAH DATA PRODI</a>
            <br><br>
            <table>
                <tr>
                    <th>Kode Prodi</th>
                    <th>Nama Prodi</th>
                    <th>ACTION</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($data)) {?>
                    <tr>
                        <td><?php echo $row['kd_prodi']; ?></td>
                        <td><?php echo $row['nama_prodi']; ?></td>
                        <td>
                            <a href="edit_prodi.php?id_prodi=<?php echo
$row['id_prodi']; ?>">EDIT</a>
                            <a href="hapus_prodi.php?id_prodi=<?php echo
$row['id_prodi'];?>"
                                onclick="return confirm('yakin ingin hapus?')">DELETE</a>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>