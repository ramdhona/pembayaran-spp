<?php
include '../header.php';

//kalo tidak ada ID_kelas di query string
if (!isset($_GET['id_pembayaran'])) {
    header('location:index.php');
}

//ambil nip dari query string
$id_pembayaran = $_GET['id_pembayaran'];

//buat query untuk ambil data dari database
$sql = "SELECT * FROM pembayaran WHERE id_pembayaran=$id_pembayaran";
$query = mysqli_query($mysqli, $sql);
$pembayaran = mysqli_fetch_assoc($query);

//jika data yang diedit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan");
}
?>

<!-- Main Content -->
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-header">
            <h1>Pembayaran SPP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo $basePath; ?>/index.php">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo $basePath; ?>/pembayaran_spp/">Pembayaran SPP</a></div>
                <div class="breadcrumb-item">Edit Data</div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Pembayaran</h4>
                    </div>
                    <form action="proses_edit.php" method="POST">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label> Nama Petugas</label>
                                                    <select class="form-control select2" name="petugas">
                                                        <option value="">Pilih Petugas</option>
                                                        <?php
                                                        $sql = "SELECT * FROM petugas";
                                                        $query = mysqli_query($mysqli, $sql);
                                                        $nomor = 1;
                                                        while ($petugas = mysqli_fetch_array($query)) {
                                                        ?>
                                                        <option value="<?php echo $petugas['id_petugas']; ?>"
                                                            <?php if ($petugas['id_petugas'] == $pembayaran['id_petugas']) {
                                                                                                                        echo 'selected';
                                                                                                                    } ?>>
                                                            <?php echo $petugas['nama_petugas']; ?></option>
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
                                                        <option value="<?php echo $siswa['nisn']; ?>" <?php if ($siswa['nisn'] == $pembayaran['nisn']) {
                                                                                                                echo 'selected';
                                                                                                            } ?>
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
                                                            name="tanggal_bayar"
                                                            value="<?php echo $pembayaran['tgl_bayar'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Bulan Bayar</label>
                                                    <?php $bulan_dibayar = $pembayaran['bulan_dibayar']; ?>
                                                    <select class="form-control" name="bulan_bayar">
                                                        <option value="">Pilih Bulan</option>
                                                        <option
                                                            <?php echo ($bulan_dibayar == 'Januari') ? "selected" : "" ?>>
                                                            Januari</option>
                                                        <option
                                                            <?php echo ($bulan_dibayar == 'Febuari') ? "selected" : "" ?>>
                                                            Febuari</option>
                                                        <option
                                                            <?php echo ($bulan_dibayar == 'Maret') ? "selected" : "" ?>>
                                                            Maret</option>
                                                        <option
                                                            <?php echo ($bulan_dibayar == 'April') ? "selected" : "" ?>>
                                                            April</option>
                                                        <option
                                                            <?php echo ($bulan_dibayar == 'Mei') ? "selected" : "" ?>>
                                                            Mei</option>
                                                        <option
                                                            <?php echo ($bulan_dibayar == 'Juni') ? "selected" : "" ?>>
                                                            Juni</option>
                                                        <option
                                                            <?php echo ($bulan_dibayar == 'Juli') ? "selected" : "" ?>>
                                                            Juli</option>
                                                        <option
                                                            <?php echo ($bulan_dibayar == 'Agustus') ? "selected" : "" ?>>
                                                            Agustus</option>
                                                        <option
                                                            <?php echo ($bulan_dibayar == 'September') ? "selected" : "" ?>>
                                                            September</option>
                                                        <option
                                                            <?php echo ($bulan_dibayar == 'Oktober') ? "selected" : "" ?>>
                                                            Oktober</option>
                                                        <option
                                                            <?php echo ($bulan_dibayar == 'November') ? "selected" : "" ?>>
                                                            November</option>
                                                        <option
                                                            <?php echo ($bulan_dibayar == 'Desember') ? "selected" : "" ?>>
                                                            Desember</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="level">Tahun Bayar</label>
                                                    <?php $tahun_dibayar = $pembayaran['tahun_dibayar']; ?>
                                                    <select class="form-control" name="tahun_bayar">
                                                        <option value="">Pilih Tahun</option>
                                                        <option
                                                            <?php echo ($tahun_dibayar == '2021') ? "selected" : "" ?>>
                                                            2021</option>
                                                        <option
                                                            <?php echo ($tahun_dibayar == '2022') ? "selected" : "" ?>>
                                                            2022</option>
                                                        <?php echo ($tahun_dibayar == '2023') ? "selected" : "" ?>>
                                                        2023</option>
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
                                                            placeholder="Jumlah Bayar" name="spp"
                                                            value="<?php echo $pembayaran['id_spp'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label> Jumlah Bayar</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control phone-number"
                                                            placeholder="Jumlah Bayar" name="jumlah_bayar"
                                                            value="<?php echo $pembayaran['jumlah_bayar'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <p>
                                            <input type="hidden" name="id_pembayaran"
                                                value="<?php echo $pembayaran['id_pembayaran']; ?>">
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