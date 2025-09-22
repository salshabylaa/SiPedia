<?php
$title = "Dashboard";
include '../../koneksi.php';

// Ambil data admin dari database
$query = "SELECT * FROM barang";
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
                <h1 class="mt-4">Data Barang Koperasi</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="../../index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">barang koperasi</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <a href="tambah.php" class="btn btn-primary mb-3"><i class="bi bi-plus-square"></i> Tambah Barang</a>
                        <table class="table table-bordered table-striped table-hover align-middle">
                            <thead class="table-light">
                                <tr align="center">
                                    <th>No</th>
                                    <th>Gambar Barang</th>
                                    <th>Nama</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Id Admin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['no_barang']) ?></td>
                                    <td class="text-center">
                                        <?php if (!empty($row['gambar'])): ?>
                                            <img src="../../img/<?php echo $row['gambar']; ?>" alt="Gambar Barang" style="width: 100px; height: auto;">
                                        <?php else: ?>
                                            <span>Tidak ada gambar</span>
                                        <?php endif; ?>
                                    </td>

                                    <td><?= htmlspecialchars($row['nama_barang']) ?></td>
                                    <td><?= htmlspecialchars($row['stok']) ?></td>
                                    <td><?= htmlspecialchars($row['harga']) ?></td>
                                    <td class="text-center"><?= htmlspecialchars($row['id_admin']) ?></td>
                                    <td class="text-center">
                                        <a href="edit.php?id=<?= $row['no_barang'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                                        <a href="hapus.php?id=<?= $row['no_barang'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')"><i class="bi bi-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="height: 100vh"></div>
                <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
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