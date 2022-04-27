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
                <div class="breadcrumb-item">Data Siswa</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Siswa</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?php echo $basePath; ?>/siswa/tambah.php" class="btn btn-success  mb-3" role="button"
                            aria-pressed="true">Tambah Siswa</a>

                        <div class="table-responsive">
                            <table class="table table-bordered table-md" id="siswa">
                                <thead style="background-color: #6777EF;">
                                    <tr>
                                        <th class="text-white">NISN</th>
                                        <th class="text-white">NIS</th>
                                        <th class="text-white">Nama Lengkap</th>
                                        <th class="text-white">Kelas</th>
                                        <th class="text-white">Alamat</th>
                                        <th class="text-white">No Telp</th>

                                        <th class="text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = "SELECT siswa.*,kelas.nama_kelas FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas ";
                                    $query = mysqli_query($mysqli, $sql);
                                    $nomor = 1;
                                    while ($siswa = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>

                                        <td><?php echo $siswa['nisn']; ?></td>
                                        <td><?php echo $siswa['nis']; ?></td>
                                        <td><?php echo $siswa['nama']; ?></td>
                                        <td><?php echo $siswa['nama_kelas']; ?></td>
                                        <td><?php echo $siswa['alamat']; ?></td>
                                        <td><?php echo $siswa['no_telp']; ?></td>

                                        <td>
                                            <a href="<?php echo $basePath; ?>/siswa/edit.php?nisn=<?php echo $siswa['nisn']; ?>"
                                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="#" onClick="hapus('<?php echo $siswa['nisn']; ?>')"
                                                class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </td>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
<script>
$(document).ready(function() {
    $("#siswa").DataTable();
});
</script>

<script>
function hapus(id) {

    Swal.fire({
        title: 'Apkah Anda Yakin?',
        text: "Untuk menghapus data ini",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus aja!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "hapus.php?nisn=" + id
        }
    })

}

<?php
    if (!empty($_GET['status'])) {

        $pesan = "";
        switch ($_GET['aksi']) {
            case 'tambah_data':
                $pesan = "Tambah data";
                break;
            case 'edit':
                $pesan = "Edit data";
                break;
            case 'hapus':
                $pesan = "hapus data";
                break;
            default:
                # code...
                break;
        }


        if ($_GET['status'] == 'berhasil') {
            echo "Swal.fire(
                    'Success!',
                    '$pesan berhasil dilakukan',
                    'success'
                  )";
        } else {
            echo "tida";
        }
    }
    ?>
</script>

<?php
include '../footer.php';
?>