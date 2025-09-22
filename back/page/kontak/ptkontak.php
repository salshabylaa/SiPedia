<?php
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $no_hp = isset($_POST['no_hp']) ? trim($_POST['no_hp']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $pesan = isset($_POST['pesan']) ? trim($_POST['pesan']) : '';

    if (empty($nama) || empty($no_hp) || empty($email) || empty($pesan)) {
        die("Error: Semua kolom harus diisi!");
    }

    $stmt = $koneksi->prepare("INSERT INTO kontak (nama, no_hp, email, pesan) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $nama, $no_hp, $email, $pesan);  

    if ($stmt->execute()) {
        header('Location: ../../../front/kontak.php');
        exit(); 
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$koneksi->close();
?>