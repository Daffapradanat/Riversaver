<?php
include '../../config/koneksi.php';

$merchandise = $koneksi->query("SELECT * FROM MERCHANDISE");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Merchandise</title>
    <link rel="icon" href="/Riversaver_Native/public/assets/logo.png" type="image/png">
    <link rel="stylesheet" href="../../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/assets/datatable/datatables.min.css">
    <link rel="stylesheet" href="../../public/assets/css/index.css">
</head>
<body>
    <?php include '../component/sidebar.php'; ?>

    <div class="content">
        <?php include '../component/header.php'; ?>

        <div class="container mt-4">
            <h1 class="mb-4">Daftar Merchandise</h1>
            <a href="tambah/tambah_merchandise.php" class="btn btn-primary mb-3">Tambah Merchandise</a>

            <table id="merchandiseTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Detail</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; while($row = $merchandise->fetch_assoc()): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['nama_merchan']) ?></td>
                        <td>Rp <?= number_format($row['harga_merchan'], 2, ',', '.') ?></td>
                        <td>
                            <?php if ($row['foto_merchan']): ?>
                                <img src="../../public/image/merchandise/<?= htmlspecialchars($row['foto_merchan']) ?>" width="100" class="img-thumbnail">
                            <?php else: ?>
                                Tidak ada foto
                            <?php endif; ?>
                        </td>
                        <td><?= substr(htmlspecialchars($row['detail_merchan']), 0, 100) ?>...</td>
                        <td>
                            <a href="edit/edit_merchendise.php?id=<?= $row['id_merchan'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" onclick="setDeleteUrl(<?= $row['id_merchan'] ?>)">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
            Apakah kamu yakin ingin menghapus merchandise ini?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <a href="#" id="deleteConfirmBtn" class="btn btn-danger">Hapus</a>
        </div>
        </div>
    </div>
    </div>

    <script src="../../public/assets/js/jquery-3.7.1.min.js"></script>
    <script src="../../public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/assets/datatable/datatables.min.js"></script>
    <script>
        function setDeleteUrl(id) {
            const deleteBtn = document.getElementById('deleteConfirmBtn');
            deleteBtn.href = `../controller/merchendiseController.php?hapus=${id}`;
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#merchandiseTable').DataTable({
                paging: true,
                searching: true,
                responsive: true,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ entri per halaman",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    },  
                    zeroRecords: "Tidak ditemukan data yang sesuai",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                    infoFiltered: "(disaring dari _MAX_ total entri)"
                }
            });
        });
    </script>
</body>
</html>
