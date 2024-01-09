<aside id="sidebar" class="js-sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="#">iLost</a>
        </div>
        <ul class="sidebar-nav">
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
            <a href="../keluar.php" class="sidebar-link"><i class="fa-regular fa-user pe-2"></i>
                Keluar
            </a>
        </li>
        <li class="sidebar-item">
            <a href="profil.php" class="sidebar-link"><i class="fa-regular fa-user pe-2"></i>
                Profil Admin
            </a>
        </li>
        </ul>
    </div>
</aside>