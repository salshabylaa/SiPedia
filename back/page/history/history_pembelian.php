<?php
$title = "Dashboard";
$activePage = "dashboard";

// Koneksi ke database
include '../../koneksi.php';

// Ambil data admin dari database
$query = "SELECT * FROM pembelian";
$result = $koneksi->query($query);

ob_start();
?>
<!DOCTYPE>
<html>
    <head>
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Pembelian Koperasi SMP FATAHILLAH LOHBENER</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="../../index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">data murid</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover align-middle">
                            <thead class="table-light">
                                <tr align="center">
                                    <th>No</th>
                                    <th>Order Id</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>No Telepon</th>
                                    <th>Barang</th>
                                    <th>Total Bayar</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['id_pembelian']) ?></td>
                                    <td><?= htmlspecialchars($row['order_id']) ?></td>
                                    <td><?= htmlspecialchars($row['nama']) ?></td>
                                    <td><?= htmlspecialchars($row['email']) ?></td>
                                    <td><?= htmlspecialchars($row['no_hp']) ?></td>
                                    <td><?= htmlspecialchars($row['barang']) ?></td>
                                    <td>Rp. <?= htmlspecialchars($row['total_bayar']) ?></td>
                                    <td class="text-center"><?= htmlspecialchars($row['tanggal_pesan']) ?></td>
                                    <td>
                                        <?php if ($row['status'] == 'Belum bayar'): ?>
                                            <a href="pembayaran.php?id_pembelian=<?= $row['id_pembelian'] ?>" class="btn btn-danger btn-sm">Bayar</a> <!-- Warna merah jika belum bayar -->
                                        <?php else: ?>
                                            <!-- Tampilkan tombol untuk mengunduh invoice jika sudah bayar -->
                                            <p>Sudah Bayar</p>
                                        <?php endif; ?>
                                    </td>
                                    <!-- <td class="text-center">
                                        <a href="hapus.php?id=<?= $row['id_murid'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')"><i class="bi bi-trash"></i> Hapus</a>
                                    </td> -->
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <script src="../../assets/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php
// Simpan konten utama
$content = ob_get_clean();

// Sertakan layout utama
include '../../layout.php';
?>