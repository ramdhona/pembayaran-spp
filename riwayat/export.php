<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Pembayaran.xls");
    ?>

    <center>
        <h2>Data Pembayaran</h2>
        <div class="table-responsive">
            <div class="container">
                <table class="table table-bordered table-md " id="export">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Nama Petugas</th>
                            <th>Nisn</th>
                            <th>Tanggal Bayar</th>
                            <th>Nominal SPP</th>
                            <th>Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../config.php";
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

    </center>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>