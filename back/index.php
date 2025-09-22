<?php
include 'koneksi.php';
$title = "Dashboard";


$query = "SELECT * FROM admin";
$result = $koneksi->query($query);
$data_admin = mysqli_num_rows($result);

$query = "SELECT * FROM murid";
$result = $koneksi->query($query);
$data_murid = mysqli_num_rows($result);

$query = "SELECT * FROM guru";
$result = $koneksi->query($query);
$data_guru = mysqli_num_rows($result);

$query = "SELECT * FROM barang";
$result = $koneksi->query($query);
$data_barang = mysqli_num_rows($result);

$query = "SELECT * FROM kontak";
$result = $koneksi->query($query);
$data_kontak = mysqli_num_rows($result);

$query = "SELECT * FROM pembelian";
$result_beli = $koneksi->query($query);
$data_beli = mysqli_num_rows($result_beli);

ob_start();
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Jumlah Admin
                    <div class="display-4 text-white"><b><?php echo $data_admin;?></b></div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="page/admin/admin.php">Lihat Detail</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Jumlah Murid
                        <div class="display-4 text-white"><b><?php echo $data_murid;?></b></div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="page/murid/murid.php">Lihat Detail</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Jumlah Guru
                        <div class="display-4 text-white"><b><?php echo $data_guru;?></b></div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="page/guru/guru.php">Lihat Detail</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Jumlah Barang
                        <div class="display-4 text-white"><b><?php echo $data_barang;?></b></div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="page/barang/barang.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">Jumlah Pembelian
                        <div class="display-4 text-white"><b><?php echo $data_beli;?></b></div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="page/history/history_pembelian.php">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-dark text-white mb-4">
                    <div class="card-body">Kontak Masuk
                        <div class="display-4 text-white"><b><?php echo $data_kontak;?></b></div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="page/kontak/kontak.php">Lihat Detail</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                History Pembelian
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
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
                    <tfoot>
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
                    </tfoot>
                    <tbody>
                    <?php while ($row = $result_beli->fetch_assoc()): ?>
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
                                    <a href="pembayaran.php?id_pembelian=<?= $row['id_pembelian'] ?>">Belum Bayar</a> <!-- Warna merah jika belum bayar -->
                                <?php else: ?>
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
<?php
$content = ob_get_clean();

include 'layout.php';
?>