<?php
include "../config.php";

//cek tombol tambah sudah diklik ato belum ?
if (isset($_POST['tambah'])) {

    //ambil data dari tambah.php
    $petugas = $_POST['petugas'];
    $siswa = $_POST['siswa'];
    $tanggal_bayar = $_POST['tanggal_bayar'];
    $bulan_bayar = $_POST['bulan_bayar'];
    $tahun_bayar = $_POST['tahun_bayar'];
    $spp = $_POST['spp'];
    $jumlah_bayar = $_POST['jumlah_bayar'];

    //Buat Query untuk menambahkan data
    $sql = "INSERT INTO pembayaran (id_petugas,nisn,tgl_bayar,bulan_dibayar,tahun_dibayar,id_spp,jumlah_bayar ) VALUES ('$petugas','$siswa','$tanggal_bayar','$bulan_bayar','$tahun_bayar','$spp','$jumlah_bayar')";
    // echo $sql;
    // return;
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