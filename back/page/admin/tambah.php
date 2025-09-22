<?php
    if (isset($_GET['status']) && isset($_GET['message'])) {
        $status = $_GET['status'];
        $message = $_GET['message'];
    
        // Menambahkan JavaScript untuk menampilkan alert
        echo "<script type='text/javascript'>
                alert('$message');
              </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            width: 360px; 
            margin: auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-control-icon {
            position: relative;
        }
        .form-control-icon input {
            padding-left: 2.5rem;
        }
        .form-control-icon i {
            position: absolute;
            top: 50%;
            left: 0.75rem;
            transform: translateY(-50%);
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center bg-dark text-white">
                <h2>Tambah Admin</h2>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION['error'] ?>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>

                <form action="ptadmin.php" method="POST">
                    <div class="mb-3 form-control-icon">
                        <i class="bi bi-person"></i>
                        <input type="text" name="nama" id="name" class="form-control" placeholder="Nama" required>
                    </div>

                    <div class="mb-3 form-control-icon">
                        <i class="bi bi-envelope"></i>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                    </div>

                    <div class="mb-3 form-control-icon">
                        <i class="bi bi-lock"></i>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    </div>

                    <div class="mb-3 form-control-icon">
                        <i class="bi bi-lock-fill"></i>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Konfirmasi password" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="" disabled selected>Pilih Role</option>
                            <option value="admin koperasi">Admin Koperasi</option>
                            <option value="admin sekolah">Admin Sekolah</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="admin.php" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>