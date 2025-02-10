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
    $tgl = $_POST['tgl_berita'];
    $detail = $_POST['detail_berita'];

    $foto = $_FILES['foto_berita']['name'];
    $tmp = $_FILES['foto_berita']['tmp_name'];
    $folder = "../../public/image/berita/";
    move_uploaded_file($tmp, $folder . $foto);

    $sql = "INSERT INTO BERITA (id_admin, judul_berita, tgl_berita, foto_berita, detail_berita)
            VALUES ('$id_admin', '$judul', '$tgl', '$foto', '$detail')";
    $koneksi->query($sql);

    header("Location: ../view/berita.php");
}

if (isset($_GET['hapus'])) {
    $id_berita = $_GET['hapus'];
    $sql = "DELETE FROM BERITA WHERE id_berita='$id_berita'";
    $koneksi->query($sql);

    header("Location: ../view/berita.php");
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

        $sql = "UPDATE BERITA SET id_admin='$id_admin', judul_berita='$judul', tgl_berita='$tgl', foto_berita='$foto', detail_berita='$detail' WHERE id_berita='$id_berita'";
    } else {
        $sql = "UPDATE BERITA SET id_admin='$id_admin', judul_berita='$judul', tgl_berita='$tgl', detail_berita='$detail' WHERE id_berita='$id_berita'";
    }

    $koneksi->query($sql);
    header("Location: ../view/berita.php");
}
?>
