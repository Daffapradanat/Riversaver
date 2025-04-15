<?php
include '../controller/profileController.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin - Riversaver</title>
    <link rel="icon" href="../../public/assets/logo.png" type="image/png">
    <link rel="stylesheet" href="../../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/assets/css/index.css">
</head>
<body>
    <?php include '../component/sidebar.php'; ?>

    <div class="content">
        <?php include '../component/header.php'; ?>

        <div class="container mt-5">
            <div class="card shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h4 class="text-center mb-4">Profil Admin</h4>
                    <div class="text-center mb-4">
                        <img src="<?= $image ?>" alt="Profile Picture" class="rounded-circle" width="150" height="150" style="object-fit: cover;">
                    </div>

                    <table class="table table-bordered">
                        <tr>
                            <th>Username</th>
                            <td><?= htmlspecialchars($admin['username']) ?></td>
                        </tr>
                        <tr>
                            <th>Nama Admin</th>
                            <td><?= htmlspecialchars($admin['nama_admin']) ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?= $alamat ?></td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td><?= $no_telp ?></td>
                        </tr>
                    </table>

                    <div class="text-center">
                        <a href="../index.php" class="btn btn-secondary">Kembali ke Dashboard</a>
                        <a href="../controller/authController.php?logout=true" class="btn btn-danger">Logout</a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal">Update Profil</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Pilih Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <button class="btn btn-outline-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#updateProfileModal" data-bs-dismiss="modal">Update Profil</button>
                    <button class="btn btn-outline-secondary w-100" data-bs-toggle="modal" data-bs-target="#updatePasswordModal" data-bs-dismiss="modal">Update Password</button>
                </div>
            </div>
        </div>
    </div>

    <?php include '../component/updateProfile.php'; ?>
    <?php include '../component/updatePassword.php'; ?>

    <script src="/Riversaver_Native/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
