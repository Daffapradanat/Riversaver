<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Game</title>
    <link rel="stylesheet" href="../../../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/assets/css/index.css">
</head>
<body>
    <?php include '../../component/sidebar.php'; ?>

    <div class="content">
        <?php include '../../component/header.php'; ?>

        <div class="container mt-4">
            <h1 class="mb-4">Edit Game</h1>

            <?php
            include '../../../config/koneksi.php';
            
            if (isset($_GET['id'])) {
                $id_game = $_GET['id'];
                $result = $koneksi->query("SELECT * FROM GAME WHERE id_game = '$id_game'");
                $data = $result->fetch_assoc();
            }
            ?>

            <form action="../controller/gameController.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_game" value="<?= $data['id_game'] ?>">

                <div class="mb-3">
                    <label for="judul_game" class="form-label">Judul Game</label>
                    <input type="text" class="form-control" id="judul_game" name="judul_game" value="<?= htmlspecialchars($data['judul_game']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="versi" class="form-label">Versi Game</label>
                    <input type="text" class="form-control" id="versi" name="versi" value="<?= htmlspecialchars($data['versi']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="spesifikasi" class="form-label">Spesifikasi Game</label>
                    <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" value="<?= htmlspecialchars($data['spesifikasi']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="detail_game" class="form-label">Detail Game</label>
                    <textarea class="form-control" id="detail_game" name="detail_game" rows="5" required><?= htmlspecialchars($data['detail_game']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Foto Game</label>
                    <?php if ($data['image']): ?>
                        <div class="mb-2">
                            <img src="../../public/image/game/<?= htmlspecialchars($data['image']) ?>" width="150" class="img-thumbnail">
                        </div>
                    <?php endif; ?>
                    <input type="file" class="form-control" id="image" name="image">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                </div>

                <button type="submit" name="update" class="btn btn-success">Update Game</button>
                <a href="/Riversaver_Native/backoffice/view/game.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <script src="../../../public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>