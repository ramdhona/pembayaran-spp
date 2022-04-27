<?php
include "../config.php";

//cek tombol tambah sudah diklik ato belum ?
if (isset($_POST['tambah'])) {

    //ambil data dari tambah.php
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $spp = $_POST['spp'];

    //Buat Query untuk menambahkan data
    $sql = "INSERT INTO siswa (nisn,nis,nama,id_kelas,alamat,no_telp,id_spp) VALUES ('$nisn','$nis','$nama','$kelas','$alamat','$no_telp','$spp')";

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