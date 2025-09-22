<!DOCTYPE>
<html>
    <head>
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Barang Koperasi</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="barang.php">Data Barang Koperasi</a></li>
                    <li class="breadcrumb-item active">tambah barang</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="ptbarang.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar Barang</label>
                                <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
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
// Simpan konten utama
$content = ob_get_clean();

// Sertakan layout utama
include '../../layout.php';
?>