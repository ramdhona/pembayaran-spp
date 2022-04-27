<?php
include "../config.php";

//cek apakah tombol simpan sudah dikik ato belum
if (isset($_POST['simpan'])) {

    // ambil data dari edit.php

    $petugas = $_POST['petugas'];
    $siswa = $_POST['siswa'];
    $tanggal_bayar = $_POST['tanggal_bayar'];
    $bulan_bayar = $_POST['bulan_bayar'];
    $tahun_bayar = $_POST['tahun_bayar'];
    $spp = $_POST['spp'];
    $jumlah_bayar = $_POST['jumlah_bayar'];
    $id_pembayaran = $_POST['id_pembayaran'];



    //buat query update
    $sql = "UPDATE pembayaran  SET id_petugas='$petugas', nisn='$siswa', tgl_bayar='$tanggal_bayar', bulan_dibayar='$bulan_bayar', tahun_dibayar='$tahun_bayar', id_spp='$spp', jumlah_bayar='$jumlah_bayar' WHERE id_pembayaran=$id_pembayaran";
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