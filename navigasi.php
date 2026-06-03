<nav class="navbar">
    <div class="menu-icon">
        <a href="#" onclick="openSlideMenu()"> Menu </a>
    </div>
    <ul>
        <li><a href="home.php">Home</li>
        <li><a href="siswa.php">Siswa</li>
        <li><a href="prodi.php">Prodi</li>
        <li class="logout">
            <a href="logout.php">
                Logout (<?php echo $_SESSION['user']; ?>)
            </a>
        </li>
    </ul>
</nav>


<div id="side-menu" class="side-nav">
    <a href="#" class="btn-close" onclick="closeSlideMenu()">&time;</a>
    <a href="home.php">Home</a>
    <a href="home.php">Siswa</a>
    <a href="home.php">Prodi</a>
    <a href="home.php">Logout</a>
</div>