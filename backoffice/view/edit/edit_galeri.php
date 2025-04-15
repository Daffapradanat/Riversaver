<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Galeri</title>
    <link rel="stylesheet" href="../../../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/assets/css/index.css">
    <link rel="icon" href="public/assets/logo.png" type="image/png">

</head>
<body>
    <?php include '../../component/sidebar.php'; ?>

    <div class="content">
        <?php include '../../component/header.php'; ?>

        <div class="container mt-4">
            <h1 class="mb-4">Edit Galeri</h1>

            <?php
            include '../../../config/koneksi.php';
            
            if (isset($_GET['id'])) {
                $id_galeri = $_GET['id'];
                $result = $koneksi->query("SELECT * FROM GALERI WHERE id_galeri = '$id_galeri'");
                $data = $result->fetch_assoc();
            }
            ?>

            <form action="../../controller/galeriController.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_galeri" value="<?= $data['id_galeri'] ?>">

                <div class="mb-3">
                    <label for="judul_galeri" class="form-label">Judul Galeri</label>
                    <input type="text" class="form-control" id="judul_galeri" name="judul_galeri" value="<?= htmlspecialchars($data['judul_galeri']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="detail_galeri" class="form-label">Detail Galeri</label>
                    <textarea class="form-control" id="detail_galeri" name="detail_galeri" rows="5" required><?= htmlspecialchars($data['detail_galeri']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="foto_galeri" class="form-label">Foto Galeri</label>
                    <?php if ($data['foto_galeri']): ?>
                        <div class="mb-2">
                            <img src="../../../public/image/galeri/<?= htmlspecialchars($data['foto_galeri']) ?>" width="150" class="img-thumbnail">
                        </div>
                    <?php endif; ?>
                    <input type="file" class="form-control" id="foto_galeri" name="foto_galeri">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                </div>

                <button type="submit" name="update" class="btn btn-success">Update Galeri</button>
                <a href="/Riversaver_Native/backoffice/view/galeri.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <script src="../../../public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>