<?php
include "../config.php";

//cek apakah tombol simpan sudah dikik ato belum
if (isset($_POST['simpan'])) {

    // ambil data dari edit.php

    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $spp = $_POST['spp'];


    //buat query update
    $sql = "UPDATE siswa SET nisn='$nisn', nis='$nis', nama='$nama', id_kelas='$kelas', alamat='$alamat', no_telp='$no_telp', id_spp='$spp' WHERE nisn=$nisn";
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