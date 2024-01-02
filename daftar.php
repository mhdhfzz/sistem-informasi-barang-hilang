<?php
session_start();
// cek sudah login atau belum
if( isset($_SESSION["admin"])) {
    header("Location: admin/index.php");
    exit;
} else if ( isset($_SESSION["user"])) {
    header("Location: user/index.php");
    exit;
}

include 'query/functions.php';

if( isset($_POST["submit"])) {
    if( registrasi($_POST) > 0 ) {
    echo "<script>
        alert('User Baru Berhasil Ditambahkan');
        document.location.href = 'masuk.php';
        </script>
    ";
    } else {
        echo mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar | iLost</title>
    <link href="dist/output.css" rel="stylesheet" />
    <!-- <link href="dist/css/final.css" rel="stylesheet" /> -->

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
    <?php include "template/navbar.php"; ?>
    <!-- Header End -->

    <!-- Daftar -->
    <section class="bg-white dark:bg-dark h-screen flex items-center justify-center">
        <!-- Daftar container -->
        <div class="bg-slate-100 dark:bg-bcg flex rounded-2xl shadow-lg max-w-3xl xl:max-w-5xl p-5 items-center">
            <!-- form -->
            <div class="md:w-1/2 px-8 md:px-16">
                <h2 class="font-bold text-2xl text-primary dark:text-primary">Daftar</h2>
                <?php if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            }; ?>
                <form action="" method="post" class="flex flex-col gap-4">
                    <input class="p-2 mt-8 rounded-xl border dark:border-primary dark:bg-dark dark:text-secondary"
                        type="text" name="nama" placeholder="Nama Lengkap" />
                    <input class="p-2 rounded-xl border dark:border-primary dark:bg-dark dark:text-secondary"
                        type="email" name="email" placeholder="Email" />
                    <select class="p-2 rounded-xl border dark:border-primary dark:bg-dark dark:text-secondary"
                        name="kelamin">
                        <option value="">Jenis Kelamin</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <input class="p-2 rounded-xl border dark:border-primary dark:bg-dark dark:text-secondary w-full"
                        type="password" name="password" placeholder="Kata sandi" />
                    <div class="relative">
                        <input class="p-2 rounded-xl border dark:border-primary dark:bg-dark dark:text-secondary w-full"
                            type="password" name="password2" placeholder="Konfirmasi kata sandi" />
                    </div>
                    <input type="submit" name="submit" value="Daftar"
                        class="bg-primary rounded-xl text-secondary py-2 hover:scale-105 duration-300"></input>
                </form>

                <div class="mt-3 text-xs flex justify-between items-center text-primary">
                    <p>Sudah memiliki akun?</p>
                    <button
                        class="py-2 px-5 bg-white dark:bg-secondary border rounded-xl hover:scale-110 duration-300"><a
                            href="masuk.php">Masuk</a></button>
                </div>
            </div>

            <!-- image -->
            <div class="md:block hidden w-1/2">
                <img class="rounded-2xl" src="dist/img/hero.png" />
            </div>
        </div>
    </section>
    <!-- Login End -->

    <!-- Back to top Start -->
    <a href="#home"
        class="fixed bottom-4 right-4 z-[9999] hidden h-14 w-14 items-center justify-center rounded-full bg-primary p-4 hover:animate-pulse"
        id="to-top">
        <span class="mt-2 block h-5 w-5 rotate-45 border-t-2 border-l-2"></span>
    </a>
    <!-- Back to top End -->

    <script src="dist/js/script.js"></script>
</body>

</html>