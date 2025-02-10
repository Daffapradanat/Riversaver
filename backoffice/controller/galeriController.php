<?php
include '../../config/koneksi.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: /Riversaver_Native/login.php");
    exit();
}

$id_admin = $_SESSION['admin_id'];

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul_galeri'];
    $tgl = $_POST['tgl_galeri'];
    $detail = $_POST['deskripsi_galeri'];
    
    $image = $_FILES['foto_galeri']['name'];
    $tmp = $_FILES['foto_galeri']['tmp_name'];
    $folder = "../../public/image/galeri/";
    move_uploaded_file($tmp, $folder . $image);
    
    $sql = "INSERT INTO GALERI (id_admin, judul_galeri, tgl_galeri, foto_galeri, detail_galeri)
            VALUES ('$id_admin', '$judul', '$tgl', '$image', '$detail')";
    $koneksi->query($sql);
    
    header("Location: ../view/galeri.php");
}

if (isset($_GET['hapus'])) {
    $id_galeri = $_GET['hapus'];
    $sql = "DELETE FROM GALERI WHERE id_galeri='$id_galeri'";
    $koneksi->query($sql);
    
    header("Location: ../view/galeri.php");
}

if (isset($_POST['update'])) {
    $id_galeri = $_POST['id_galeri'];
    $judul = $_POST['judul_galeri'];
    $tgl = $_POST['tgl_galeri'];
    $detail = $_POST['deskripsi_galeri'];

    if (!empty($_FILES['foto_galeri']['name'])) {
        $image = $_FILES['foto_galeri']['name'];
        $tmp = $_FILES['foto_galeri']['tmp_name'];
        $folder = "../../public/image/galeri/";
        move_uploaded_file($tmp, $folder . $image);

        $sql = "UPDATE GALERI SET judul_galeri='$judul', tgl_galeri='$tgl', foto_galeri='$image', detail_galeri='$detail' WHERE id_galeri='$id_galeri'";
    } else {
        $sql = "UPDATE GALERI SET judul_galeri='$judul', tgl_galeri='$tgl', detail_galeri='$detail' WHERE id_galeri='$id_galeri'";
    }
    
    $koneksi->query($sql);
    header("Location: ../view/galeri.php");
}
?>
