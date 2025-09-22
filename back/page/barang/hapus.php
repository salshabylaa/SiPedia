<?php

include '../../koneksi.php';

if( isset($_GET['id']) && is_numeric($_GET['id']) ){

    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM barang WHERE no_barang= $id";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: barang.php');
        exit;
    } else {
        die("Gagal menghapus data...");
    }

} else {
    die("Akses dilarang...");
}

?>