<?php
include '../../koneksi.php';

if( isset($_GET['id']) && is_numeric($_GET['id']) ){
    $id = $_GET['id'];

    $sql = "DELETE FROM kontak WHERE id= $id";
    $query = mysqli_query($koneksi, $sql);

    if($query) {
        header('Location: kontak.php');
        exit;
    } else {
        die("Gagal menghapus data...");
    }
} else {
    die("Akses Dilarang...");
}

?>