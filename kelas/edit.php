<?php
include '../header.php';

//kalo tidak ada ID_kelas di query string
if (!isset($_GET['id_kelas'])) {
    header('location:index.php');
}

//ambil nip dari query string
$id_kelas = $_GET['id_kelas'];

//buat query untuk ambil data dari database
$sql = "SELECT * FROM kelas WHERE id_kelas=$id_kelas";
$query = mysqli_query($mysqli, $sql);
$kelas = mysqli_fetch_assoc($query);

//jika data yang diedit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan");
}
?>

<!-- Main Content -->
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-header">
            <h1>Data Kelas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo $basePath; ?>/index.php">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item"><a href="<?php echo $basePath; ?>/kelas/">Data Kelas</a></div>
                <div class="breadcrumb-item">Edit Kelas</div>

            </div>
        </div>

        <form action="proses_edit.php" method="POST">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Data Kelas</h4>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Kelas</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control phone-number"
                                                            name="nama_kelas"
                                                            value="<?php echo $kelas['nama_kelas'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Kompetensi Keahlian</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control phone-number"
                                                            name="kompetensi_keahlian"
                                                            value="<?php echo $kelas['kompetensi_keahlian'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <input type="hidden" name="id_kelas"
                                                value="<?php echo $kelas['id_kelas']; ?>">
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