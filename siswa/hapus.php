<?php
include "../config.php";

if (isset($_GET['nisn'])) {

    //ambil nip dari query string
    $nisn = $_GET['nisn'];

    //buat query hapus
    $sql = "DELETE FROM siswa WHERE nisn='$nisn'";
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