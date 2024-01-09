<?php
include 'config.php';
session_start();
$user_id = $_SESSION["admin"]; // Mendapatkan ID pengguna dari sesi

if (isset($_POST['update_profile'])) {
    // Update nama dan email
    $update_email = mysqli_real_escape_string($koneksi, $_POST['update_email']);
    $update_nama = mysqli_real_escape_string($koneksi, $_POST['update_nama']);
    $update_kelamin = mysqli_real_escape_string($koneksi, $_POST['update_kelamin']);

    mysqli_query($koneksi, "UPDATE `admin` SET email = '$update_email', nama = '$update_nama', kelamin = '$update_kelamin' WHERE email = '$user_id'") or die('Query failed');

    if (!empty($_POST['update_pass'])) {
        $old_pass = $_POST['old_pass'];
        $update_pass = mysqli_real_escape_string($koneksi, md5($_POST['update_pass']));
        $new_pass = mysqli_real_escape_string($koneksi, md5($_POST['new_pass']));
        $confirm_pass = mysqli_real_escape_string($koneksi, md5($_POST['confirm_pass']));
    }

    // Update password jika dimasukkan
    if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
        if ($update_pass != $old_pass) {
            $message[] = 'Kata sandi lama tidak cocok!';
        } elseif ($new_pass != $confirm_pass) {
            $message[] = 'Kata sandi baru tidak cocok!';
        } else {
            mysqli_query($koneksi, "UPDATE `admin` SET password = '$confirm_pass' WHERE email = '$user_id'") or die('Query failed');
            $message[] = 'Kata sandi berhasil diubah!';
        }
    }


    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/' . $update_image;

    // Update gambar jika dimasukkan
    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'Image is too large';
        } else {
            $image_update_query = mysqli_query($koneksi, "UPDATE `admin` SET image = '$update_image' WHERE email = '$user_id'") or die('Query failed');
            if ($image_update_query) {
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'Image updated successfully!';
        }
    }
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
    <link rel="stylesheet" href="css/style1.css">
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
                <div class="update-profile">
                    <?php
                    $select = mysqli_query($koneksi, "SELECT * FROM admin WHERE email = '$user_id'") or die('query failed');
                    $fetch = null;

                    if (mysqli_num_rows($select) > 0) {
                        $fetch = mysqli_fetch_assoc($select);
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <?php
                        if ($fetch['image'] == null) {
                            echo '<img src="image/default-avatar.png">';
                        } else {
                            echo '<img src="uploaded_img/' . $fetch['image'] . '">';
                        }
                        if (isset($message)) {
                            foreach ($message as $message) {
                                echo '<div class="message">' . $message . '</div>';
                            }
                        }
                        ?>
                        <h2>
                            <?php echo $fetch['nama']; ?>
                        </h2>
                        <h2>
                            <?php echo $fetch['email']; ?>
                        </h2>

                        <div class="flex">
                            <div class="inputBox">
                                <span>Your Email :</span>
                                <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>"
                                    class="box">
                                <span>Username :</span>
                                <input type="text" name="update_nama" value="<?php echo $fetch['nama']; ?>" class="box">
                                <span>Kelamin :</span>
                                <input type="kelamin" name="update_kelamin" value="<?php echo $fetch['kelamin']; ?>"
                                    class="box">
                                <span>update your pic :</span>
                                <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png"
                                    class="box">
                            </div>
                            <div class="inputBox">
                                <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                                <span>old password :</span>
                                <input type="password" name="update_pass" placeholder="enter previous password"
                                    class="box">
                                <span>new password :</span>
                                <input type="password" name="new_pass" placeholder="enter new password" class="box">
                                <span>confirm password :</span>
                                <input type="password" name="confirm_pass" placeholder="confirm new password"
                                    class="box">
                                <button class="update-profile-btn" value="update profile" name="update_profile">Update
                                    Profile</button>
                                <a href="home.php" class="delete-btn">go back</a>
                            </div>
                        </div>
                    </form>
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