<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "projek1";
    $koneksi = mysqli_connect($host, $user, $pass, $database);

    // Periksa koneksi
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    } else {
        echo "";
    }
?>
