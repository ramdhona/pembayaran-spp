<?php
include '../header.php';
?>

<!-- Main Content -->
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-header">
            <h1>Data Petugas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo $basePath; ?>/index.php">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item">Data Petugas</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Petugas</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?php echo $basePath; ?>/petugas/tambah.php" class="btn btn-success  mb-3"
                            role="button" aria-pressed="true">Tambah Petugas</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md" id="petugas">
                                <thead>
                                    <tr style="background-color: #6777EF;">
                                        <th class="text-white">ID</th>
                                        <th class="text-white">Nama Petugas</th>
                                        <th class="text-white">Username</th>
                                        <th class="text-white">Password</th>
                                        <th class="text-white">Level</th>
                                        <th class="text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php

                                        $sql = "SELECT * FROM petugas";
                                        $query = mysqli_query($mysqli, $sql);
                                        $nomor = 1;
                                        while ($petugas = mysqli_fetch_array($query)) {
                                        ?>
                                        <td><?php echo $petugas['id_petugas']; ?></td>
                                        <td><?php echo $petugas['nama_petugas']; ?></td>
                                        <td><?php echo $petugas['username']; ?></td>
                                        <td><?php echo $petugas['password']; ?></td>
                                        <td><?php echo $petugas['level']; ?></td>

                                        <td>
                                            <a href="<?php echo $basePath; ?>/petugas/edit.php?id_petugas=<?php echo $petugas['id_petugas']; ?>"
                                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="#" onClick="hapus(<?php echo $petugas['id_petugas']; ?>)"
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
    $("#petugas").DataTable();
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
            window.location = "hapus.php?id=" + id
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