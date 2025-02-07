<?php
include '../../config/koneksi.php';

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul_galeri'];
    $tgl = $_POST['tgl_galeri'];
    $detail = $_POST['detail_galeri'];
    $id_admin = $_POST['id_admin'];
    
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $folder = "../../public/image/galeri/";
    move_uploaded_file($tmp, $folder . $image);
    
    $sql = "INSERT INTO GALERI (id_admin, judul_galeri, tgl_galeri, image, detail_galeri)
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
    $detail = $_POST['detail_galeri'];

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $folder = "../../public/image/galeri/";
        move_uploaded_file($tmp, $folder . $image);

        $sql = "UPDATE GALERI SET judul_galeri='$judul', tgl_galeri='$tgl', image='$image', detail_galeri='$detail' WHERE id_galeri='$id_galeri'";
    } else {
        $sql = "UPDATE GALERI SET judul_galeri='$judul', tgl_galeri='$tgl', detail_galeri='$detail' WHERE id_galeri='$id_galeri'";
    }
    
    $koneksi->query($sql);
    header("Location: ../view/galeri.php");
}
?>
