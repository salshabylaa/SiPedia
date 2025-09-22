<?php
session_start();
include '../back/koneksi.php'; // Pastikan koneksi ke database sudah benar

// Ambil ID Pembelian dari parameter URL
if (isset($_GET['id_pembelian'])) {
    $id_pembelian = $_GET['id_pembelian'];

    // Update status pembayaran di tabel pembelian
    $query_update = "UPDATE pembelian SET status = 'Sudah bayar' WHERE id_pembelian = '$id_pembelian'";

    if (mysqli_query($koneksi, $query_update)) {
        // Update status di riwayat transaksi jika diperlukan

        $query_riwayat = "UPDATE pembelian SET status = 'Sudah bayar' WHERE id_pembelian = '$id_pembelian'";
        mysqli_query($koneksi, $query_riwayat);

        header("Location: riwayat_transaksi.php");
        exit();
    } else {
        echo "Gagal mengupdate status pembayaran: " . mysqli_error($koneksi);
    }
} else {
    echo "ID Pembelian tidak ditemukan.";
}
?>