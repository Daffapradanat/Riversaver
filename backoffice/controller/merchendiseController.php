<?php
include '../../config/koneksi.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: /Riversaver_Native/auth/login.php");
    exit();
}

$id_admin = $_SESSION['admin_id'];

if (isset($_POST['tambah'])) {
    $nama_merchan = $koneksi->real_escape_string($_POST['nama_merchan']);
    $harga_merchan = $koneksi->real_escape_string($_POST['harga_merchan']);
    $detail_merchan = $koneksi->real_escape_string($_POST['detail_merchan']);

    $foto_merchan = "";
    if (!empty($_FILES['foto_merchan']['name'])) {
        $foto_merchan = str_replace(' ', '_', $_FILES['foto_merchan']['name']);
        $tmp = $_FILES['foto_merchan']['tmp_name'];
        $folder = "../../public/image/merchandise/";

        if (move_uploaded_file($tmp, $folder . $foto_merchan)) {
            $stmt = $koneksi->prepare("INSERT INTO MERCHANDISE (id_admin, nama_merchan, foto_merchan, harga_merchan, detail_merchan) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $id_admin, $nama_merchan, $foto_merchan, $harga_merchan, $detail_merchan);
            $stmt->execute();
            $stmt->close();
        }
    }

    header("Location: ../view/merchandise.php");
    exit();
}

if (isset($_GET['hapus'])) {
    $id_merchan = intval($_GET['hapus']);

    $stmt = $koneksi->prepare("SELECT foto_merchan FROM MERCHANDISE WHERE id_merchan = ?");
    $stmt->bind_param("i", $id_merchan);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();

    if ($data && $data['foto_merchan']) {
        $file_path = "../../public/image/merchandise/" . $data['foto_merchan'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    $stmt = $koneksi->prepare("DELETE FROM MERCHANDISE WHERE id_merchan = ?");
    $stmt->bind_param("i", $id_merchan);
    $stmt->execute();
    $stmt->close();

    header("Location: ../view/merchandise.php");
    exit();
}

if (isset($_POST['update'])) {
    $id_merchan = intval($_POST['id_merchan']);
    $nama_merchan = $koneksi->real_escape_string($_POST['nama_merchan']);
    $harga_merchan = $koneksi->real_escape_string($_POST['harga_merchan']);
    $detail_merchan = $koneksi->real_escape_string($_POST['detail_merchan']);

    if (!empty($_FILES['foto_merchan']['name'])) {
        $foto_merchan = str_replace(' ', '_', $_FILES['foto_merchan']['name']);
        $tmp = $_FILES['foto_merchan']['tmp_name'];
        $folder = "../../public/image/merchandise/";

        $stmt = $koneksi->prepare("SELECT foto_merchan FROM MERCHANDISE WHERE id_merchan = ?");
        $stmt->bind_param("i", $id_merchan);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();

        if ($data && $data['foto_merchan']) {
            $file_path = "../../public/image/merchandise/" . $data['foto_merchan'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        if (move_uploaded_file($tmp, $folder . $foto_merchan)) {
            $stmt = $koneksi->prepare("UPDATE MERCHANDISE SET nama_merchan = ?, foto_merchan = ?, harga_merchan = ?, detail_merchan = ? WHERE id_merchan = ?");
            $stmt->bind_param("ssssi", $nama_merchan, $foto_merchan, $harga_merchan, $detail_merchan, $id_merchan);
            $stmt->execute();
            $stmt->close();
        }
    } else {
        $stmt = $koneksi->prepare("UPDATE MERCHANDISE SET nama_merchan = ?, harga_merchan = ?, detail_merchan = ? WHERE id_merchan = ?");
        $stmt->bind_param("sssi", $nama_merchan, $harga_merchan, $detail_merchan, $id_merchan);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: ../view/merchandise.php");
    exit();
}
?>