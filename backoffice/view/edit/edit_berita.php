<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <link rel="stylesheet" href="../../../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/assets/css/index.css">
    <link rel="icon" href="public/assets/logo.png" type="image/png">

</head>
<body>
    <?php include '../../component/sidebar.php'; ?>

    <div class="content">
        <?php include '../../component/header.php'; ?>

        <div class="container mt-4">
            <h1 class="mb-4">Edit Berita</h1>

            <?php
            include '../../../config/koneksi.php';
            
            if (isset($_GET['id'])) {
                $id_berita = $_GET['id'];
                $result = $koneksi->query("SELECT * FROM BERITA WHERE id_berita = '$id_berita'");
                $data = $result->fetch_assoc();
            }
            ?>

            <form action="../../controller/beritaController.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_berita" value="<?= $data['id_berita'] ?>">

                <div class="mb-3">
                    <label for="judul_berita" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="<?= htmlspecialchars($data['judul_berita']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="detail_berita" class="form-label">Detail Berita</label>
                    <textarea class="form-control" id="detail_berita" name="detail_berita" rows="5" required><?= htmlspecialchars($data['detail_berita']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="foto_berita" class="form-label">Foto Berita</label>
                    <?php if ($data['foto_berita']): ?>
                        <div class="mb-2">
                            <img src="../../../public/image/berita/<?= htmlspecialchars($data['foto_berita']) ?>" width="150" class="img-thumbnail">
                        </div>
                    <?php endif; ?>
                    <input type="file" class="form-control" id="foto_berita" name="foto_berita">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                </div>

                <button type="submit" name="update" class="btn btn-success">Update Berita</button>
                <a href="/Riversaver_Native/backoffice/view/berita.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <script src="../../../public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>