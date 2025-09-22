<?php
session_start();
include 'koneksi.php';
// Inisialisasi variabel
$email = $password = "";
$email_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Email is required.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validasi password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Password is required.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Jika tidak ada error validasi, lanjutkan proses login
    if (empty($email_err) && empty($password_err)) {
        // Mempersiapkan query untuk memeriksa email dan password
        $sql = "SELECT id_admin, email, password FROM admin WHERE email = ?";

        if ($stmt = $koneksi->prepare($sql)) {
            // Mengikat parameter
            $stmt->bind_param("s", $email);

            // Menjalankan query
            if ($stmt->execute()) {
                // Menyimpan hasil
                $stmt->store_result();

                // Memeriksa apakah email ditemukan
                if ($stmt->num_rows == 1) {
                    // Mengikat hasil ke variabel
                    $stmt->bind_result($id, $email_db, $password_db);

                    if ($stmt->fetch()) {
                        // Memeriksa password
                        if ($password === $password_db) { 
                            // Password benar, login sukses
                            session_start();
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email_db;
                            header("location: index.php");
                        } else {
                            $password_err = "The password you entered was not correct.";
                        }
                    }
                } else {
                    $email_err = "No account found with that email.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Menutup statement
            $stmt->close();
        }
    } 
}
?>