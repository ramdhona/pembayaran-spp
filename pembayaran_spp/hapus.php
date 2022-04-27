<?php
include "../config.php";

if (isset($_GET['id_pembayaran'])) {

    //ambil nip dari query string
    $id_pembayaran = $_GET['id_pembayaran'];

    //buat query hapus
    $sql = "DELETE FROM pembayaran WHERE id_pembayaran='$id_pembayaran'";
    // echo $sql;
    // return;

    $query = mysqli_query($mysqli, $sql);

    //apakah query hapus berhasil ato tidak
    if ($query) {
        header('Location: index.php?aksi=hapus&status=berhasil');
    } else {
        header('Location: index.php?aksi=hapus&status=gagal');
    }
} else {
    die("akses dilarang");
}