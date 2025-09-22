<?php
include '../../koneksi.php';
// Buat query untuk ambil data dari database
$sql = "SELECT * FROM admin";
$query = mysqli_query($koneksi, $sql);

// Jika data ditemukan, tampilkan di form
if (mysqli_num_rows($query)) {
    $data = mysqli_fetch_assoc($query);
    $id = $data['id_admin'];
    $nama = $data['nama'];
    $email = $data['email'];
} else {
    die("Data tidak ditemukan...");
}

?>
<!DOCTYPE>
<html>
    <head>
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Data Admin</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="admin.php">Data Admin</a></li>
                    <li class="breadcrumb-item active">edit admin</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="peadmin.php" method="POST">
                            <input type="hidden" id="id_admin" name="id_admin" value="<?php echo $id; ?>">

                            <!-- Input Nama -->
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                                </div>
                            </div>

                            <!-- Input Email -->
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?php echo $email; ?>" required>
                                </div>
                            </div>

                            <!-- Tombol Simpan -->
                            <div class="text-center">
                                <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan Perubahan</button>
                            </div>
                        </form>
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
// untuk menyimpan konten utama
$content = ob_get_clean();

// layout utama
include '../../layout.php';
?>