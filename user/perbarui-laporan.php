<?php
session_start();
if(!isset($_SESSION["user"]))
header("location: ../masuk.php");

include "../query/functions.php";

// ambil data di url
$id = $_GET["id"];

// query data laporan berdasarkan id
$laporan = query("SELECT * FROM laporan WHERE id = '$id'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {
    if(isset($_FILES["fileImg"]["name"])){
        $id = $_POST["id"];
        $src = $_FILES["fileImg"]["tmp_name"];
        $imageName = uniqid() . $_FILES["fileImg"]["name"];
    
        $target = "../dist/img/laporan/" . $imageName;
        move_uploaded_file($src, $target);
    }
    // cek apakah data berhasil diubah atau tidak
    

    if (empty($src)){
        // cek apakah data berhasil diubah atau tidak
        ubahLaporan($_POST, $laporan['gambar_barang']);
        echo "
        <script>
        alert('Laporan Berhasil Diperbarui');
        document.location.href = 'riwayat-laporan.php';
        </script>
        ";
    } else {
        ubahLaporan($_POST, $imageName);
        echo "
        <script>
        alert('Laporan Berhasil Diperbarui');
        document.location.href = 'riwayat-laporan.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perbarui Laporan Barang | iLost</title>
    <link href="../dist/output.css" rel="stylesheet" />
    <!-- <link href="dist/css/final.css" rel="stylesheet" /> -->

    <!-- icon website -->
    <link rel="icon" type="image/x-icon" href="../dist/img/icon.png">

    <!-- alpinejs -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.3.x/dist/index.js"></script>

    <script>
    if (localStorage.theme === "dark" || (!("theme" in localStorage) && window.matchMedia(
            "(prefers-color-scheme: dark)").matches)) {
        document.documentElement.classList.add("dark");
    } else {
        document.documentElement.classList.remove("dark");
    }
    </script>
</head>

<body>
    <!-- Header Start -->
    <?php include "../template/navbar-user.php"; ?>
    <!-- Header End -->

    <!-- Laporan Section Start -->
    <section class=" bg-white dark:bg-bcg" id="laporan">
        <div class="container py-32">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-3xl font-bold leading-7 text-gray-900 dark:text-secondary text-center">Laporan
                            Barang <?= $laporan["kategori_laporan"]; ?></h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-white text-center">Informasi ini akan
                            ditampilkan
                            secara publik
                            menjadi hati-hati dengan apa yang Anda bagikan.</p>
                        <button type="button"
                            class="rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:text-secondary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"><a
                                href=" hapus-laporan.php?id=<?= $id; ?>">Hapus Laporan</a></button>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="name"
                                    class="block text-xl font-medium leading-6 text-gray-900 dark:text-white">Nama
                                    Barang</label>
                                <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-white">Contoh : Jaket,
                                    Smartphone, Helm</p>
                                <div class="mt-2">
                                    <input type="text" name="nama_barang" placeholder="masukan nama barang"
                                        autocomplete="given-name" value="<?= $laporan['nama_barang']; ?>"
                                        class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary dark:border-primary dark:bg-dark dark:text-secondary sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="name"
                                    class="block text-xl font-medium leading-6 text-gray-900 dark:text-white">Kategori
                                    Barang</label>
                                <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-white">Pilih salah satu
                                    kategori barang</p>
                                <div class="mt-2">
                                    <select name="kategori_barang"
                                        class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary dark:border-primary dark:bg-dark dark:text-secondary sm:text-sm sm:leading-6">
                                        <option value="">Pilih Kategori Barang</option>
                                        <option value="elektronik"
                                            <?php if($laporan["kategori_barang"]=="elektronik"){echo "selected";} ?>>
                                            Barang Elektronik</option>
                                        <option value="penting"
                                            <?php if($laporan["kategori_barang"]=="penting"){echo "selected";} ?>>Barang
                                            Penting</option>
                                        <option value="kendaraan"
                                            <?php if($laporan["kategori_barang"]=="kendaraan"){echo "selected";} ?>>
                                            Kendaraan</option>
                                        <option value="perhiasan"
                                            <?php if($laporan["kategori_barang"]=="perhiasan"){echo "selected";} ?>>
                                            Perhiasan</option>
                                        <option value="dokumen"
                                            <?php if($laporan["kategori_barang"]=="dokumen"){echo "selected";} ?>>Surat
                                            atau Dokumen Penting</option>
                                        <option value="lainnya"
                                            <?php if($laporan["kategori_barang"]=="lainnya"){echo "selected";} ?>>
                                            Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="name"
                                    class="block text-xl font-medium leading-6 text-gray-900 dark:text-white">Deskripsi
                                    Barang</label>
                                <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-white">Berikan
                                    rincian/deskripsi tambahan tentang barang hilang</p>
                                <div class="mt-2">
                                    <input type="text" name="deskripsi" value="<?= $laporan['deskripsi']; ?>"
                                        class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary dark:border-primary dark:bg-dark dark:text-secondary sm:text-sm sm:leading-6"
                                        placeholder="rincikan tentang barang">
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="name"
                                    class="block text-xl font-medium leading-6 text-gray-900 dark:text-white">Perkiraan
                                    Tanggal
                                    Barang Hilang</label>
                                <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-white">Tambahkan tanggal kapan
                                    barang tersebut hilang</p>
                                <div class="mt-2">
                                    <input type="date" name="tanggal_ditemukan"
                                        value="<?= $laporan['tanggal_ditemukan']; ?>"
                                        class="block w-1/2 rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary dark:border-primary dark:bg-dark dark:text-secondary sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="name"
                                    class="block text-xl font-medium leading-6 text-gray-900 dark:text-white">Lokasi
                                    Barang
                                    Terakhir Dilihat</label>
                                <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-white">Berikan lokasi
                                    kehilangan
                                    barang tersebut (Kelas, Kantin, Taman, dll.)</p>
                                <div class="mt-2">
                                    <input type="text" name="lokasi_ditemukan" value="<?= $laporan['lokasi']; ?>"
                                        placeholder="masukan lokasi barang ditemukan"
                                        class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary dark:border-primary dark:bg-dark dark:text-secondary sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="name"
                                    class="block text-xl font-medium leading-6 text-gray-900 dark:text-white">Upload
                                    Gambar Barang <?= $laporan["kategori_laporan"]; ?></label>
                                <div x-data="{photoName: null, photoPreview: null}"
                                    class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
                                    <!-- Photo File Input -->
                                    <input type="file" name="fileImg" class="hidden" x-ref="photo" x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
                    ">

                                    <!-- Current Profile Photo -->
                                    <div class="mt-2" x-show="! photoPreview">
                                        <span class="block w-60 h-60 ml-5 shadow"
                                            x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'../dist/img/laporan/<?= $laporan['gambar_barang']; ?>\');'"
                                            style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                                        </span>
                                    </div>
                                    <!-- New Profile Photo Preview -->
                                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                                        <span class="block w-60 h-60 ml-5 shadow"
                                            x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'"
                                            style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                                        </span>
                                    </div>
                                    <button type="button"
                                        class="inline-flex items-center px-4 py-2 bg-white dark:border-primary dark:bg-dark dark:text-secondary border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-white active:bg-primary transition ease-in-out duration-150 mt-2 ml-3"
                                        x-on:click.prevent="$refs.photo.click()">
                                        Pilih Gambar Barang
                                    </button>
                                </div>
                                <input type="hidden" name="id" value="<?= $id; ?>">
                                <input type="hidden" name="kategori_laporan" value="Hilang">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white"><a
                            href="riwayat-laporan.php">Batalkan</a></button>
                    <input type="submit" name="submit"
                        class="rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:text-secondary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                        value="Simpan">

                </div>
            </form>
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
</body>

</html>