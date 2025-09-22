<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

$nama = isset($_SESSION['user_nama']) ? $_SESSION['user_nama'] : ''; 

include '../back/koneksi.php';

$user_email = $_SESSION['user_email'];

// Query untuk mendapatkan riwayat transaksi berdasarkan email pengguna
$query = "SELECT * FROM pembelian WHERE email = '$user_email'";  // Menyesuaikan dengan email pengguna yang login
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMP Fatahillah Lohbener</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        /* Navbar Styling */
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
        .form-section {
            margin: 20px auto;
            max-width: 600px;
        }
        .form-section h2 {
            margin-bottom: 20px;
        }
        .btn-submit {
            background-color: #2d2d72;
            color: white;
        }
        .btn-submit:hover {
            background-color: yellow;
            color: black;
        }
        .header {
            background-image: url('Gambar/kopsmpfata.png');
            background-size: cover;
            background-position: center;
            text-align: center;
            padding: 50px 0;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            padding: 25px;
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
    <!-- Header -->
    <div class="header text-white">
        <h1><br></h1>
        <p><br></p>
    </div>

    <!-- Navbar -->
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

    <div class="container my-4">
        <h3 class="text-center"><strong>Riwayat Transaksi Anda</strong></h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>No Telepon</th>
                        <th>Produk</th>
                        <th>Total Bayar</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php if ($result->num_rows > 0): ?>
                        <?php $index = 1; ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $index++ ?></td>
                                <td><?= htmlspecialchars($row['nama']) ?></td>
                                <td><?= htmlspecialchars($row['no_hp']) ?></td>
                                <td><?= htmlspecialchars($row['barang']) ?></td>
                                <td>Rp. <?= htmlspecialchars($row['total_bayar']) ?></td>
                                <td><?= htmlspecialchars($row['tanggal_pesan']) ?></td>
                                <td><?= htmlspecialchars($row['status']) ?></td>
                                <td>
                                <?php if ($row['status'] == 'Belum bayar'): ?>
                                    <a href="pembayaran.php?id_pembelian=<?= $row['id_pembelian'] ?>" class="btn btn-danger btn-sm">Bayar</a> <!-- Warna merah jika belum bayar -->
                                <?php else: ?>
                                    <!-- Tampilkan tombol untuk mengunduh invoice jika sudah bayar -->
                                    <a href="invoice.php?id_pembelian=<?= $row['id_pembelian'] ?>" class="btn btn-primary btn-sm">Unduh Invoice</a>
                                <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">Belum ada transaksi</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-section">
            <h3>Tentang SMP Fatahillah Lohbener</h3>
            <p>Alamat : Jl. Lohbener No.3, Lohbener, Kec. Lohbener, Kabupaten Indramayu, Jawa Barat 452522</p>
            <p>NPSN : 20215937</p>
            <p>Facebook : SMP Fatahillah Lohbener Indramayu</p>
        </div>
        <div class="footer-section">
            <h3>Referensi SMP Fatahillah Lohbener</h3>
            <iframe src="https://www.youtube.com/embed/w6rLD9bYCzk?si=k1fAvASeHcxLcV2d" width="300" height="169" frameborder="0"></iframe>
        </div>
        <div class="footer-section">
            <h3>Maps SMP Fatahillah Lohbener</h3>
            <iframe src="https://www.google.com/maps/embed?pb=..." width="300" height="169" frameborder="0"></iframe>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>