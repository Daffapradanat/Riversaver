<?php
include '../../config/koneksi.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

$id_admin = $_SESSION['admin_id'];

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_pembuat'];
    $pendidikan = $_POST['pendidikan_pembuat'];
    $detail = $_POST['detail_pembuat'];
    $kode_negara = $_POST['kode_negara'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $sosmed = $_POST['sosmed'];
    
    $foto = $_FILES['foto_pembuat']['name'];
    $tmp = $_FILES['foto_pembuat']['tmp_name'];
    $folder = "../../../public/image/pembuat/";
    move_uploaded_file($tmp, $folder . $foto);
    
    $sql = "INSERT INTO PEMBUAT (id_admin, nama_pembuat, pendidikan_pembuat, detail_pembuat, foto_pembuat, kode_negara, no_telp, email, sosmed)
            VALUES ('$id_admin', '$nama', '$pendidikan', '$detail', '$foto', '$kode_negara', '$no_telp', '$email', '$sosmed')";
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
    $kode_negara = $_POST['kode_negara'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $sosmed = $_POST['sosmed'];

    if (!empty($_FILES['foto_pembuat']['name'])) {
        $foto = $_FILES['foto_pembuat']['name'];
        $tmp = $_FILES['foto_pembuat']['tmp_name'];
        $folder = "../../../public/image/pembuat/";
        move_uploaded_file($tmp, $folder . $foto);
        
        $sql = "UPDATE PEMBUAT SET 
        nama_pembuat='$nama', 
        pendidikan_pembuat='$pendidikan', 
        detail_pembuat='$detail', 
        foto_pembuat='$foto',
        kode_negara='$kode_negara',
        no_telp='$no_telp',
        email='$email',
        sosmed='$sosmed' 
        WHERE id_pembuat='$id_pembuat'";
    } else {
    $sql = "UPDATE PEMBUAT SET 
            nama_pembuat='$nama', 
            pendidikan_pembuat='$pendidikan', 
            detail_pembuat='$detail',
            kode_negara='$kode_negara',
            no_telp='$no_telp',
            email='$email',
            sosmed='$sosmed' 
            WHERE id_pembuat='$id_pembuat'";
    }
    
    $koneksi->query($sql);
    header("Location: ../view/pembuat.php");
}
?>
