<?php
include '../header.php';

//kalo tidak ada ID_kelas di query string
if (!isset($_GET['nisn'])) {
    header('location:index.php');
}

//ambil nip dari query string
$nisn = $_GET['nisn'];

//buat query untuk ambil data dari database
$sql = "SELECT * FROM siswa WHERE nisn=$nisn";
$query = mysqli_query($mysqli, $sql);
$siswa = mysqli_fetch_assoc($query);

//jika data yang diedit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan");
}
?>

<!-- Main Content -->
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-header">
            <h1>Data Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo $basePath; ?>/index.php">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item"><a href="<?php echo $basePath; ?>/siswa/">Data Siswa</a></div>
                <div class="breadcrumb-item">Edit Siswa</div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Siswa</h4>
                    </div>
                    <form action="proses_edit.php" method="POST">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label> NISN</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control phone-number" name="nisn"
                                                            value="<?php echo $siswa['nisn'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label> NIS</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control phone-number" name="nis"
                                                            value="<?php echo $siswa['nis'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nama Lengkap</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control phone-number" name="nama"
                                                            value="<?php echo $siswa['nama'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label> Kelas</label>
                                                    <select class="form-control select2" name="kelas">
                                                        <?php
                                                        $sql = "SELECT * FROM kelas";
                                                        $query = mysqli_query($mysqli, $sql);
                                                        $nomor = 1;
                                                        while ($kelas = mysqli_fetch_array($query)) {
                                                        ?>
                                                        <option value="<?php echo $kelas['id_kelas']; ?>" <?php if ($kelas['id_kelas'] == $siswa['id_kelas']) {
                                                                                                                    echo 'selected';
                                                                                                                } ?>>
                                                            <?php echo $kelas['nama_kelas']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control"
                                                        name="alamat"><?php echo $siswa['alamat'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label> No Telphone</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control phone-number"
                                                            name="no_telp" value="<?php echo $siswa['no_telp'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>SPP Tahun</label>
                                                    <select class="form-control select2" name="spp">
                                                        <?php
                                                        $sql = "SELECT * FROM spp";
                                                        $query = mysqli_query($mysqli, $sql);
                                                        $nomor = 1;
                                                        while ($spp = mysqli_fetch_array($query)) {
                                                        ?>
                                                        <option value="<?php echo $spp['id_spp']; ?>" <?php if ($spp['id_spp'] == $siswa['id_spp']) {
                                                                                                                echo 'selected';
                                                                                                            } ?>>
                                                            <?php echo $spp['tahun'] . ' - ' . $spp['nominal']; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <input type="hidden" name="nisn" value="<?php echo $siswa['nisn']; ?>">
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