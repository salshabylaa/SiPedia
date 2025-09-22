<?php
include '../back/koneksi.php';
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

$nama = isset($_SESSION['user_nama']) ? $_SESSION['user_nama'] : ''; 
$email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';

$sql = "SELECT no_barang, nama_barang, harga FROM barang";
$result = $koneksi->query($sql);
$produkOptions = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $produkOptions[] = $row;
    }
} else {
    echo "Tidak ada produk";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMP Fatahillah Lohbener</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
    <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-TupJwk5d32RV-Avs"></script>
</head>
<body>
    <div class="header text-white">
        <h1><br></h1>
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
            </div>
        </div>
    </nav>
    <div class="container form-section">
    <h2><strong>Form Pemesanan</strong></h2>
    <form action="pt_pembelian.php" method="POST" style="max-width: 600px; margin: auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <div class="text-end">
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($nama); ?></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
            <li><a class="dropdown-item" href="riwayat_transaksi.php"><i class="bi bi-clock-history"></i> Lihat Riwayat Beli</a></li>
        </ul>
    </div>
    <div style="margin-bottom: 15px;">
        <input type="hidden" name="id_pembelian" id="id_pembelian" value="id_pembelian">
        <label for="nama" style="display: block; margin-bottom: 5px; font-weight: bold;">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($nama); ?>" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" readonly>
    </div>
    <div style="margin-bottom: 15px;">
        <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" readonly>
    </div>
    <div style="margin-bottom: 15px;">
        <label for="no_hp" style="display: block; margin-bottom: 5px; font-weight: bold;">No Telepon</label>
        <input type="text" name="no_hp" id="no_hp" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="produk" style="display: block; margin-bottom: 5px; font-weight: bold;">Pilih Produk</label>
        <?php
        // Untuk menampilkan produk dari database
        foreach ($produkOptions as $produk) {
            echo '
            <div style="margin-bottom: 10px;">
                <input type="checkbox" name="produk[]" value="' . $produk['no_barang'] . '" 
                       data-harga="' . $produk['harga'] . '" 
                       onclick="updateTotal()">
                <label>' . $produk['nama_barang'] . ' - Rp ' . number_format($produk['harga'], 0, ',', '.') . '</label>
                <input type="number" name="jumlah_' . $produk['no_barang'] . '" value="1" min="1" 
                       id="jumlah_' . $produk['no_barang'] . '" style="width: 80px; padding: 8px; border: 1px solid #ccc; border-radius: 4px; display:none;" 
                       oninput="updateTotal()">
            </div>';
        }
        ?>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="total_bayar" style="display: block; margin-bottom: 5px; font-weight: bold;">Total Bayar</label>
        <input type="text" name="total_bayar" id="total_bayar" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" readonly>
    </div>
    <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; width: 100%;">Beli</button>
    </form>
    </div>

<script>
    function updateTotal() {
        var total = 0;
        var produkCheckboxes = document.querySelectorAll("input[type='checkbox']:checked");
        
        produkCheckboxes.forEach(function(checkbox) {
            var harga = parseInt(checkbox.getAttribute("data-harga"));
            var id = checkbox.value;
            var jumlah = document.getElementById("jumlah_" + id).value;
            total += harga * jumlah;
            document.getElementById("jumlah_" + id).style.display = "inline-block";
        });
        document.getElementById("total_bayar").value = "Rp " + total.toLocaleString();
    }
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>