<?php
include "../config.php";

//cek tombol tambah sudah diklik ato belum ?
if (isset($_POST['tambah'])) {

    //ambil data dari tambah.php
    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];

    //Buat Query untuk menambahkan data
    $sql = "INSERT INTO kelas (nama_kelas,kompetensi_keahlian) VALUES ('$nama_kelas','$kompetensi_keahlian')";

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