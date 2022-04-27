<?php
include '../header.php';
?>





<!-- Main Content -->
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-header">
            <h1>Riwayat Pembayaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo $basePath; ?>/index.php">Dashboard</a></div>
                <div class="breadcrumb-item">Riwayat Pembayaran</div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Riwayat Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <a target="_blank" href="<?php echo $basePath; ?>/riwayat/export.php"
                            class="btn btn-success  mb-3" role="button" aria-pressed="true"><i
                                class="fas fa-file-export mr-2"></i> Export</a>
                        <a target="_blank" href="<?php echo $basePath; ?>/riwayat/print.php"
                            class="btn btn-primary  mb-3" role="button" aria-pressed="true"><i
                                class="fas fa-print mr-2"></i>Print PDF</a>


                        <div class="table-responsive">
                            <table class="table table-bordered table-md " id="riwayat">
                                <thead>
                                    <tr style="background-color: #6777EF;">
                                        <th style="color: white;">ID</th>
                                        <th style="color: white;">Nama Petugas</th>
                                        <th style="color: white;">Nisn</th>
                                        <th style="color: white;">Tanggal Bayar</th>
                                        <th style="color: white;">Nominal SPP</th>
                                        <th style="color: white;">Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT pembayaran.*,petugas.nama_petugas FROM pembayaran INNER JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas";
                                    $query = mysqli_query($mysqli, $sql);
                                    $nomor = 1;
                                    while ($pembayaran = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $pembayaran['id_pembayaran']; ?></td>
                                        <td><?php echo $pembayaran['nama_petugas']; ?></td>
                                        <td><?php echo $pembayaran['nisn']; ?></td>
                                        <td><?php echo $pembayaran['tgl_bayar']; ?></td>
                                        <td><?php echo $pembayaran['id_spp']; ?></td>
                                        <td><?php echo $pembayaran['jumlah_bayar']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<script>
</script>


<script>
$(document).ready(function() {
    $("#riwayat").DataTable();
});
</script>
<script>

</script>




<?php
include '../footer.php';
?>