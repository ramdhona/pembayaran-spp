<?php
include "../config.php";

//cek apakah tombol simpan sudah dikik ato belum
if (isset($_POST['simpan'])) {

    // ambil data dari edit.php

    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];
    $id_kelas = $_POST['id_kelas'];


    //buat query update
    $sql = "UPDATE kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas=$id_kelas";
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