<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
                /* General body styling */
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

        /* Header with background image */
        .header {
            background-image: url('Gambar/kopsmpfata.png');
            background-size: cover;
            background-position: center;
            text-align: center;
            padding: 50px 0;
        }
         /* Footer styling */
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

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Registrasi Murid</h2>
                <form action="../back/page/murid/ptmurid.php" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap :</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="nisn" class="form-label">NISN :</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir :</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Registrasi</button>
                </form>
                <div class="text-center mt-3">
                    <p>Sudah Punya Akun? <a href="login.php">Login Disini</a></p><br>
                </div>
            </div>
        </div>
    </div>
         <!-- Footer -->
    <footer class="footer">
        <div class="footer-section">
            <h3>Tentang SMP 
                <br>Fatahillah Lohbener</h3>
            <p>Alamat : Jl. Lohbener No.3, 
                <br>Lohbener, Kec. Lohbener, 
                <br>Kabupaten Indramayu, 
                <br>Jawa Barat 452522
                </p>
            <p>NPSN : 20215937 </a></p>
            <p>Facebook : SMP Fatahillah
            <br>Lohbener Indramayu</p>
        </div>
        <div class="footer-section">
            <h3>Referensi SMP
                <br>Fatahillah Lohbener
            </h3>
            <iframe src="https://www.youtube.com/embed/w6rLD9bYCzk?si=k1fAvASeHcxLcV2d" title="YouTube video player" width="300" height="169" frameborder="0"></iframe>
        </div>
        <div class="footer-section">
            <h3>Maps SMP
                <br>Fatahillah Lohbener
            </h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2844.6397645769707!2d108.27812347317015!3d-6.401405462604563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb87cb5a1ce39%3A0x710f924844bfad6d!2sMI%20Pui%20Fatahillah%20Lohbener!5e1!3m2!1sid!2sus!4v1732599303792!5m2!1sid!2sus"></iframe>
        </div>
    </footer>
    <div class="footer">
        <p>
            <center>_________________________________________________________________________________________<br>
                <br>SMP Fatahillah Lohbener | Jl. Lohbener No.3 - Lohbener - Indramayu <br>
            Design by <a href="#">Kelompok Kenara</a></center>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
