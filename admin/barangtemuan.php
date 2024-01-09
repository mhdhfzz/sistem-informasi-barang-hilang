<?php
include('config.php');

if (isset($_GET['id'])) {
    $idToDelete  = $_GET['id'];
    $queryDelete = "DELETE FROM laporan WHERE id = '$idToDelete'";
    $resultDelete = mysqli_query($koneksi, $queryDelete);

    if ($resultDelete) {
        echo "<script>alert('Data berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Gagal menghapus data');</script>";
    }
}

// Ambil data dari tabel database berdasarkan kategori "Barang Temuan"
$querySelect = "SELECT * FROM laporan WHERE kategori_laporan = 'Temuan'";
$resultSelect = mysqli_query($koneksi, $querySelect);

// Periksa apakah query berhasil dijalankan
if (!$resultSelect) {
    die("Query error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">iLost</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Admin Elements
                    </li>
                    <li class="sidebar-item">
                        <a href="index.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="useradmin.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            User
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            Pelaporan Barang
                        </a>
                        <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Barang Temuan</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="baranghilang.php" class="sidebar-link">Barang Hilang</a>
                            </li>
                    </li>
                </ul>
                </li>
                <li class="sidebar-item">
                    <a href="../keluar.php" class="sidebar-link collapsed" data-bs-target="#auth"
                        data-bs-toggle="collapse" aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                        Keluar
                    </a>
                </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="image/profile.jpg" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="../keluar.php" class="dropdown-item">Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Barang Temuan</h4>
                    </div>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Tabel Data Barang Temuan
                            </h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Kategori Barang</th>
                                        <th scope="col">Tanggal Di Temukan</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Waktu di uploud</th>
                                        <th scope="col">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $no = 1;
                                    while ($row = mysqli_fetch_assoc($resultSelect)) {
                                        echo "<tr>";
                                        echo "<td>". $no. "</td>";
                                        echo "<td>". $row['nama_barang'] ."</td>";
                                        echo "<td>". $row['deskripsi'] ."</td>";
                                        echo "<td>". $row['kategori_barang'] ."</td>";
                                        echo "<td>". $row['tanggal_ditemukan'] ."</td>";
                                        echo "<td>". $row['lokasi'] ."</td>";
                                        echo "<td>". $row['gambar_barang'] ."</td>";
                                        echo "<td>". $row['waktu_dibuat'] ."</td>";
                                        echo "<td><a href='barangtemuan.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
                                        echo "</tr>";
                                    
                                    $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>iLost</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">About Us</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Terms</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Booking</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>