<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"><br><a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon"><img src="images/ventools.svg" style="width: 90px;"> <img></div>
        <div class="sidebar-brand-text mx-1">ventools</div>
    </a><br><br>
    <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fas fa-fw fa-home"></i> <span>Home</span></a></li>
    <hr class="sidebar-divider">
    <li class="nav-item"><a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true" aria-controls="collapsePages"><i class="fas fa-fw fa-book"></i> <span>Inventori</span></a>
        <div id="master" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded"><a class="collapse-item" href="inventory.php">Kelola Inventori</a> <a class="collapse-item" href="input-inventory.php">Tambah ke Inventori</a></div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item"><a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#outgoing" aria-expanded="true" aria-controls="collapsePages"><i class="fas fa-fw fa-file-alt"></i> <span>Transaksi</span></a>
        <div id="outgoing" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded"><a class="collapse-item" href="transaksi.php">Data Transaksi</a> <a class="collapse-item" href="input-transaksi-masuk.php">Input Transaksi Masuk</a> <a class="collapse-item" href="input-transaksi-keluar.php">Input Transaksi Keluar</a></div>
        </div>
    </li>
    <hr class="sidebar-divider"> <?php if($_SESSION['user_level'] == "admin"){?> <li class="nav-item"><a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user" aria-expanded="true" aria-controls="collapseUtilities"><i class="fas fa-users"></i> <span>User</span></a>
        <div id="user" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User</h6><a class="collapse-item" href="user.php">User</a> <a class="collapse-item" href="input-user.php">Tambah User</a>
            </div>
        </div>
    </li> <?php } else if($_SESSION['user_level'] == "user"){ echo "";} ?>
    <br><br><br>
    <div class="text-center d-none d-md-inline"><button class="rounded-circle border-0" id="sidebarToggle"></button></div>
</ul>