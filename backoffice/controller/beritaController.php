<?php
include '../../config/koneksi.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: /Riversaver_Native/auth/login.php");
    exit();
}

$id_admin = $_SESSION['admin_id'];

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul_berita'];
    $tgl = date('Y-m-d');
    $detail = $_POST['detail_berita'];

    $foto = $_FILES['foto_berita']['name'];
    $tmp = $_FILES['foto_berita']['tmp_name'];
    $folder = "../../public/image/berita/";
    move_uploaded_file($tmp, $folder . $foto);

    $stmt = $koneksi->prepare("INSERT INTO BERITA (id_admin, judul_berita, tgl_berita, foto_berita, detail_berita) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $id_admin, $judul, $tgl, $foto, $detail);
    $stmt->execute();
    $stmt->close();

    header("Location: ../view/berita.php");
    exit();
}

if (isset($_GET['hapus'])) {
    $id_berita = $_GET['hapus'];
    $stmt = $koneksi->prepare("DELETE FROM BERITA WHERE id_berita = ?");
    $stmt->bind_param("i", $id_berita);
    $stmt->execute();
    $stmt->close();

    header("Location: ../view/berita.php");
    exit();
}

if (isset($_POST['update'])) {
    $id_berita = $_POST['id_berita'];
    $judul = $_POST['judul_berita'];
    $tgl = $_POST['tgl_berita'];
    $detail = $_POST['detail_berita'];

    if (!empty($_FILES['foto_berita']['name'])) {
        $foto = $_FILES['foto_berita']['name'];
        $tmp = $_FILES['foto_berita']['tmp_name'];
        $folder = "../../public/image/berita/";
        move_uploaded_file($tmp, $folder . $foto);

        $stmt = $koneksi->prepare("UPDATE BERITA SET id_admin = ?, judul_berita = ?, tgl_berita = ?, foto_berita = ?, detail_berita = ? WHERE id_berita = ?");
        $stmt->bind_param("issssi", $id_admin, $judul, $tgl, $foto, $detail, $id_berita);
    } else {
        $stmt = $koneksi->prepare("UPDATE BERITA SET id_admin = ?, judul_berita = ?, tgl_berita = ?, detail_berita = ? WHERE id_berita = ?");
        $stmt->bind_param("isssi", $id_admin, $judul, $tgl, $detail, $id_berita);
    }
    $stmt->execute();
    $stmt->close();

    header("Location: ../view/berita.php");
    exit();
}
?>