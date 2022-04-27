<?php
include '../header.php';
//kalo tidak ada ID_kelas di query string
if (!isset($_GET['id_spp'])) {
    header('location:index.php');
}

//ambil nip dari query string
$id_spp = $_GET['id_spp'];

//buat query untuk ambil data dari database
$sql = "SELECT * FROM spp WHERE id_spp=$id_spp";
$query = mysqli_query($mysqli, $sql);
$spp = mysqli_fetch_assoc($query);

//jika data yang diedit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan");
}
?>

<!-- Main Content -->
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-header">
            <h1>Data SPP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo $basePath; ?>/index.php">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item"><a href="<?php echo $basePath; ?>/spp/">Data SPP</a></div>
                <div class="breadcrumb-item">Edit SPP</div>

            </div>
        </div>

        <form action="proses_edit.php" method="POST">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Data SPP</h4>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Tahun Ajaran</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control phone-number"
                                                            name="tahun" value="<?php echo $spp['tahun'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nominal</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control phone-number"
                                                            name="nominal" value="<?php echo $spp['nominal'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <input type="hidden" name="id_spp" value="<?php echo $spp['id_spp']; ?>">
                                            <input type="submit" class="btn btn-success" value="Simpan" name="simpan" />
                                        </p>




                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer text-right">

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>


<?php
include '../footer.php';
?>