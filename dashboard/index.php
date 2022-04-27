<?php
include '../header.php';

$sql = "SELECT COUNT(*) AS jumlah_petugas FROM petugas";
$query = mysqli_query($mysqli, $sql);
$jumlah_petugas = mysqli_fetch_assoc($query)['jumlah_petugas'];

$sql = "SELECT COUNT(*) AS jumlah_siswa FROM siswa";
$query = mysqli_query($mysqli, $sql);
$jumlah_siswa = mysqli_fetch_assoc($query)['jumlah_siswa'];

$sql = "SELECT COUNT(*) AS jumlah_kelas FROM kelas";
$query = mysqli_query($mysqli, $sql);
$jumlah_kelas = mysqli_fetch_assoc($query)['jumlah_kelas'];
?>


<!-- Main Content -->
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>

        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Petugas</h4>
                            </div>
                            <div class="card-body">
                                <?php echo $jumlah_petugas; ?> Orang
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Siswa</h4>
                            </div>
                            <div class="card-body">
                                <?php echo $jumlah_siswa; ?> Siswa
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-school"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Kelas</h4>
                            </div>
                            <div class="card-body">
                                <?php echo $jumlah_kelas; ?> Kelas
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
</div>

<?php
include '../footer.php';
?>