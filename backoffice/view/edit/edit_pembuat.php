<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pembuat</title>
    <link rel="stylesheet" href="../../../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/assets/css/index.css">
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
                $result = $koneksi->query("SELECT * FROM BERITA WHERE id_pembuat = '$id_pembuat'");
                $data = $result->fetch_assoc();
            }
            ?>

            <form action="../controller/beritaController.php" method="POST" enctype="multipart/form-data">
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
                    <label for="detail_berita" class="form-label">Detail Pembuat</label>
                    <textarea class="form-control" id="detail_berita" name="detail_berita" rows="5" required><?= htmlspecialchars($data['detail_berita']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="foto_pembuat" class="form-label">Foto Pembuat</label>
                    <?php if ($data['foto_pembuat']): ?>
                        <div class="mb-2">
                            <img src="../../public/image/berita/<?= htmlspecialchars($data['foto_pembuat']) ?>" width="150" class="img-thumbnail">
                        </div>
                    <?php endif; ?>
                    <input type="file" class="form-control" id="foto_pembuat" name="foto_pembuat">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                </div>

                <button type="submit" name="update" class="btn btn-success">Update Pembuat</button>
                <a href="/Riversaver_Native/backoffice/view/berita.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <script src="../../../public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>