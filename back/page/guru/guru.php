<?php
$title = "Dashboard";
$activePage = "dashboard";

include '../../koneksi.php';

$query = "SELECT * FROM guru";
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
                <h1 class="mt-4">Data Guru SMP FATAHILLAH LOHBENER</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="../../index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">data guru</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <a href="../../../front/registrasiguru.php" class="btn btn-primary mb-3"><i class="bi bi-plus-square"></i> Registrasi Guru</a>
                        <table class="table table-bordered table-striped table-hover align-middle">
                            <thead class="table-light">
                                <tr align="center">
                                    <th>Id</th>
                                    <th>Nip</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['id_guru']) ?></td>
                                    <td><?= htmlspecialchars($row['nip']) ?></td>
                                    <td><?= htmlspecialchars($row['nama']) ?></td>
                                    <td><?= htmlspecialchars($row['email']) ?></td>
                                    <td class="text-center"><?= htmlspecialchars($row['created_at']) ?></td>
                                    <td class="text-center">
                                        <a href="hapus.php?id=<?= $row['id_guru'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')"><i class="bi bi-trash"></i> Hapus</a>
                                    </td>
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
$content = ob_get_clean();

include '../../layout.php';
?>