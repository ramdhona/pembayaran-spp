<?php
include "../config.php";

if (isset($_GET['id'])) {

    //ambil nip dari query string
    $id_spp = $_GET['id'];

    //buat query hapus
    $sql = "DELETE FROM spp WHERE id_spp=$id_spp";
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