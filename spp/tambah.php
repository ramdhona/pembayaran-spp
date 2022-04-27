<?php
include '../header.php';
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
                <div class="breadcrumb-item">Tambah SPP</div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data SPP</h4>
                    </div>
                    <form action="proses_tambah.php" method="POST">
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
                                                            name="tahun" placeholder="Tahun Ajaran">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nominal</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control phone-number"
                                                            name="nominal" placeholder="Nominal">
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


<?php
include '../footer.php';
?>