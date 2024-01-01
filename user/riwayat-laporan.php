<?php
session_start();
if(!isset($_SESSION["user"]))
header("location: ../masuk.php");

include "../functions.php";

$email = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Riwayat Laporan | iLost</title>
    <link href="../dist/output.css" rel="stylesheet" />
    <!-- <link href="dist/css/final.css" rel="stylesheet" /> -->

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
    <header class="absolute top-0 left-0 z-10 flex w-full items-center bg-transparent">
        <div class="container">
            <div class="relative flex items-center justify-between">
                <div class="px-4">
                    <a href="index.php" class="block py-6 text-2xl font-bold text-primary italic">iLost</a>
                </div>
                <div class="flex items-center px-4">
                    <button id="hamburger" name="hamburger" type="button" class="absolute right-4 block xl:hidden">
                        <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"></span>
                    </button>

                    <nav id="nav-menu"
                        class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-backgr py-5 shadow-lg dark:bg-dark dark:shadow-slate-500 xl:static xl:block xl:max-w-full xl:rounded-none xl:bg-transparent xl:shadow-none xl:dark:bg-transparent">
                        <ul class="block xl:flex">
                            <li class="group">
                                <a href="index.php"
                                    class="mx-5 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Beranda</a>
                            </li>
                            <li class="group">
                                <a href="laporan-barang-temuan.php"
                                    class="mx-5 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Lapor
                                    Barang Temuan</a>
                            </li>
                            <li class="group">
                                <a href="laporan-barang-hilang.php"
                                    class="mx-5 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Lapor
                                    Barang Hilang</a>
                            </li>
                            <li class="group">
                                <a href="index.php#faq"
                                    class="mx-5 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">FAQ</a>
                            </li>
                            <li class="group">
                                <a href="riwayat-laporan.php"
                                    class="mx-5 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Riwayat
                                    Laporan</a>
                            </li>
                            <li class="group">
                                <a href="profil.php"
                                    class="mx-5 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Profil</a>
                            </li>
                            <li class="group">
                                <a href="../keluar.php"
                                    class="mx-5 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Keluar</a>
                            </li>
                            <li class="mt-3 flex items-center pl-8 lg:mt-0">
                                <div class="flex">
                                    <span class="mr-2 text-sm text-slate-500">light</span>
                                    <input type="checkbox" class="hidden" id="dark-toggle" />
                                    <label for="dark-toggle">
                                        <div
                                            class="flex h-5 w-9 cursor-pointer items-center rounded-full bg-slate-500 p-1">
                                            <div
                                                class="toggle-circle h-4 w-4 rounded-full bg-backgr transition duration-300 ease-in-out">
                                            </div>
                                        </div>
                                    </label>
                                    <span class="ml-2 text-sm text-slate-500">dark</span>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Riwayat Section Start -->
    <section id="laporan" class="bg-white py-32 dark:bg-slate-800">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto max-w-xl text-center">
                    <h2 class="mb-8 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl">Riwayat
                        Laporan</h2>
                </div>
            </div>

            <div class="flex flex-wrap">
                <?php include "../riwayat-user.php"; ?>
                <?php foreach( $laporan as $row) : ?>
                <div class="px-4 w-1/2 lg:w-1/3 xl:w-1/4">
                    <div class="mb-10 overflow-hidden rounded-xl bg-white shadow-lg dark:bg-dark">
                        <div class="group">
                            <img src="../dist/img/laporan/<?= $row["gambar_barang"]; ?>" alt="gambar<?= $i; ?>"
                                class="w-full group-hover:scale-125 transition-all duration-500" />
                        </div>

                        <div class="py-4 px-6">
                            <h3>
                                <p
                                    class="block truncate text-xl font-semibold text-dark hover:text-primary dark:text-white">
                                    <?= $row["nama_barang"]; ?></p>
                                <p class="italic mb-1 dark:text-white">Diposting
                                    <?php
                                    $awal  = date_create($row["waktu_dibuat"]);
                                    $akhir = date_create(); // waktu sekarang, pukul 06:13
                                    $diff  = date_diff( $akhir, $awal );
                                    echo $diff->h;
                                    ?> jam yang lalu
                                </p>
                            </h3>
                            <p class="mb-6 text-base font-medium text-primary dark:text-secondary">Deskripsi Barang:
                                </br>
                                <?= $row["deskripsi"]; ?></p>
                            <div class="space-y-2">
                                <a href="perbarui-laporan.php?id=<?= $row["id"]; ?>" class=" rounded-lg bg-primary py-2 px-4 text-sm font-medium text-white
                                    hover:opacity-80">Perbarui Laporan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Riwayat Section End -->


    <!-- Footer Start -->
    <footer class="pt-24 pb-12 bg-slate-800">
        <!-- <div class="container">
				<div class="flex flex-wrap">
					<div class="mb-12 w-full px-4 font-medium text-slate-300 md:w-1/3">
						<h2 class="mb-5 text-4xl font-bold text-white">WPU</h2>
						<h3 class="mb-2 text-2xl font-bold">Hubungi Kami</h3>
						<p>sandhikagalih@gmail.com</p>
						<p>Jl. Dr. Setiabudhi No. 193</p>
						<p>Bandung</p>
					</div>
					<div class="mb-12 w-full px-4 md:w-1/3">
						<h3 class="mb-5 text-xl font-semibold text-white">Kategori Tulisan</h3>
						<ul class="text-slate-300">
							<li>
								<a href="#" class="mb-3 inline-block text-base hover:text-primary">Programming</a>
							</li>
							<li>
								<a href="#" class="mb-3 inline-block text-base hover:text-primary">Teknologi</a>
							</li>
							<li>
								<a href="#" class="mb-3 inline-block text-base hover:text-primary">Gaya Hidup</a>
							</li>
						</ul>
					</div>
					<div class="mb-12 w-full px-4 md:w-1/3">
						<h3 class="mb-5 text-xl font-semibold text-white">Tautan</h3>
						<ul class="text-slate-300">
							<li>
								<a href="#home" class="mb-3 inline-block text-base hover:text-primary">Beranda</a>
							</li>
							<li>
								<a href="#about" class="mb-3 inline-block text-base hover:text-primary">Tentang Saya</a>
							</li>
							<li>
								<a href="#portfolio" class="mb-3 inline-block text-base hover:text-primary">Portfolio</a>
							</li>
							<li>
								<a href="#clients" class="mb-3 inline-block text-base hover:text-primary">Clients</a>
							</li>
							<li>
								<a href="#blog" class="mb-3 inline-block text-base hover:text-primary">Blog</a>
							</li>
							<li>
								<a href="#contact" class="mb-3 inline-block text-base hover:text-primary">Contact</a>
							</li>
						</ul>
					</div>
				</div> -->

        <div class="w-full pt-10">
            <p class="text-center text-xs font-medium text-slate-500">
                Dibuat dengan <span class="text-pink-500">❤️</span> oleh <a href="https://instagram.com/sandhikagalih"
                    target="_blank" class="font-bold text-primary">Kelompok 3</a>, menggunakan
                <a href="https://tailwindcss.com" target="_blank" class="font-bold text-sky-500">Tailwind CSS</a>.
            </p>
        </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Back to top Start -->
    <a href="#laporan"
        class="fixed bottom-4 right-4 z-[9999] hidden h-14 w-14 items-center justify-center rounded-full bg-primary p-4 hover:animate-pulse"
        id="to-top">
        <span class="mt-2 block h-5 w-5 rotate-45 border-t-2 border-l-2"></span>
    </a>
    <!-- Back to top End -->

    <script src="../dist/js/script.js"></script>

</body>

</html>
