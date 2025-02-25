<?php
include '../../config/koneksi.php';

if (isset($_GET['hapus'])) {
    $id_komentar = $_GET['hapus'];
    $sql = "DELETE FROM KOMENTAR WHERE id_komentar='$id_komentar'";
    $koneksi->query($sql);

    header("Location: ../../home.php");
    exit();
}
    
if (isset($_POST['tambah'])) {
    $nama_tamu = $_POST['nama_tamu'];
    $komentar = $_POST['komentar'];

    $sql = "INSERT INTO KOMENTAR (nama_tamu, komentar) VALUES ('$nama_tamu', '$komentar')";
    $koneksi->query($sql);

    header("Location: ../../home.php");
    exit();
}

if (isset($_POST['update'])) {
    $id_komentar = $_POST['id_komentar'];
    $nama_tamu = $_POST['nama_tamu'];
    $komentar = $_POST['komentar'];

    $sql = "UPDATE KOMENTAR SET nama_tamu='$nama_tamu', komentar='$komentar' WHERE id_komentar='$id_komentar'";
    $koneksi->query($sql);

    header("Location: ../../home.php");
    exit();
}
?>
