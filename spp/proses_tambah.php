<?php
include "../config.php";

//cek tombol tambah sudah diklik ato belum ?
if (isset($_POST['tambah'])) {

    //ambil data dari tambah.php
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];

    //Buat Query untuk menambahkan data
    $sql = "INSERT INTO spp (tahun,nominal) VALUES ('$tahun','$nominal')";

    $query = mysqli_query($mysqli, $sql);

    // Cek apakah Query simpan data berhasil ?
    if ($query) {
        //jika berhasil alihkan ke index.php dengan status = sukses
        header('location: index.php?aksi=tambah_data&status=berhasil');
    } else {
        // kalo gagal tetap tampilkan ke index.php dengan status = gagal
        header('Location: index.php?aksi=tambah_data&status=gagal');
    }
} else {
    die("Akses Dilarang");
}