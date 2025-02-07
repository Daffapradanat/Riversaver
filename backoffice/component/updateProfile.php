<div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProfileModalLabel">Update Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../controller/profileController.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($admin['username']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_admin" class="form-label">Nama Admin</label>
                        <input type="text" class="form-control" id="nama_admin" name="nama_admin" value="<?= htmlspecialchars($admin['nama_admin']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_admin" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat_admin" name="alamat_admin" value="<?= htmlspecialchars($admin['alamat_admin']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="no_telp_admin" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" id="no_telp_admin" name="no_telp_admin" value="<?= htmlspecialchars($admin['no_telp_admin']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Foto Profil</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" name="update_profile" class="btn btn-primary w-100">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>