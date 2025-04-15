<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pembuat</title>
    <link rel="stylesheet" href="../../../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/assets/css/index.css">
    <link rel="icon" href="public/assets/logo.png" type="image/png">

</head>
<body>
    <?php include '../../component/sidebar.php'; ?>

    <div class="content">
        <?php include '../../component/header.php'; ?>

        <div class="container mt-4">
            <h1 class="mb-4">Edit Pembuat</h1>

            <?php
            include '../../../config/koneksi.php';
            
            if (isset($_GET['id'])) {
                $id_pembuat = $_GET['id'];
                $result = $koneksi->query("SELECT * FROM PEMBUAT WHERE id_pembuat = '$id_pembuat'");
                $data = $result->fetch_assoc();
            }
            ?>

            <form action="../../controller/pembuatController.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_pembuat" value="<?= $data['id_pembuat'] ?>">

                <div class="mb-3">
                    <label for="nama_pembuat" class="form-label">Nama Pembuat</label>
                    <input type="text" class="form-control" id="nama_pembuat" name="nama_pembuat" value="<?= htmlspecialchars($data['nama_pembuat']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="pendidikan_pembuat" class="form-label">Pendidikan Pembuat</label>
                    <input type="text" class="form-control" id="pendidikan_pembuat" name="pendidikan_pembuat" value="<?= htmlspecialchars($data['pendidikan_pembuat']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="detail_pembuat" class="form-label">Detail Pembuat</label>
                    <textarea class="form-control" id="detail_pembuat" name="detail_pembuat" rows="5" required><?= htmlspecialchars($data['detail_pembuat']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="no_telp" class="form-label">Nomor Telepon</label>
                    <div class="input-group">
                        <select class="form-select" id="kode_negara" name="kode_negara" style="max-width: 100px;" required>
                            <option value="+62" <?= $data['kode_negara'] == '+62' ? 'selected' : '' ?>>+62</option>
                            <option value="+1" <?= $data['kode_negara'] == '+1' ? 'selected' : '' ?>>+1</option>
                            <option value="+44" <?= $data['kode_negara'] == '+44' ? 'selected' : '' ?>>+44</option>
                            <option value="+60" <?= $data['kode_negara'] == '+60' ? 'selected' : '' ?>>+60</option>
                            <option value="+65" <?= $data['kode_negara'] == '+65' ? 'selected' : '' ?>>+65</option>
                            <option value="+91" <?= $data['kode_negara'] == '+91' ? 'selected' : '' ?>>+91</option>
                            <option value="+81" <?= $data['kode_negara'] == '+81' ? 'selected' : '' ?>>+81</option>
                        </select>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" maxlength="12" value="<?= htmlspecialchars($data['no_telp']) ?>" placeholder="8123456789">
                    </div>
                    <small class="text-muted">Masukkan tanpa 0 di depan. Contoh: 8123456789</small>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($data['email']) ?>">
                </div>

                <div class="mb-3">
                    <label for="sosmed" class="form-label">Sosial Media</label>
                    <input type="text" class="form-control" id="sosmed" name="sosmed" value="<?= htmlspecialchars($data['sosmed']) ?>">
                </div>

                <div class="mb-3">
                    <label for="foto_pembuat" class="form-label">Foto Pembuat</label>
                    <?php if ($data['foto_pembuat']): ?>
                        <div class="mb-2">
                            <img src="../../../public/image/pembuat/<?= htmlspecialchars($data['foto_pembuat']) ?>" width="150" class="img-thumbnail">
                        </div>
                    <?php endif; ?>
                    <input type="file" class="form-control" id="foto_pembuat" name="foto_pembuat">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                </div>

                <button type="submit" name="update" class="btn btn-success">Update Pembuat</button>
                <a href="../pembuat.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <script src="../../../public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>