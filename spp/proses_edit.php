<?php
include "../config.php";

//cek apakah tombol simpan sudah dikik ato belum
if (isset($_POST['simpan'])) {

    // ambil data dari edit.php

    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];
    $id_spp = $_POST['id_spp'];


    //buat query update
    $sql = "UPDATE spp SET tahun='$tahun', nominal='$nominal' WHERE id_spp=$id_spp";
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