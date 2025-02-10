<?php
include '../../config/koneksi.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: /Riversaver_Native/auth/login.php");
    exit();
}

$id_admin = $_SESSION['admin_id'];

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul_game'];
    $detail = $_POST['detail_game'];
    $versi = $_POST['versi'];
    $spesifikasi = $_POST['spesifikasi'];
    // $id_admin = $_POST['id_admin']; 

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $folder = "../../public/image/game/";
    move_uploaded_file($tmp, $folder . $image);

    $sql = "INSERT INTO GAME (id_admin, judul_game, image, detail_game, versi, spesifikasi)
            VALUES ('$id_admin', '$judul', '$image', '$detail', '$versi', '$spesifikasi')";
    $koneksi->query($sql);

    header("Location: ../view/game.php");
}

if (isset($_GET['hapus'])) {
    $id_game = $_GET['hapus'];
    $sql = "DELETE FROM GAME WHERE id_game='$id_game'";
    $koneksi->query($sql);

    header("Location: ../view/game.php");
}

if (isset($_POST['update'])) {
    $id_game = $_POST['id_game'];
    $judul = $_POST['judul_game'];
    $detail = $_POST['detail_game'];
    $versi = $_POST['versi'];
    $spesifikasi = $_POST['spesifikasi'];

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $folder = "../../public/image/game/";
        move_uploaded_file($tmp, $folder . $image);

        $sql = "UPDATE GAME SET judul_game='$judul', image='$image', detail_game='$detail', versi='$versi', spesifikasi='$spesifikasi' WHERE id_game='$id_game'";
    } else {
        $sql = "UPDATE GAME SET judul_game='$judul', detail_game='$detail', versi='$versi', spesifikasi='$spesifikasi' WHERE id_game='$id_game'";
    }

    $koneksi->query($sql);
    header("Location: ../view/game.php");
}
?>