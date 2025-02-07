<?php
include '../../config/koneksi.php';

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul_berita'];
    $tgl = $_POST['tgl_berita'];
    $detail = $_POST['detail_berita'];
    $id_admin = $_POST['id_admin']; 
    
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
        
        $sql = "UPDATE BERITA SET judul_berita='$judul', tgl_berita='$tgl', foto_berita='$foto', detail_berita='$detail' WHERE id_berita='$id_berita'";
    } else {
        $sql = "UPDATE BERITA SET judul_berita='$judul', tgl_berita='$tgl', detail_berita='$detail' WHERE id_berita='$id_berita'";
    }
    
    $koneksi->query($sql);
    header("Location: ../view/berita.php");
}
?>