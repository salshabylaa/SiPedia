<?php
// Mengimpor file koneksi database
include 'koneksi.php';

// Ambil data dari form dengan validasi sederhana untuk menghindari error
// Menggunakan isset untuk memastikan variabel POST ada dan kemudian membersihkan input untuk menghindari SQL Injection
$name = isset($_POST['name']) ? $koneksi->real_escape_string($_POST['name']) : '';
$email = isset($_POST['email']) ? $koneksi->real_escape_string($_POST['email']) : '';
$message = isset($_POST['message']) ? $koneksi->real_escape_string($_POST['message']) : '';

// Periksa apakah semua input dari form diisi dengan benar
if (!empty($name) && !empty($email) && !empty($message)) {
    // Membuat query SQL untuk menyimpan data yang diambil dari form ke tabel 'kontak'
    $sql = "INSERT INTO kontakk (name, email, message) 
            VALUES ('$name', '$email', '$message')";

    // Mengeksekusi query SQL dan memeriksa apakah berhasil
    if ($koneksi->query($sql) === TRUE) {
        // Jika berhasil, dapatkan ID dari entri baru yang disimpan
        $last_id = $koneksi->insert_id;

        // Proses pengiriman email setelah data disimpan ke database
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil data dari form dan amankan dengan htmlspecialchars
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            // Persiapan email
            $to = "email@travelertimur.com";  // Ganti dengan alamat email Anda
            $subject = "Pesan dari Form Kontak"; // Subjek email
            $body = "Nama: $name\nEmail: $email\nPesan:\n$message"; // Isi email
            $headers = "From: $email"; // Header email

            // Kirim email dan tampilkan pesan sukses atau gagal
            if (mail($to, $subject, $body, $headers)) {
                echo "<div class='alert alert-success text-center mt-4'>Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda.</div>";
            } else {
                echo "<div class='alert alert-danger text-center mt-4'>Maaf, pesan Anda gagal dikirim. Silakan coba lagi nanti.</div>";
            }
        }

        exit(); // Menghentikan eksekusi skrip setelah melakukan redirect untuk memastikan tidak ada kode yang dieksekusi setelahnya
    } else {
        // Jika terjadi kesalahan dalam eksekusi query, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
} else {
    // Jika ada input yang kosong, tampilkan pesan peringatan kepada pengguna
    echo "Please fill all fields."; // Pesan sederhana yang menginformasikan pengguna bahwa semua field harus diisi
}

// Menutup koneksi ke database untuk membersihkan sumber daya
$koneksi->close();
?>
