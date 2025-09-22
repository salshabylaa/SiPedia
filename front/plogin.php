<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); // Untuk menampilkan semua error

session_start();

include '../back/koneksi.php';

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Cek data di tabel guru
    $cek_guru = mysqli_query($koneksi, "SELECT * FROM guru WHERE email='$email'");
    if (!$cek_guru) {
        die("Query gagal: " . mysqli_error($koneksi)); // Error jika query gagal
    }
    $dt_guru = mysqli_fetch_assoc($cek_guru);

    // Cek data di tabel murid
    $cek_murid = mysqli_query($koneksi, "SELECT * FROM murid WHERE email='$email'");
    if (!$cek_murid) {
        die("Query gagal: " . mysqli_error($koneksi)); // Error jika query gagal
    }
    $dt_murid = mysqli_fetch_assoc($cek_murid);

    // Verifikasi login sebagai guru
    if ($dt_guru && $dt_guru['password'] === $password) {
        $_SESSION['user_type'] = 'guru';
        $_SESSION['user_email'] = $dt_guru['email'];
        $_SESSION['user_id'] = $dt_guru['id_guru'];
        $_SESSION['user_nip'] = $dt_guru['nip'];
        $_SESSION['user_nama'] = $dt_guru['nama'];

        echo "<script type='text/javascript'> alert('Login Berhasil sebagai Guru!'); window.location = 'pemesanan.php'; </script>";
        exit;

    // Verifikasi login sebagai murid
    } elseif ($dt_murid && $dt_murid['password'] === $password) {
        $_SESSION['user_type'] = 'murid';
        $_SESSION['user_email'] = $dt_murid['email'];
        $_SESSION['user_id'] = $dt_murid['id_murid'];
        $_SESSION['user_nisn'] = $dt_murid['nisn'];
        $_SESSION['user_nama'] = $dt_murid['nama'];

        echo "<script type='text/javascript'> alert('Login Berhasil sebagai Murid!'); window.location = 'pemesanan.php'; </script>";
        exit;

    } else {
        // Jika login gagal
        echo "<script type='text/javascript'> alert('Login Gagal! Email atau Password salah.'); window.location = 'login.php'; </script>";
        exit;
    }
}
?>
