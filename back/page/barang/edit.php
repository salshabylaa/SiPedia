<?php
include '../../koneksi.php';
// Buat query untuk ambil data dari database
$sql = "SELECT * FROM barang";
$query = mysqli_query($koneksi, $sql);

// Jika data ditemukan, tampilkan di form
if (mysqli_num_rows($query)) {
    $data = mysqli_fetch_assoc($query);
    $no_barang = $data['no_barang'];
    $nama = $data['nama_barang'];
    $stok = $data['stok'];
    $harga = $data['harga'];
    $gambar = $data['gambar'];

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
                <h1 class="mt-4">Edit Data Barang</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="barang.php">Data Barang</a></li>
                    <li class="breadcrumb-item active">edit barang</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                    
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