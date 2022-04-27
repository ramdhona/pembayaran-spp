<?php
include '../header.php';
?>

<!-- Main Content -->
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-header">
            <h1>Pembayaran SPP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo $basePath; ?>/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo $basePath; ?>/pembayaran_spp">Pembayaran SPP</a></div>
                <div class="breadcrumb-item">Tambah Data</div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data</h4>
                    </div>
                    <form action="proses_tambah.php" method="POST">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nama Petugas</label>
                                                    <select class="form-control select2" name="petugas">
                                                        <option value="">Pilih Petugas</option>
                                                        <?php
                                                        $sql = "SELECT * FROM petugas";
                                                        $query = mysqli_query($mysqli, $sql);
                                                        $nomor = 1;
                                                        while ($petugas = mysqli_fetch_array($query)) {
                                                        ?>
                                                        <option value="<?php echo $petugas['id_petugas']; ?>">
                                                            <?php echo $petugas['nama_petugas']; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nisn - Nama Siswa</label>
                                                    <select class="form-control select2" name="siswa">
                                                        <option value="">Pilih Siswa</option>
                                                        <?php
                                                        $sql = "SELECT * FROM siswa INNER JOIN spp ON siswa.id_spp = spp.id_spp";
                                                        $query = mysqli_query($mysqli, $sql);
                                                        $nomor = 1;
                                                        while ($siswa = mysqli_fetch_array($query)) {
                                                        ?>
                                                        <option value="<?php echo $siswa['nisn']; ?>"
                                                            data-spp="<?php echo $siswa['nominal'] ?>">
                                                            <?php echo $siswa['nisn'] . ' - ' . $siswa['nama']; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Tanggal Bayar</label>
                                                    <div class="input-group">

                                                        <input type="date" class="form-control phone-number"
                                                            placeholder="Tanggal Bayar" name="tanggal_bayar">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="level">Bulan Bayar</label>
                                                    <select class="form-control" id="bulan_bayar" name="bulan_bayar">
                                                        <option value="">Pilih Bulan</option>
                                                        <option>Januari</option>
                                                        <option>Febuari</option>
                                                        <option>Maret</option>
                                                        <option>April</option>
                                                        <option>Mei</option>
                                                        <option>Juni</option>
                                                        <option>Juli</option>
                                                        <option>Agustus</option>
                                                        <option>September</option>
                                                        <option>Oktober</option>
                                                        <option>November</option>
                                                        <option>Desember</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="level">Tahun Bayar</label>
                                                    <select class="form-control" id="tahun_bayar" name="tahun_bayar">
                                                        <option value="">Pilih Tahun</option>
                                                        <option>2021</option>
                                                        <option>2022</option>
                                                        <option>2023</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nominal SPP</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control phone-number"
                                                            placeholder="Nomianl SPP" name="spp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label> Jumlah Bayar</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control phone-number"
                                                            placeholder="Jumlah Bayar" name="jumlah_bayar">
                                                    </div>
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
<script>
$('select[name=siswa]').change(function() {
    const nominal = $(this).find('option:selected').data('spp');

    $("input[name=spp]").val(nominal);
    $("input[name=jumlah_bayar]").val(nominal);
})
</script>

<?php
include '../footer.php';
?>