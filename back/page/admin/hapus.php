<?php

include '../../koneksi.php';

if( isset($_GET['id']) && is_numeric($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM admin WHERE id_admin = $id";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: admin.php');
        exit;
    } else {
        die("Gagal menghapus data...");
    }

} else {
    die("Akses dilarang...");
}

?>