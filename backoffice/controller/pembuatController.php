<?php
include '../../config/koneksi.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: /Riversaver_Native/auth/login.php");
    exit();
}

$id_admin = $_SESSION['admin_id'];

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_pembuat'];
    $pendidikan = $_POST['pendidikan_pembuat'];
    $detail = $_POST['detail_pembuat'];
    // $id_admin = $_POST['id_admin']; 
    
    $foto = $_FILES['foto_pembuat']['name'];
    $tmp = $_FILES['foto_pembuat']['tmp_name'];
    $folder = "../../public/image/pembuat/";
    move_uploaded_file($tmp, $folder . $foto);
    
    $sql = "INSERT INTO PEMBUAT (id_admin, nama_pembuat, pendidikan_pembuat, detail_pembuat, foto_pembuat)
            VALUES ('$id_admin', '$nama', '$pendidikan', '$detail', '$foto')";
    $koneksi->query($sql);
    
    header("Location: ../view/pembuat.php");
}

if (isset($_GET['hapus'])) {
    $id_pembuat = $_GET['hapus'];
    $sql = "DELETE FROM PEMBUAT WHERE id_pembuat='$id_pembuat'";
    $koneksi->query($sql);
    
    header("Location: ../view/pembuat.php");
}

if (isset($_POST['update'])) {
    $id_pembuat = $_POST['id_pembuat'];
    $nama = $_POST['nama_pembuat'];
    $pendidikan = $_POST['pendidikan_pembuat'];
    $detail = $_POST['detail_pembuat'];

    if (!empty($_FILES['foto_pembuat']['name'])) {
        $foto = $_FILES['foto_pembuat']['name'];
        $tmp = $_FILES['foto_pembuat']['tmp_name'];
        $folder = "../../public/image/pembuat/";
        move_uploaded_file($tmp, $folder . $foto);
        
        $sql = "UPDATE PEMBUAT SET nama_pembuat='$nama', pendidikan_pembuat='$pendidikan', detail_pembuat='$detail', foto_pembuat='$foto' WHERE id_pembuat='$id_pembuat'";
    } else {
        $sql = "UPDATE PEMBUAT SET nama_pembuat='$nama', pendidikan_pembuat='$pendidikan', detail_pembuat='$detail' WHERE id_pembuat='$id_pembuat'";
    }
    
    $koneksi->query($sql);
    header("Location: ../view/pembuat.php");
}
?>
