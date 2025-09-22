<?php
// Mulai session untuk menyimpan data login
session_start();
include '../../koneksi.php';
// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nisn = trim($_POST['nisn']);
    $password = $_POST['password'];

    // Validasi input, pastikan NISN dan password tidak kosong
    if (empty($nisn) || empty($password)) {
        echo "NISN dan Password harus diisi!";
        exit;
    }

    // Query untuk mencari pengguna berdasarkan NISN
    $sql = "SELECT * FROM murid WHERE nisn = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $nisn);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah NISN ditemukan di database
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verifikasi password dengan hash yang ada di database
        if (password_verify($password, $user['password'])) {
            // Login berhasil, set session
            $_SESSION['id'] = $user['id'];
            $_SESSION['nisn'] = $user['nisn'];
            $_SESSION['name'] = $user['name'];

            // Redirect ke halaman dashboard atau halaman setelah login
            header("Location: ../../../front/produk.php");
            exit;
        } else {
            // Password salah
            echo "Password salah!";
        }
    } else {
        // NISN tidak ditemukan
        echo "NISN tidak ditemukan!";
    }

    $stmt->close();
}

$koneksi->close();
?>