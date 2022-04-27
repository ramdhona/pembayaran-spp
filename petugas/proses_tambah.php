<?php
include "../config.php";

//cek tombol tambah sudah diklik ato belum ?
if (isset($_POST['tambah'])) {

    //ambil data dari tambah.php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];


    //Buat Query untuk menambahkan data
    $sql = "INSERT INTO petugas (username,password,nama_petugas,level ) VALUES ('$username','$password','$nama_petugas','$level')";

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