<?php
include '../header.php';
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
                <div class="breadcrumb-item">Tambah Siswa</div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data Siswa</h4>
                    </div>
                    <form action="proses_tambah.php" method="POST">
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
                                                            placeholder="NISN">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label> NIS</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control phone-number" name="nis"
                                                            placeholder="NIS">
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
                                                            placeholder="Nama Lengkap">
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
                                                        <option value="<?php echo $kelas['id_kelas']; ?>">
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
                                                    <textarea class="form-control" placeholder="Alamat Lengkap"
                                                        name="alamat"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label> No Telphone</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control phone-number"
                                                            name="no_telp" placeholder="Nomor Telephone">
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
                                                        <option value="<?php echo $spp['id_spp']; ?>">
                                                            <?php echo $spp['tahun'] . ' - ' . $spp['nominal']; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <input type="submit" class="btn btn-success" value="Tambah" name="tambah" />
                                            <button type="reset" class="btn btn-danger">Reset</button>
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