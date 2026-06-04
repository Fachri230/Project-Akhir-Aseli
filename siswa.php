<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location: index.php?p=Silahkan login terlebih dahulu!");
    exit();
}
include "koneksi.php";

//ambil data siswa + prodi (JOIN)
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';
if($cari != '') {
    $data = mysqli_query($koneksi, "SELECT s.*, p.nama_prodi FROM siswa s JOIN prodi p ON s.kd_prodi = p.kd_prodi WHERE s.nama LIKE '%$cari%' OR s.nis LIKE '%$cari%'");
} else {
    $data = mysqli_query($koneksi, "SELECT s.*, p.nama_prodi FROM siswa s JOIN prodi p ON s.kd_prodi = p.kd_prodi");
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
                } else if(isset($_SESSION['ubah'])){
                    echo ($_SESSION['ubah']);
                    unset ($_SESSION['ubah']);
                } else if(isset($_SESSION['delete'])){
                    echo ($_SESSION['delete']);
                    unset ($_SESSION['delete']);
                }
                ?>
            </div>
            <hr>
            <a href="tambah_siswa.php" class="tambah"> + TAMBAH DATA</a>
            <div class="search">
                <form method="GET" action="">
                  <input type="text" name="cari" placeholder="Cari NIS atau Nama..." value="<?php echo $cari; ?>" class="src">
                    <button type="submit" class="btn-src">Cari</button>
                    <?php if($cari != '') echo '<button class="btn-res"><a href="siswa.php" style="color: black;">Reset</a></button>'; ?>
                </form>
                </form>
            </div><br>

            <table>
                <tr>
                    <th>Foto</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Tahun Ajaran</th>
                    <th>Prodi</th>
                    <th>Jenis Kelamin</th>
                    <th>ACTION</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($data)) {?>
                <tr>
                    <td><img src="uploads/<?php echo $row['foto']; ?>" width="50" height="50" class="profile"></td>
                    <td><?php echo $row['nis']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['kelas']; ?></td>
                    <td><?php echo $row['tahun_ajaran']; ?></td>
                    <td><?php echo $row['nama_prodi']; ?></td>
                    <td><?php echo ($row['jenis_kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan'; ?></td>
                    <td>
                        <a href="edit_siswa.php?id=<?php echo $row['id']; ?>" class="edit">EDIT</a>
                        <br><br>
                        <a href="hapus_siswa.php?id=<?php echo $row['id']; ?>"class="hapus" onclick="return confirm('Yakin ingin hapus?')">DELETE</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

    </div>
</body>
</html>