<?php
session_start();
include '../../koneksi.php'; 

// Ambil data dari form
$no_barang = $_POST['no_barang']; // Menambahkan no_barang dari form
$nama = $_POST['nama_barang'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];

// Proses upload gambar
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "../../img/"; // Add a trailing slash here for the target directory
    $file_name = basename($_FILES['gambar']['name']);
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Validasi jenis file
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($file_ext, $allowed_ext)) {
        header('Location: tambah.php?status=error&message=Format gambar tidak valid!');
        exit();
    }

    // Buat nama file unik
    $new_file_name = uniqid() . '.' . $file_ext;
    $target_file = $target_dir . $new_file_name;

    // Pindahkan file ke folder target
    if (move_uploaded_file($file_tmp, $target_file)) {
        // Simpan nama file ke dalam database
        $gambar = $new_file_name;
    } else {
        header('Location: tambah.php?status=error&message=Gagal mengunggah gambar!');
        exit();
    }
} else {
    // If no image is selected, handle accordingly
    header('Location: tambah.php?status=error&message=Gambar belum dipilih!');
    exit();
}

// Insert data ke database
$sql = "INSERT INTO barang (no_barang, gambar, nama_barang, stok, harga, id_admin) VALUES (?, ?, ?, ?, ?, ?)"; // Menambahkan no_barang ke query
// Prepare the statement
$stmt = mysqli_prepare($koneksi, $sql);

// Bind parameters
mysqli_stmt_bind_param($stmt, 'issiii', $no_barang, $gambar, $nama, $stok, $harga, $id_admin); // Menambahkan $no_barang pada bind parameter

// Assuming $id_admin is available from session or other source
// For example, if the admin is logged in, you can get the id like this:
$id_admin = $_SESSION['id']; // Uncomment if session is being used

// Check if the statement executes successfully
if (mysqli_stmt_execute($stmt)) {
    header('Location: tambah.php?status=sukses&message=Barang berhasil ditambahkan!');
} else {
    header('Location: tambah.php?status=error&message=Gagal menambahkan barang!');
}

// Tutup statement
mysqli_stmt_close($stmt);
?>