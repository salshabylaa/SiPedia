<?php
include '../back/koneksi.php';

// Query untuk mengambil data barang dari tabel barang
$query = "SELECT * FROM barang";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link rel="icon" href="Gambar/logosmpfata.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .navbar {
            color: black;
        }
        .navbar .nav-link {
            color: white;
        }
        .navbar .nav-link:hover {
            color: black;
            background-color: yellow;
        }
        .header {
            background-image: url('Gambar/kopsmpfata.png');
            background-size: cover;
            background-position: center;
            text-align: center;
            padding: 50px 0;
        }
        .card img {
            max-width: 100%;
            height: auto;
        }
        .btn-custom {
            background-color: #00164f;
            color: white;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-custom:hover {
            background-color: yellow;
            color: black;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            background-color: #0e122a;
            color: white;
        }
        .footer-section a {
            color: #55acee;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="header text-center text-white py-5">
        <br><br>
    </div>

    <nav class="navbar navbar-expand-lg" style="background-color: rgb(0, 5, 72); color: white;">
        <div class="container-fluid">
            <div class="navbar-nav mx-auto">
                <a class="nav-link" href="index.html">Beranda</a>
                <a class="nav-link" href="produk.php">Produk</a>
                <a class="nav-link" href="tentangkami.html">Tentang Kami</a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Galeri</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="galerisekolah.html">Galeri Sekolah</a></li>
                        <li><a class="dropdown-item" href="galeriekskul.html">Galeri Esktrakurikuler</a></li>
                        <li><a class="dropdown-item" href="galeriproduk.html">Galeri Produk</a></li>
                    </ul>
                </div>
                <a class="nav-link" href="kontak.php">Kontak</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <?php
            // Untuk mengecek apakah ada produk dalam database
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $gambar_path = "../back/img/" . $row['gambar']; 
                    echo '
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <!-- Menampilkan gambar produk -->
                            <img src="' . $gambar_path . '" class="card-img-top" alt="' . $row['nama_barang'] . '">
                            <div class="card-body">
                                <h5 class="card-title">' . $row['nama_barang'] . '</h5>
                                <p><strong>Harga: Rp' . number_format($row['harga'], 0, ',', '.') . '</strong></p>
                                <p>Stok: ' . $row['stok'] . '</p>
                                <a href="login.php" class="btn btn-primary">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo "<p>Tidak ada produk yang tersedia.</p>";
            }
            ?>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-section">
            <h3>Tentang SMP Fatahillah Lohbener</h3>
            <p>Alamat: Jl. Lohbener No.3, Lohbener, Kec. Lohbener, Kabupaten Indramayu, Jawa Barat 452522</p>
            <p>NPSN: 20215937</p>
        </div>
        <div class="footer-section">
            <h3>Referensi SMP Fatahillah Lohbener</h3>
            <iframe src="https://www.youtube.com/embed/w6rLD9bYCzk?si=k1fAvASeHcxLcV2d" width="300" height="169" frameborder="0"></iframe>
        </div>
        <div class="footer-section">
            <h3>Maps Fatahillah Lohbener</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2844.6397645769707!2d108.27812347317015!3d-6.401405462604563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb87cb5a1ce39%3A0x710f924844bfad6d!2sMI%20Pui%20Fatahillah%20Lohbener!5e1!3m2!1sid!2sus!4v1732599303792!5m2!1sid!2sus" width="300" height="169" frameborder="0"></iframe>
        </div>
    </footer>

    <div class="footer">
        <p>
            <center>_________________________________________________________________________________________<br>
                SMP Fatahillah Lohbener | Jl. Lohbener No.3 - Lohbener - Indramayu <br>
                Design by <a href="#">Kelompok Kenara</a></center>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>