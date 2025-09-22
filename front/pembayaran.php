<?php
session_start();
include '../back/koneksi.php'; 
require_once 'config.php';

use Midtrans\Snap;

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $query = "SELECT * FROM pembelian WHERE order_id = '$order_id' AND status = 'Belum bayar'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Menampilkan invoice
        echo "
        <div style='max-width: 800px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;'>
            <h2 style='text-align: center; color: #333;'>Invoice Pemesanan</h2>
            <hr>
            <h4>Informasi Pembeli</h4>
            <p><strong>Nama:</strong> " . $row['nama'] . "</p>
            <p><strong>Email:</strong> " . $row['email'] . "</p>
            <p><strong>No HP:</strong> " . $row['no_hp'] . "</p>
            
            <h4>Detail Pembelian</h4>
            <p><strong>Barang:</strong> " . $row['barang'] . "</p>
            <p><strong>Total Bayar:</strong> Rp " . number_format($row['total_bayar'], 0, ',', '.') . "</p>
            
            <h4>Status Pembayaran</h4>
            <p><strong>Status:</strong> " . $row['status'] . "</p>
            
            <hr>
            <h4>Aksi Pembayaran</h4>
            <button id='pay-button' class='btn btn-primary' style='padding: 10px 20px; font-size: 16px; background-color: #007bff; color: white; border: none; cursor: pointer;'>Bayar Sekarang</button>
        </div>";

        // Parameter untuk Midtrans
        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,  
                'gross_amount' => $row['total_bayar'], 
            ),
            'customer_details' => array(
                'first_name' => $row['nama'], 
                'email' => $row['email'], 
                'phone' => $row['no_hp'],
            ),
        );

        try {
            // Mendapatkan Snap Token dari Midtrans
            $snapToken = Snap::getSnapToken($params);

            if (!$snapToken) {
                echo "<script type='text/javascript'> alert('Gagal mendapatkan Snap Token!'); </script>";
            } else {
                echo "<script src='https://app.sandbox.midtrans.com/snap/snap.js' data-client-key='SB-Mid-client-TupJwk5d32RV-Avs'></script>";
                echo "
                <script type='text/javascript'>
                    console.log('Script dimuat');
                    document.getElementById('pay-button').onclick = function () {
                        console.log('Tombol diklik');
                        snap.pay('$snapToken', {
                            onSuccess: function(result) {
                                alert('Pembayaran berhasil');
                                // Perbarui status pembayaran di database
                                window.location.href = 'update_status.php?id_pembelian=$id_pembelian';
                            },
                            onPending: function(result) {
                                alert('Pembayaran menunggu konfirmasi');
                            },
                            onError: function(result) {
                                alert('Pembayaran gagal');
                            }
                        });
                    }
                </script>";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Pesanan tidak ditemukan atau sudah dibayar.";
    }
} else {
    echo "ID Pembelian tidak ditemukan.";
}
