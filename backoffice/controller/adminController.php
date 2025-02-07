<?php
include '../../config/koneksi.php';

if (isset($_POST['tambah'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $nama_admin = $_POST['nama_admin'];
    $alamat_admin = $_POST['alamat_admin'];
    $no_telp_admin = $_POST['no_telp_admin'];
    
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $folder = "../../public/image/admin/";
    move_uploaded_file($tmp, $folder . $image);
    
    $sql = "INSERT INTO ADMIN (username, password, nama_admin, alamat_admin, no_telp_admin, image)
            VALUES ('$username', '$password', '$nama_admin', '$alamat_admin', '$no_telp_admin', '$image')";
    $koneksi->query($sql);
    
    header("Location: ../view/admin.php");
}

if (isset($_GET['hapus'])) {
    $id_admin = $_GET['hapus'];
    $sql = "DELETE FROM ADMIN WHERE id_admin='$id_admin'";
    $koneksi->query($sql);
    
    header("Location: ../view/admin.php");
}

if (isset($_POST['update'])) {
    $id_admin = $_POST['id_admin'];
    $username = $_POST['username'];
    $nama_admin = $_POST['nama_admin'];
    $alamat_admin = $_POST['alamat_admin'];
    $no_telp_admin = $_POST['no_telp_admin'];

    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $password_sql = ", password='$password'";
    } else {
        $password_sql = "";
    }

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $folder = "../../public/image/admin/";
        move_uploaded_file($tmp, $folder . $image);
        
        $sql = "UPDATE ADMIN SET username='$username', nama_admin='$nama_admin', alamat_admin='$alamat_admin', no_telp_admin='$no_telp_admin', image='$image' $password_sql WHERE id_admin='$id_admin'";
    } else {
        $sql = "UPDATE ADMIN SET username='$username', nama_admin='$nama_admin', alamat_admin='$alamat_admin', no_telp_admin='$no_telp_admin' $password_sql WHERE id_admin='$id_admin'";
    }

    $koneksi->query($sql);
    header("Location: ../view/admin.php");
}
?>