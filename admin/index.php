<?php include('config.php');
session_start();
if(!isset($_SESSION["admin"]))
header("location: ../masuk.php");
//total data user
$querySelect = "SELECT * FROM user";
$resultSelect = mysqli_query($koneksi, $querySelect);
$totalDataUser = mysqli_num_rows($resultSelect);

//data barang temuan
$querySelect = "SELECT * FROM laporan WHERE kategori_laporan = 'Temuan'";
$resultSelect = mysqli_query($koneksi, $querySelect);
$totalDataTemuan = mysqli_num_rows($resultSelect);

//data barang hilang
$querySelect = "SELECT * FROM laporan WHERE kategori_laporan = 'Hilang'";
$resultSelect = mysqli_query($koneksi, $querySelect);
$totalDataHilang = mysqli_num_rows($resultSelect);
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
                        <a href="#" class="sidebar-link">
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
                                <a href="barangtemuan.php" class="sidebar-link">Barang Temuan</a>
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
                                <a href="profil.php" class="dropdown-item">Profile</a>
                                <a href="../keluar.php" class="dropdown-item">Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Admin Dashboard</h4>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                                <h4>Welcome Back, Admin</h4>
                                                <p class="mb-0">Admin Dashboard, iLost</p>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-end text-end">
                                            <img src="image/customer-support.jpg" class="img-fluid illustration-img"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-2">
                                                <?php echo $totalDataUser; ?>
                                            </h4>
                                            <p class="mb-2">
                                                Total Data User
                                            </p>
                                            <div class="mb-0">
                                                <span class="badge text-success me-2">
                                                    <?php echo $totalDataHilang; ?>
                                                </span>
                                                <span class="text-muted">
                                                    Laporan Barang Hilang
                                                </span>
                                            </div>
                                            <div class="mb-0">
                                                <span class="badge text-success me-2">
                                                    <?php echo $totalDataTemuan; ?>
                                                </span>
                                                <span class="text-muted">
                                                    Laporan Barang Temuan
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Tabel Data User
                            </h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kelamin</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Kontak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM user"; // Ganti 'user' dengan nama tabel yang sesuai
                                    $no = 1;
                                    $result = mysqli_query($koneksi, $query);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $no . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['nama'] . "</td>";
                                        echo "<td>" . $row['kelamin'] . "</td>";
                                        echo "<td><img src='" . $row['gambar'] . "' class='img-fluid' alt=''></td>";
                                        echo "<td>" . $row['kontak'] . "</td>";
                                        echo "</tr>";

                                        $no++;
                                    }

                                    // Bebaskan hasil kueri
                                    mysqli_free_result($result);
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