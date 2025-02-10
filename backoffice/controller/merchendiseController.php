<?php
include '../../config/koneksi.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: /Riversaver_Native/auth/login.php");
    exit();
}

$id_admin = $_SESSION['admin_id'];

if (isset($_POST['tambah'])) {
    $nama_merchan = $_POST['nama_merchan'];
    $harga_merchan = $_POST['harga_merchan'];
    $detail_merchan = $_POST['detail_merchan'];
    // $id_admin = $_POST['id_admin'];
    
    $foto_merchan = $_FILES['foto_merchan']['name'];
    $tmp = $_FILES['foto_merchan']['tmp_name'];
    $folder = "../../public/image/merchandise/";
    move_uploaded_file($tmp, $folder . $foto_merchan);

    $sql = "INSERT INTO MERCHANDISE (id_admin, nama_merchan, foto_merchan, harga_merchan, detail_merchan)
            VALUES ('$id_admin', '$nama_merchan', '$foto_merchan', '$harga_merchan', '$detail_merchan')";
    $koneksi->query($sql);
    
    header("Location: ../view/merchandise.php");
}

if (isset($_GET['hapus'])) {
    $id_merchan = $_GET['hapus'];
    
    $result = $koneksi->query("SELECT foto_merchan FROM MERCHANDISE WHERE id_merchan='$id_merchan'");
    $data = $result->fetch_assoc();
    if ($data['foto_merchan']) {
        unlink("../../public/image/merchandise/" . $data['foto_merchan']);
    }

    $sql = "DELETE FROM MERCHANDISE WHERE id_merchan='$id_merchan'";
    $koneksi->query($sql);
    
    header("Location: ../view/merchandise.php");
}

if (isset($_POST['update'])) {
    $id_merchan = $_POST['id_merchan'];
    $nama_merchan = $_POST['nama_merchan'];
    $harga_merchan = $_POST['harga_merchan'];
    $detail_merchan = $_POST['detail_merchan'];

    if (!empty($_FILES['foto_merchan']['name'])) {
        $foto_merchan = $_FILES['foto_merchan']['name'];
        $tmp = $_FILES['foto_merchan']['tmp_name'];
        $folder = "../../public/image/merchandise/";
        move_uploaded_file($tmp, $folder . $foto_merchan);

        $result = $koneksi->query("SELECT foto_merchan FROM MERCHANDISE WHERE id_merchan='$id_merchan'");
        $data = $result->fetch_assoc();
        if ($data['foto_merchan']) {
            unlink("../../public/image/merchandise/" . $data['foto_merchan']);
        }

        $sql = "UPDATE MERCHANDISE SET nama_merchan='$nama_merchan', foto_merchan='$foto_merchan', harga_merchan='$harga_merchan', detail_merchan='$detail_merchan' WHERE id_merchan='$id_merchan'";
    } else {
        $sql = "UPDATE MERCHANDISE SET nama_merchan='$nama_merchan', harga_merchan='$harga_merchan', detail_merchan='$detail_merchan' WHERE id_merchan='$id_merchan'";
    }

    $koneksi->query($sql);
    header("Location: ../view/merchandise.php");
}
?>