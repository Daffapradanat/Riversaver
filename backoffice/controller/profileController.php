<?php
session_start();
include '../../config/koneksi.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: /Riversaver_Native/login.php');
    exit();
}

$admin_id = $_SESSION['admin_id'];
$query = "SELECT username, nama_admin, alamat_admin, no_telp_admin, image FROM ADMIN WHERE id_admin='$admin_id'";
$result = mysqli_query($koneksi, $query);
$admin = mysqli_fetch_assoc($result);

$image = $admin['image'] ? "/Riversaver_Native/public/image/admin/{$admin['image']}" : "/Riversaver_Native/public/assets/profile.png";
$alamat = $admin['alamat_admin'] ? htmlspecialchars($admin['alamat_admin']) : '-';
$no_telp = $admin['no_telp_admin'] ? htmlspecialchars($admin['no_telp_admin']) : '-';

if (isset($_POST['update_profile'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $nama_admin = mysqli_real_escape_string($koneksi, $_POST['nama_admin']);
    $alamat_admin = mysqli_real_escape_string($koneksi, $_POST['alamat_admin']);
    $no_telp_admin = mysqli_real_escape_string($koneksi, $_POST['no_telp_admin']);

    if ($_FILES['image']['name']) {
        $image_name = basename($_FILES['image']['name']);
        $target_dir = '../../public/image/admin/' . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir);
    } else {
        $image_name = $admin['image'];
    }

    $update_query = "UPDATE ADMIN SET username='$username', nama_admin='$nama_admin', alamat_admin='$alamat_admin', no_telp_admin='$no_telp_admin', image='$image_name' WHERE id_admin='$admin_id'";

    if (mysqli_query($koneksi, $update_query)) {
        $_SESSION['success'] = "Profil berhasil diperbarui!";
    } else {
        $_SESSION['error'] = "Gagal memperbarui profil.";
    }
    header('Location: ../view/profile.php');
    exit();
}

if (isset($_POST['update_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $query_password = "SELECT password FROM ADMIN WHERE id_admin='$admin_id'";
    $result_password = mysqli_query($koneksi, $query_password);
    $admin_password = mysqli_fetch_assoc($result_password);

    if (password_verify($current_password, $admin_password['password'])) {
        if ($new_password === $confirm_password) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_password_query = "UPDATE ADMIN SET password='$hashed_password' WHERE id_admin='$admin_id'";

            if (mysqli_query($koneksi, $update_password_query)) {
                $_SESSION['success'] = "Password berhasil diperbarui!";
            } else {
                $_SESSION['error'] = "Gagal memperbarui password.";
            }
        } else {
            $_SESSION['error'] = "Konfirmasi password tidak cocok.";
        }
    } else {
        $_SESSION['error'] = "Password saat ini salah.";
    }
    header('Location: ../view/profile.php');
    exit();
}