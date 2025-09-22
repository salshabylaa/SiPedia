<?php
include '../../koneksi.php'; 

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $no_barang = $_POST['no_barang']; // Menambahkan no_barang dari form
    $nama = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $gambar = null;

    // Cek apakah gambar baru diupload
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../../img/";
        $file_name = basename($_FILES['gambar']['name']);
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Validasi jenis file
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($file_ext, $allowed_ext)) {
            header('Location: edit.php?status=error&message=Format gambar tidak valid!');
            exit();
        }

        // Buat nama file unik
        $new_file_name = uniqid() . '.' . $file_ext;
        $target_file = $target_dir . $new_file_name;

        // Pindahkan file ke folder target
        if (move_uploaded_file($file_tmp, $target_file)) {
            // Gambar berhasil diupload, set variabel $gambar dengan nama file baru
            $gambar = $new_file_name;
        } else {
            header('Location: edit.php?status=error&message=Gagal mengunggah gambar!');
            exit();
        }
    } else {
        // Jika tidak ada gambar baru, gambar tetap menggunakan gambar lama (ambil gambar lama dari database)
        $query = "SELECT gambar FROM barang WHERE no_barang = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, 'i', $no_barang);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $gambar_lama);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // Gunakan gambar lama jika tidak ada gambar baru
        $gambar = $gambar_lama;
    }

    // Update data barang di database
    $sql = "UPDATE barang SET nama_barang = ?, stok = ?, harga = ?, gambar = ? WHERE no_barang = ?";
    $stmt = mysqli_prepare($koneksi, $sql);

    // Bind parameters untuk query update
    mysqli_stmt_bind_param($stmt, 'siisi', $nama, $stok, $harga, $gambar, $no_barang);

    // Cek jika update berhasil
    if (mysqli_stmt_execute($stmt)) {
        header('Location: barang.php?status=sukses&message=Barang berhasil diperbarui!');
    } else {
        header('Location: edit.php?status=error&message=Gagal memperbarui barang!');
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
}
?>