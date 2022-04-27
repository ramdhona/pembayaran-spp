<?php
include '../header.php';

//kalo tidak ada ID_kelas di query string
if (!isset($_GET['id_petugas'])) {
    header('location:index.php');
}

//ambil nip dari query string
$id_petugas = $_GET['id_petugas'];

//buat query untuk ambil data dari database
$sql = "SELECT * FROM petugas WHERE id_petugas=$id_petugas";
$query = mysqli_query($mysqli, $sql);
$petugas = mysqli_fetch_assoc($query);

//jika data yang diedit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan");
}
?>

<!-- Main Content -->
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-header">
            <h1>Data Petugas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo $basePath; ?>/index.php">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item"><a href="<?php echo $basePath; ?>/petugas/">Data Petugas</a></div>
                <div class="breadcrumb-item">Edit Petugas</div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Petugas</h4>
                    </div>

                    <form action="proses_edit.php" method="POST">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nama Petugas</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control phone-number"
                                                            name="nama_petugas"
                                                            value="<?php echo $petugas['nama_petugas'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control phone-number"
                                                            name="username" value="<?php echo $petugas['username'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <div class="input-group">

                                                        <input type="password" class="form-control phone-number"
                                                            name="password" value="<?php echo $petugas['password'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Level</label>
                                                    <?php $level = $petugas['level']; ?>
                                                    <select class="form-control" name="level">
                                                        <option <?php echo ($level == 'petugas') ? "selected" : "" ?>>
                                                            Petugas</option>
                                                        <option <?php echo ($level == 'admin') ? "selected" : "" ?>>
                                                            Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <input type="hidden" name="id_petugas"
                                                value="<?php echo $petugas['id_petugas']; ?>">
                                            <input type="submit" class="btn btn-success" value="Simpan" name="simpan" />
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                    <div class="card-footer text-right">

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php
include '../footer.php';
?>