<?php
session_start();
if(!isset($_SESSION["user"]))
header("location: ../masuk.php");

include "../query/functions.php";
$kategori="";
$katakunci="";
// cek apakah tombol search sudah ditekan atau belum
if (isset($_POST['search'])) {
    // $kategori = $_POST['kategori'];
    $katakunci = $_POST['katakunci'];

}

$email = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seluruh Laporan | iLost</title>
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
    <?php include "../template/navbar-user.php"; ?>
    <!-- Header End -->

    <!-- Laporan Section Start -->
    <section id="laporan" class="bg-white py-32 dark:bg-slate-800">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto max-w-xl text-center">
                    <h2 class="mb-8 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl">Semua
                        Laporan</h2>
                </div>
            </div>

            <!-- Search Start -->
            <form method="POST" action="">
                <div class="flex items-center justify-center">
                    <div class="flex w-1/2 mx-10 rounded-full bg-slate-200 mb-12">
                        <input
                            class=" w-full border-none bg-transparent px-4 py-1 text-dark outline-none focus:outline-none "
                            type="search" name="katakunci" placeholder="Search..." value="<?= $katakunci; ?>" />
                        <button type="submit" name="search"
                            class="m-2 rounded-full bg-primary px-4 py-1 text-white hover:animate-pulse">
                            <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                xml:space="preserve" width="512px" height="512px">
                                <path
                                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Search End -->

            <div class="flex flex-wrap">
                <?php empty($katakunci) ? include "../query/laporan-full.php" : include "../query/search.php"; ?>
                <?php foreach( $laporan as $row) : ?>
                <div class="px-4 md:w-1/2 lg:w-1/3 xl:w-1/4">
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
                                    <span style="font-style: normal; font-weight:600"><?= $row["nama"]; ?> </span>
                                    </br>
                                    <?php include "../template/waktu-postingan.php"; ?>
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
                                            <h5 class="text-lg font-medium leading-normal text-neutral-800 dark:text-neutral-200 "
                                                id="exampleModalCenteredScrollableLabel"><span
                                                    class="text-primary dark:text-secondary"><?= $row["nama_barang"]; ?></span>

                                                </br>
                                                <p>Diposting <?= $row["nama"]; ?>
                                                    </br>
                                                    <?php include "../template/waktu-postingan.php"; ?>
                                                </p>
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
        </div>
    </section>
    <!-- Laporan Section End -->


    <!-- Footer Start -->
    <?php include "../template/footer.php"; ?>
    <!-- Footer End -->

    <!-- Back to top Start -->
    <a href="#laporan"
        class="fixed bottom-4 right-4 z-[9999] hidden h-14 w-14 items-center justify-center rounded-full bg-primary p-4 hover:animate-pulse"
        id="to-top">
        <span class="mt-2 block h-5 w-5 rotate-45 border-t-2 border-l-2"></span>
    </a>
    <!-- Back to top End -->

    <script src="../dist/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
</body>

</html>