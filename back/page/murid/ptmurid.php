<?php
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nisn = isset($_POST['nisn']) ? trim($_POST['nisn']) : '';
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $tanggal_lahir = isset($_POST['tanggal_lahir']) ? trim($_POST['tanggal_lahir']) : '';  

    if (empty($nisn) || empty($nama) || empty($email) || empty($password) || empty($tanggal_lahir)) {
        die("Error: Semua kolom harus diisi!");
    }

    $stmt = $koneksi->prepare("INSERT INTO murid (nisn, nama, email, password, ttl) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nisn, $nama, $email, $password, $tanggal_lahir);  

    if ($stmt->execute()) {
        header("Location: ../../../front/inforegis.php");
        exit(); 
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$koneksi->close();
?>