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
                                class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Beranda</a>
                        </li>
                        <li class="group">
                            <a href="user/laporan-barang-temuan.php"
                                class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Lapor
                                Barang Temuan</a>
                        </li>
                        <li class="group">
                            <a href="user/laporan-barang-hilang.php"
                                class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Lapor
                                Barang Hilang</a>
                        </li>
                        <li class="group">
                            <a href="index.php#faq"
                                class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">FAQ</a>
                        </li>
                        <li class="group">
                            <a href="masuk.php"
                                class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Masuk</a>
                        </li>
                        <li class="group">
                            <a href="daftar.php"
                                class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Daftar</a>
                        </li>
                        <li class="mt-3 flex items-center pl-8 lg:mt-0">
                            <div class="flex">
                                <span class="mr-2 text-sm text-slate-500">light</span>
                                <input type="checkbox" class="hidden" id="dark-toggle" />
                                <label for="dark-toggle">
                                    <div class="flex h-5 w-9 cursor-pointer items-center rounded-full bg-slate-500 p-1">
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