<?php
session_start();
if(!isset($_SESSION["user"]))
header("location: ../masuk.php");

include "../functions.php";
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

    <!-- Hero Section Start -->
    <section id="home" class="pt-24 pb-16 bg-white dark:bg-dark md:h-screen">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full self-center px-4 lg:w-1/2">
                    <h1
                        class="text-2xl md:text-4xl mt-1 block font-bold text-center text-dark dark:text-white lg:text-8xl">
                        iLost</h1>
                    <h2 class="mb-5 text-lg md:text-2xl font-medium text-secondary lg:text-4xl text-center"><span
                            class="text-dark dark:text-white">Lost It | List It | Found It</span></h2>
                    <p class="mb-10 font-medium leading-relaxed dark:text-secondary md:text-xl lg:text-2xl">
                        iLost merupakan website informasi tentang barang hilang dan barang temuan. Didalam Website iLost
                        ini anda bisa melaporkan baik itu barang hilang maupun barang yang anda temukan.
                    </p>

                    <a href="seluruh-laporan.php"
                        class="rounded-full bg-primary py-3 px-8 text-base font-semibold text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg">Lihat
                        Laporan</a>
                </div>
                <div class="w-full self-end px-4 lg:w-1/2">
                    <div class="relative mt-10 lg:right-0 lg:mt-9">
                        <img src="../dist/img/hero.png" alt="hero" class="relative z-10 mx-auto lg:w-full max-w-full" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Laporan Section Start -->
    <section id="laporan" class="bg-secondary pt-16 pb-32 dark:bg-slate-800">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto max-w-xl text-center">
                    <h2 class="mb-8 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl">Laporan
                        Terbaru</h2>
                </div>
            </div>

            <div class="flex flex-wrap">
                <?php include "../laporan-awal.php"; ?>
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
                                <!--Button trigger vertically centered scrollable modal-->
                                <button type="button"
                                    class="rounded-lg bg-primary py-2 px-4 text-sm font-medium text-white hover:opacity-80"
                                    data-te-toggle="modal"
                                    data-te-target="#exampleModalCenteredScrollable<?= $row["id"]; ?>"
                                    data-te-ripple-init data-te-ripple-color="light">
                                    Lihat Selengkapnya
                                </button>
                            </div>

                            <!--Verically centered scrollable modal-->
                            <div data-te-modal-init
                                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                id="exampleModalCenteredScrollable<?= $row["id"]; ?>" tabindex="-1"
                                aria-labelledby="exampleModalCenteredScrollableLabel" aria-modal="true" role="dialog">
                                <div data-te-modal-dialog-ref
                                    class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                                    <div
                                        class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-dark">
                                        <div
                                            class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                            <!--Modal title-->
                                            <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200 "
                                                id="exampleModalCenteredScrollableLabel"><span
                                                    class="text-primary dark:text-secondary"><?= $row["nama_barang"]; ?></span>

                                                </br>
                                                <p>Diposting <?php
                                                $awal  = date_create($row["waktu_dibuat"]);
                                                $akhir = date_create(); // waktu sekarang, pukul 06:13
                                                $diff  = date_diff( $akhir, $awal );
                                                echo $diff->h;
                                                ?> jam yang lalu</p>
                                            </h5>

                                            <!--Close button-->
                                            <button type="button"
                                                class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none dark:text-white"
                                                data-te-modal-dismiss aria-label="Close">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>

                                        <!--Modal body-->
                                        <div class="relative p-4 dark:text-white">
                                            <div class="py-4 group">
                                                <img src="../dist/img/laporan/<?= $row["gambar_barang"]; ?>"
                                                    alt="gambar<?= $i; ?>" class="w-full" />
                                            </div>
                                            <p>
                                                <span class="text-primary dark:text-secondary">Laporan Barang
                                                    <?= $row["kategori_laporan"]; ?>
                                                </span>
                                                </br>
                                                <span class="text-primary dark:text-secondary">Deskripsi:
                                                </span><?= $row["deskripsi"]; ?>
                                                </br>
                                                <span class="text-primary dark:text-secondary">Kategori Barang:
                                                </span><?= $row["kategori_barang"]; ?>
                                                </br>
                                                <span class="text-primary dark:text-secondary">Tanggal Dilaporkan:
                                                </span><?= $row["tanggal_ditemukan"]; ?>
                                                </br>
                                                <span class="text-primary dark:text-secondary">Lokasi Barang:
                                                </span><?= $row["lokasi"]; ?>
                                                </br>
                                                <span class="text-primary dark:text-secondary">Kontak: </span>
                                                <?= $row["kontak"]; ?> dan <?= $row["email"]; ?>
                                            </p>
                                        </div>

                                        <!--Modal footer-->
                                        <div
                                            class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                            <button type="button"
                                                class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200 dark:text-white"
                                                data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
                <?php endforeach; ?>
            </div>

            <div class="flex justify-end">
                <a href="seluruh-laporan.php"
                    class="rounded-full bg-primary py-3 px-8 text-base font-semibold text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg">Lihat
                    Seluruh
                    Laporan</a>
            </div>

        </div>
    </section>
    <!-- Laporan Section End -->

    <!-- ====== FAQ Section Start -->
    <section id="faq" x-data="
    {
    openFaq1: false, 
    openFaq2: false, 
    openFaq3: false, 
    openFaq4: false, 
    openFaq5: false, 
    openFaq6: false
    }
    " class="relative z-20 overflow-hidden bg-white dark:bg-dark pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
        <div class="container mx-auto">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4">
                    <div class="mx-auto mb-[60px] max-w-[520px] text-center lg:mb-20">
                        <span class="block mb-2 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl">
                            FAQ
                        </span>
                        <h2 class="text-dark dark:text-white mb-4 text-3xl font-bold sm:text-[40px]/[48px]">
                            Ada pertanyaan? Lihat disini
                        </h2>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4 lg:w-1/2">
                    <div
                        class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-bcg sm:p-8 lg:px-6 xl:px-8">
                        <button class="flex w-full text-left faq-btn" @click="openFaq1 = !openFaq1">
                            <div
                                class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                                <svg :class="openFaq1 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="mt-1 text-lg font-semibold text-dark dark:text-secondary">
                                    How long we deliver your first blog post?
                                </h4>
                            </div>
                        </button>
                        <div x-show="openFaq1" class="faq-content pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color dark:text-backgr">
                                It takes 2-3 weeks to get your first blog post ready. That
                                includes the in-depth research & creation of your monthly
                                content marketing strategy that we do before writing your
                                first blog post, Ipsum available .
                            </p>
                        </div>
                    </div>
                    <div
                        class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-bcg sm:p-8 lg:px-6 xl:px-8">
                        <button class="flex w-full text-left faq-btn" @click="openFaq2 = !openFaq2">
                            <div
                                class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                                <svg :class="openFaq2 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="mt-1 text-lg font-semibold text-dark dark:text-secondary">
                                    How long we deliver your first blog post?
                                </h4>
                            </div>
                        </button>
                        <div x-show="openFaq2" class="faq-content pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color dark:text-backgr">
                                It takes 2-3 weeks to get your first blog post ready. That
                                includes the in-depth research & creation of your monthly
                                content marketing strategy that we do before writing your
                                first blog post, Ipsum available .
                            </p>
                        </div>
                    </div>
                    <div
                        class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-bcg sm:p-8 lg:px-6 xl:px-8">
                        <button class="flex w-full text-left faq-btn" @click="openFaq3 = !openFaq3">
                            <div
                                class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                                <svg :class="openFaq3 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="mt-1 text-lg font-semibold text-dark dark:text-secondary">
                                    How long we deliver your first blog post?
                                </h4>
                            </div>
                        </button>
                        <div x-show="openFaq3" class="faq-content pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color dark:text-backgr">
                                It takes 2-3 weeks to get your first blog post ready. That
                                includes the in-depth research & creation of your monthly
                                content marketing strategy that we do before writing your
                                first blog post, Ipsum available .
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2">
                    <div
                        class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-bcg sm:p-8 lg:px-6 xl:px-8">
                        <button class="flex w-full text-left faq-btn" @click="openFaq4 = !openFaq4">
                            <div
                                class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                                <svg :class="openFaq4 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="mt-1 text-lg font-semibold text-dark dark:text-secondary">
                                    How long we deliver your first blog post?
                                </h4>
                            </div>
                        </button>
                        <div x-show="openFaq4" class="faq-content pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color dark:text-backgr">
                                It takes 2-3 weeks to get your first blog post ready. That
                                includes the in-depth research & creation of your monthly
                                content marketing strategy that we do before writing your
                                first blog post, Ipsum available .
                            </p>
                        </div>
                    </div>
                    <div
                        class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-bcg sm:p-8 lg:px-6 xl:px-8">
                        <button class="flex w-full text-left faq-btn" @click="openFaq5 = !openFaq5">
                            <div
                                class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                                <svg :class="openFaq5 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="mt-1 text-lg font-semibold text-dark dark:text-secondary">
                                    How long we deliver your first blog post?
                                </h4>
                            </div>
                        </button>
                        <div x-show="openFaq5" class="faq-content pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color dark:text-backgr">
                                It takes 2-3 weeks to get your first blog post ready. That
                                includes the in-depth research & creation of your monthly
                                content marketing strategy that we do before writing your
                                first blog post, Ipsum available .
                            </p>
                        </div>
                    </div>
                    <div
                        class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-bcg sm:p-8 lg:px-6 xl:px-8">
                        <button class="flex w-full text-left faq-btn" @click="openFaq6 = !openFaq6">
                            <div
                                class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                                <svg :class="openFaq6 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="mt-1 text-lg font-semibold text-dark dark:text-secondary">
                                    How long we deliver your first blog post?
                                </h4>
                            </div>
                        </button>
                        <div x-show="openFaq6" class="faq-content pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color dark:text-backgr">
                                It takes 2-3 weeks to get your first blog post ready. That
                                includes the in-depth research & creation of your monthly
                                content marketing strategy that we do before writing your
                                first blog post, Ipsum available .
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 right-0 z-[-1]">
            <svg width="1440" height="886" viewBox="0 0 1440 886" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.5"
                    d="M193.307 -273.321L1480.87 1014.24L1121.85 1373.26C1121.85 1373.26 731.745 983.231 478.513 729.927C225.976 477.317 -165.714 85.6993 -165.714 85.6993L193.307 -273.321Z"
                    fill="url(#paint0_linear)" />
                <defs>
                    <linearGradient id="paint0_linear" x1="1308.65" y1="1142.58" x2="602.827" y2="-418.681"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#3056D3" stop-opacity="0.36" />
                        <stop offset="1" stop-color="#F5F2FD" stop-opacity="0" />
                        <stop offset="1" stop-color="#F5F2FD" stop-opacity="0.096144" />
                    </linearGradient>
                </defs>
            </svg>
        </div>
    </section>
    <!-- ====== FAQ Section End -->

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
