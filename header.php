<?php

include '../config.php';


if (empty($_SESSION['username'])) {
    return header("location: $basePath/login.php");
}

$username = $_SESSION["username"];
$sql = "SELECT * FROM petugas WHERE username='$username'";
$query = mysqli_query($mysqli, $sql);
$user = mysqli_fetch_assoc($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Pembayaran SPP</title>

    <!-- DATATABLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">



    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo $basePath; ?>/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $basePath; ?>/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo $basePath; ?>/assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?php echo $basePath; ?>/assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?php echo $basePath; ?>/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="<?php echo $basePath; ?>/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php echo $basePath; ?>/assets/modules/select2/dist/css/select2.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo $basePath; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $basePath; ?>/assets/css/components.css">


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="<?php echo $basePath; ?>/assets/modules/popper.js"></script>
    <script src="<?php echo $basePath; ?>/assets/modules/tooltip.js"></script>
    <script src="<?php echo $basePath; ?>/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $basePath; ?>/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?php echo $basePath; ?>/assets/modules/moment.min.js"></script>
    <script src="<?php echo $basePath; ?>/assets/js/stisla.js"></script>

    <script src="<?php echo $basePath; ?>/assets/modules/select2/dist/js/select2.full.min.js"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?php echo $basePath; ?>/assets/js/scripts.js"></script>
    <script src="<?php echo $basePath; ?>/assets/js/custom.js"></script>

    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>


    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script> -->
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>

                </form>
                <ul class="navbar-nav navbar-right">


                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?php echo $basePath; ?>/assets/img/avatar/admin.png"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"> Haii , <?php echo $user['nama_petugas']; ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">

                            <div class="dropdown-divider"></div>
                            <a href="<?php echo $basePath; ?>/logout.php" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?php echo $basePath; ?>/index.php">Bayar SPP</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?php echo $basePath; ?>/index.php">SPP</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li><a class="nav-link" href="<?php echo $basePath; ?>/index.php"><i
                                    class="fas fa-home"></i></i><span>Dashboard</span></a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-money-bill-wave"></i> <span>Transaksi</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?php echo $basePath; ?>/pembayaran_spp">Pembayaran SPP
                                    </a></li>
                                <li><a class="nav-link" href="<?php echo $basePath; ?>/riwayat">History Pembayaran</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="<?php echo $basePath; ?>/Laporan"><i
                                    class="fas fa-file-alt"></i><span>Laporan</span></a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-database"></i> <span>Master Data</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?php echo $basePath; ?>/siswa">Data Siswa </a></li>
                                <li><a class="nav-link" href="<?php echo $basePath; ?>/kelas">Data Kelas</a></li>
                                <li><a class="nav-link" href="<?php echo $basePath; ?>/spp">Data SPP</a></li>
                                <li><a class="nav-link" href="<?php echo $basePath; ?>/petugas">Data Petugas</a></li>

                            </ul>
                        </li>

                    </ul>
                </aside>
            </div>
        </div>
    </div>
</body>