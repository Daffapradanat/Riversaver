<?php
include '../../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembuat</title>
    <link rel="stylesheet" href="../../../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/assets/css/index.css">
    <link rel="icon" href="../../../public/assets/logo.png" type="image/png">

</head>
<body>
    <?php include '../../component/sidebar2.php'; ?>

    <div class="content">
        <?php include '../../component/header.php'; ?>

        <div class="container mt-4">
            <h1 class="mb-4">Tambah Pembuat Baru</h1>
            <form action="../../controller/pembuatController.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_pembuat" class="form-label">Nama Pembuat:</label>
                    <input type="text" class="form-control" id="nama_pembuat" name="nama_pembuat" required>
                </div>

                <div class="mb-3">
                    <label for="pendidikan_pembuat" class="form-label">Pendidikan Pembuat</label>
                    <input type="text" class="form-control" id="pendidikan_pembuat" name="pendidikan_pembuat" required>
                </div>

                <div class="mb-3">
                    <label for="detail_pembuat" class="form-label">Biografi Pembuat:</label>
                    <textarea class="form-control" id="detail_pembuat" name="detail_pembuat" rows="5" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="no_telp" class="form-label">Nomor Telepon</label>
                    <div class="input-group">
                        <select class="form-select" id="kode_negara" name="kode_negara" style="max-width: 100px;" required>
                            <option value="+62">+62</option>
                            <option value="+1">+1</option>
                            <option value="+44">+44</option>
                            <option value="+60">+60</option>
                            <option value="+65">+65</option>
                            <option value="+91">+91</option>
                            <option value="+81">+81</option>
                        </select>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" maxlength="12">
                    </div>
                    <small class="text-muted">Masukkan tanpa 0 di depan. Misal: 8123456789</small>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="mb-3">
                    <label for="sosmed" class="form-label">Sosial Media (Instagram / LinkedIn / dll):</label>
                    <input type="text" class="form-control" id="sosmed" name="sosmed">
                </div>

                <div class="mb-3">
                    <label for="foto_pembuat" class="form-label">Foto Pembuat:</label>
                    <input type="file" class="form-control" id="foto_pembuat" name="foto_pembuat">
                </div>

                <input type="hidden" name="id_admin" value="1">
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Pembuat</button>
                <a href="../pembuat.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <script src="../../../public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
