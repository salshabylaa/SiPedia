<?php
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = isset($_POST['nip']) ? trim($_POST['nip']) : '';
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (empty($nip) || empty($nama) || empty($email) || empty($_POST['password'])) {
        die("Error: Semua kolom harus diisi!");
    }

    $stmt = $koneksi->prepare("INSERT INTO guru (nip, nama, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nip, $nama, $email, $password);

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