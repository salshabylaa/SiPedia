<?php
include '../../koneksi.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    $role = $_POST['role'];

    if ($password !== $password_confirmation) {
        header('Location: tambah.php?status=error&message=Password dan konfirmasi tidak cocok!');
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO admin (nama, email, password, role) VALUES ('$nama', '$email', '$hashedPassword', '$role')";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        header('Location: tambah.php?status=sukses&message=Admin berhasil ditambahkan!');
    } else {
        header('Location: tambah.php?status=error&message=Gagal menambahkan admin!');
    }
} else {
    die("Akses tidak valid.");
}
?>