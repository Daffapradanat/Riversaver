<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <link rel="stylesheet" href="../../../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/assets/css/index.css">
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
                $id_merchan = $_GET['id'];
                $result = $koneksi->query("SELECT * FROM BERITA WHERE id_merchan = '$id_merchan'");
                $data = $result->fetch_assoc();
            }
            ?>

            <form action="../controller/beritaController.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_merchan" value="<?= $data['id_merchan'] ?>">

                <div class="mb-3">
                    <label for="nama_merchan" class="form-label">Nama Merchendise</label>
                    <input type="text" class="form-control" id="nama_merchan" name="nama_merchan" value="<?= htmlspecialchars($data['nama_merchan']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="harga_merchan" class="form-label">Harga Merchendise</label>
                    <input type="text" class="form-control" id="harga_merchan" name="harga_merchan" value="<?= htmlspecialchars($data['harga_merchan']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="detail_merchan" class="form-label">Detail Merchendise</label>
                    <textarea class="form-control" id="detail_merchan" name="detail_merchan" rows="5" required><?= htmlspecialchars($data['detail_merchan']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="foto_merchan" class="form-label">Foto Merchendise</label>
                    <?php if ($data['foto_merchan']): ?>
                        <div class="mb-2">
                            <img src="../../public/image/berita/<?= htmlspecialchars($data['foto_merchan']) ?>" width="150" class="img-thumbnail">
                        </div>
                    <?php endif; ?>
                    <input type="file" class="form-control" id="foto_merchan" name="foto_merchan">
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