<?php
session_start();
if(!isset($_SESSION["user"]))
header("location: ../masuk.php");

$kategori="";
$katakunci="";
// cek apakah tombol search sudah ditekan atau belum
if (isset($_POST['search'])) {
    $kategori = $_POST['kategori'];
    $katakunci = $_POST['katakunci'];

}

include "../query/functions.php";
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beranda | iLost</title>
    <link href="../dist/output.css" rel="stylesheet" />
    <!-- <link href="dist/css/final.css" rel="stylesheet" /> -->

    <!-- icon website -->
    <link rel="icon" type="image/x-icon" href="../dist/img/icon.png">

    <!-- alpinejs -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"></script>

    <script>
    if (localStorage.theme === "dark" || (!("theme" in localStorage) && window.matchMedia(
            "(prefers-color-scheme: dark)").matches)) {
        document.documentElement.classList.add("dark");
    } else {
        document.documentElement.classList.remove("dark");
    }
    </script>
    <script>
    // Initialization for ES Users
    import {
        Modal,
        Ripple,
        initTE
    } from "tw-elements";

    initTE({
        Modal,
        Ripple
    });
    </script>
</head>

<body>
    <!-- Header Start -->
    <?php include "../template/navbar-user.php"; ?>
    <!-- Header End -->

    <!-- Hero Section Start -->
    <?php include "../template/hero.php"; ?>
    <!-- Hero Section End -->

    <!-- Laporan limit 8 Section Start -->
    <?php 
    $path = "../query/laporan-limit-8.php";
    include "../template/tampilan-laporan.php";
    ?>
    <!-- Laporan Section End -->

    <!-- FAQ Section Start -->
    <?php include "../template/faq.php"; ?>
    <!-- FAQ Section End -->

    <!-- Footer Start -->
    <?php include "../template/footer.php"; ?>
    <!-- Footer End -->

    <!-- Back to top Start -->
    <a href="#home"
        class="fixed bottom-4 right-4 z-[9999] hidden h-14 w-14 items-center justify-center rounded-full bg-primary p-4 hover:animate-pulse"
        id="to-top">
        <span class="mt-2 block h-5 w-5 rotate-45 border-t-2 border-l-2"></span>
    </a>
    <!-- Back to top End -->

    <script src="../dist/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
</body>

</html>