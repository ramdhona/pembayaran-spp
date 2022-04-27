<?php
include "../config.php";

//cek apakah tombol simpan sudah dikik ato belum
if (isset($_POST['simpan'])) {

    // ambil data dari edit.php

    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $id_petugas = $_POST['id_petugas'];




    //buat query update
    $sql = "UPDATE petugas SET nama_petugas='$nama_petugas', username='$username', password='$password', level='$level' WHERE id_petugas=$id_petugas";
    // echo $sql;
    // return;
    $query = mysqli_query($mysqli, $sql);

    //apakah query update berhasil?
    if ($query) {
        //kalo berhasil alihkan ke halaman index.php
        header('Location: index.php?aksi=edit&status=berhasil');
    } else {
        //kalo gagal tampilkan pesan di index.php
        header('Location: index.php?aksi=edit&status=gagal');
    }
} else {
    die("Akses Dilarang");
}