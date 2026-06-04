<?php
session_start();
include "koneksi.php";
$prodi = mysqli_query($koneksi, "SELECT * FROM prodi");
$error = "";

if (isset($_POST['simpan'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $kd_prodi = $_POST['kd_prodi'];
    $jk = $_POST['jenis_kelamin'];
    
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $nama_foto = time() . '_' . $foto;
    $path = "uploads/" . $nama_foto;

    if (empty($nis) || empty($nama) || empty($kelas) || empty($tahun_ajaran) || empty($kd_prodi) || empty($jk) || empty($foto)) {
        $error = "Data wajib diisi!";
    } else {
        if(move_uploaded_file($tmp, $path)){
            mysqli_query($koneksi, "INSERT INTO siswa (nis, nama, kelas, tahun_ajaran, kd_prodi, jenis_kelamin, foto) VALUES ('$nis', '$nama', '$kelas', '$tahun_ajaran', '$kd_prodi', '$jk', '$nama_foto')");
            echo "<h1>Data berhasil disimpan!</h1>";
            echo "<a href='siswa.php' class='batal'>Kembali</a>";
            exit();
        }
    }
}
?>
<html>
<head>
    <title>Tambah Data Siswa</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <div class="container">
        <h2>TAMBAH DATA SISWA</h2>
        <hr>
        <?php if($error != "") echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>NIS</td>
                    <td><input type="text" name="nis" required></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" required></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td><input type="text" name="kelas" required></td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td><input type="text" name="tahun_ajaran" required></td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>
                        <select name="kd_prodi" required>
                            <?php while ($p = mysqli_fetch_assoc($prodi)) { ?>
                                <option value="<?php echo $p['kd_prodi']; ?>">
                                    <?php echo $p['nama_prodi']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <input type="radio" name="jenis_kelamin" value="L" required> Laki-laki
                        <input type="radio" name="jenis_kelamin" value="P" required> Perempuan
                    </td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td><input type="file" name="foto" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="simpan" class="submit">SIMPAN</button>
                        <br>
                        <button type="button" class="batal"><a href="siswa.php" style="color: white;">BATAL</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>