<?php
session_start();
include '../back/koneksi.php';

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

// Ambil data dari session
$nama = $_SESSION['user_nama']; // Nama pengguna
$email = $_SESSION['user_email']; // Email pengguna

// Cek jika form di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $no_hp = $_POST['no_hp'];
    $total_bayar = $_POST['total_bayar']; // Total bayar yang dihitung di form

    // Ambil produk yang dipilih
    if (isset($_POST['produk']) && !empty($_POST['produk'])) {
        $barang = '';
        $total_bayar = 0;
        
        // Loop untuk menghitung jumlah total dan nama produk yang dipilih
        foreach ($_POST['produk'] as $produk_id) {
            $jumlah_produk = $_POST['jumlah_' . $produk_id]; // Jumlah produk yang dipilih
            $query_produk = "SELECT * FROM barang WHERE no_barang = '$produk_id'";
            $result_produk = mysqli_query($koneksi, $query_produk);

            // Untuk Memastikan produk ada dalam database
            if (!$result_produk || mysqli_num_rows($result_produk) == 0) {
                echo "<script type='text/javascript'> alert('Produk tidak ditemukan!'); window.location = 'pt_pembelian.php'; </script>";
                exit;
            }
            
            $produk = mysqli_fetch_assoc($result_produk);

            // Menggabungkan nama produk dan jumlahnya
            $barang .= $produk['nama_barang'] . " (x" . $jumlah_produk . "), ";
            $total_bayar += $produk['harga'] * $jumlah_produk; // Hitung total harga
        }

        // Untuk menghapus koma terakhir pada nama produk
        $barang = rtrim($barang, ", ");


        // Generate unique order_id untuk Midtrans
        $order_id = uniqid('ORD_', true); // Menghasilkan order_id unik dengan kata awal'ORD_'

        // Query untuk menyimpan pembelian ke tabel pembelian, menggunakan order_id dari Midtrans
        $query = "INSERT INTO pembelian (order_id, nama, email, no_hp, barang, total_bayar) 
                  VALUES ('$order_id', '$nama', '$email', '$no_hp', '$barang', '$total_bayar')";
        
        // Eksekusi query pembelian
        $result = mysqli_query($koneksi, $query);
        if ($result) {
            echo "<script type='text/javascript'> alert('Pemesanan berhasil!'); window.location = 'riwayat_transaksi.php'; </script>";
        } else {
            echo "<script type='text/javascript'> alert('Pemesanan gagal! " . mysqli_error($koneksi) . "'); window.location = 'pt_pembelian.php'; </script>";
        }
    } else {
        echo "<script type='text/javascript'> alert('Tidak ada produk yang dipilih!'); window.location = 'pt_pembelian.php'; </script>";
    }
}
?>
