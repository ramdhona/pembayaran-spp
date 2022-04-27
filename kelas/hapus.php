<?php
include "../config.php";

if (isset($_GET['id'])) {

    //ambil nip dari query string
    $id_kelas = $_GET['id'];

    //buat query hapus
    $sql = "DELETE FROM kelas WHERE id_kelas=$id_kelas";
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