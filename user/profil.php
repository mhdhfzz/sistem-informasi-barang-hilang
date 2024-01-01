<?php
session_start();
if(!isset($_SESSION["user"]))
header("location: ../masuk.php");

include "../functions.php";

// ambil data di session
$emaill = $_SESSION["user"];

// query data user berdasarkan emailnya
$user = query("SELECT * FROM user WHERE email = '$emaill'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {
    if(isset($_FILES["fileImg"]["name"])){
        $id = $_POST["id"];
        $src = $_FILES["fileImg"]["tmp_name"];
        $imageName = uniqid() . $_FILES["fileImg"]["name"];
    
        $target = "../dist/img/users/" . $imageName;
        move_uploaded_file($src, $target);
    }
    // cek apakah data berhasil diubah atau tidak
    ubahprofil($_POST, $imageName);
    echo "
    <script>
    alert('Profil Berhasil Diubah');
    document.location.href = 'profil.php';
    </script>
    ";
}

?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Akun | iLost</title>
    <link href="../dist/output.css" rel="stylesheet" />
    <!-- <link href="dist/css/final.css" rel="stylesheet" /> -->
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

    <!-- Profil Section Start -->
    <section class=" bg-white dark:bg-bcg" id="profil">
        <div class="container py-32">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-4xl dark:text-secondary font-semibold leading-7 text-gray-900 text-center">
                            Profil Akun</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-white text-center">Informasi ini akan
                            ditampilkan
                            secara publik
                            menjadi hati-hati dengan apa yang Anda bagikan.</p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="username"
                                    class="block text-sm dark:text-white font-medium leading-6 text-gray-900">Username</label>
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-primary sm:max-w-md">
                                        <input type="text" name="username" id="username" require
                                            value="<?= $user['username']; ?>" autocomplete="username"
                                            class="block flex-1 rounded-md border-0 bg-transparent py-1.5 pl-2 text-gray-900  placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 dark:border-primary dark:bg-dark dark:text-secondary"
                                            placeholder="janesmith">
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="photo"
                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Photo</label>
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
                                        <span class="block w-40 h-40 rounded-full ml-5 shadow"
                                            x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'../dist/img/users/<?= $user['gambar']; ?>\');'"
                                            style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                                        </span>
                                    </div>
                                    <!-- New Profile Photo Preview -->
                                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                                        <span class="block w-40 h-40 rounded-full ml-5 shadow"
                                            x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'"
                                            style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                                        </span>
                                    </div>
                                    <button type="button"
                                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-white active:bg-primary transition ease-in-out duration-150 mt-2 ml-3 dark:border-primary dark:bg-dark dark:text-secondary"
                                        x-on:click.prevent="$refs.photo.click()">
                                        Pilih Photo Baru
                                    </button>
                                </div>
                                <input type="hidden" name="id" value="<?= $user["email"]; ?>">
                            </div>


                        </div>
                    </div>

                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900 dark:text-secondary">Informasi
                            Pribadi</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-white">Gunakan alamat email di mana
                            Anda dapat menerima
                            email.
                        </p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="name"
                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Nama
                                    Lengkap</label>
                                <div class="mt-2">
                                    <input type="text" name="nama" id="name" autocomplete="given-name" require
                                        value="<?= $user['nama']; ?>"
                                        class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary dark:border-primary dark:bg-dark dark:text-secondary sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="name"
                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Jenis
                                    Kelamin</label>
                                <div class="mt-2">
                                    <select
                                        class="p-2 rounded-xl border dark:border-primary dark:bg-dark dark:text-secondary"
                                        name="kelamin">
                                        <option value="">Jenis Kelamin</option>
                                        <option value="L" <?php if($user["kelamin"]=="L"){echo "selected";} ?>>Laki-Laki
                                        </option>
                                        <option value="P" <?php if($user["kelamin"]=="P"){echo "selected";} ?>>Perempuan
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="email"
                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Alamat
                                    Email</label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" autocomplete="email" require
                                        value="<?= $user['email']; ?>"
                                        class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6 dark:border-primary dark:bg-dark dark:text-secondary">
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="kontak"
                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Nomor
                                    Telepon</label>
                                <div class="mt-2">
                                    <input id="kontak" name="kontak" type="number" require
                                        value="<?= $user['kontak']; ?>" placeholder="0812xxxx"
                                        class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6 dark:border-primary dark:bg-dark dark:text-secondary">
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white"><a
                            href="index.php">Cancel</a></button>
                    <input type="submit" name="submit"
                        class="rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:text-secondary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                        value="Save">

                </div>
            </form>
        </div>

    </section>
    <!-- Profil Section End -->


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
    </footer>
    <!-- Footer End -->

    <!-- Back to top Start -->
    <a href="#profil"
        class="fixed bottom-4 right-4 z-[9999] hidden h-14 w-14 items-center justify-center rounded-full bg-primary p-4 hover:animate-pulse"
        id="to-top">
        <span class="mt-2 block h-5 w-5 rotate-45 border-t-2 border-l-2"></span>
    </a>
    <!-- Back to top End -->

    <script src="../dist/js/script.js"></script>
</body>

</html>
