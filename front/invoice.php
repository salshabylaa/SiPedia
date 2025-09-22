<?php
require('fpdf/fpdf.php'); //library fpdf

// Ambil ID pembelian dari URL
$id_pembelian = $_GET['id_pembelian'];

include '../back/koneksi.php';

$query = "SELECT * FROM pembelian WHERE id_pembelian = '$id_pembelian'";
$result = $koneksi->query($query);
$row = $result->fetch_assoc();

// Membuat objek PDF baru
$pdf = new FPDF();
$pdf->AddPage();

// Menambahkan logo jika ada
// $pdf->Image('logo.png', 10, 8, 33); // Uncomment jika ingin menambahkan logo

// Set font untuk judul
$pdf->SetFont('Arial', 'B', 16);

// Judul Invoice
$pdf->Cell(200, 10, 'INVOICE PEMBELIAN KOPERASI SMP FATAHILLAH', 0, 1, 'C');
$pdf->Ln(10);
$pdf->SetDrawColor(0, 0, 0);
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Nama:', 0, 0);
$pdf->Cell(0, 10, $row['nama'], 0, 1);
$pdf->Cell(50, 10, 'Email:', 0, 0);
$pdf->Cell(0, 10, $row['email'], 0, 1);
$pdf->Cell(50, 10, 'Produk:', 0, 0);
$pdf->MultiCell(0, 10, $row['barang'], 0, 1);
$pdf->Cell(50, 10, 'Total Bayar:', 0, 0);
$pdf->Cell(0, 10, 'Rp. ' . number_format($row['total_bayar'], 0, ',', '.'), 0, 1);
$pdf->Cell(50, 10, 'Tanggal Pembelian:', 0, 0);
$pdf->Cell(0, 10, date('d-m-Y', strtotime($row['tanggal_pesan'])), 0, 1);
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
$pdf->Ln(10);
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 10, 'Terima Kasih Atas Pembeliannya!!!. Silahkan Ambil Barang Anda Di Koperasi Dengan Menunjukan Bukti Pembelian Ini.', 0, 1, 'C');

$pdf->Output('D', 'Invoice_' . $id_pembelian . '.pdf');
?>