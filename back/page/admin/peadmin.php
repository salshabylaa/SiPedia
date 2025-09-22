<?php

include '../../koneksi.php';

// untuk mengecek apakah tombol simpan sudah diklik atau blum
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id_admin'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    // buat query update
    $sql = "UPDATE admin SET nama='$nama', email='$email' WHERE id_admin=$id";
    $query = mysqli_query($koneksi, $sql);

    // mengecek apakah query update berhasil
    if( $query ) {
        // kalau berhasil alihkan ke halaman admin.php
        header('Location: admin.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>