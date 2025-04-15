<?php
include '../../config/koneksi.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../../login.php");
    exit();
}

$id_admin = $_SESSION['admin_id'];

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul_game'];
    $detail = $_POST['detail_game'];
    $versi = $_POST['versi'];
    $spesifikasi = $_POST['spesifikasi'];
    $release_date = $_POST['release_date'];
    $genre = $_POST['genre'];

    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $folder_image = "../../public/image/game/";
    move_uploaded_file($tmp_image, $folder_image . $image);

    $logo = $_FILES['logo']['name'];
    $tmp_logo = $_FILES['logo']['tmp_name'];
    move_uploaded_file($tmp_logo, $folder_image . $logo);

    $video = $_FILES['video_thriller']['name'];
    $tmp_video = $_FILES['video_thriller']['tmp_name'];
    $folder_video = "../../public/assets/video/";
    move_uploaded_file($tmp_video, $folder_video . $video);

    $videoDoc = $_FILES['video_documentation']['name'];
    $tmpVideoDoc = $_FILES['video_documentation']['tmp_name'];
    $videoDocPath = "../../public/assets/video/";
    move_uploaded_file($tmpVideoDoc, $videoDocPath . $videoDoc);

    $sql = "INSERT INTO GAME (id_admin, judul_game, image, detail_game, versi, spesifikasi, release_date, genre, video_thriller, logo, video_documentation)
    VALUES ('$id_admin', '$judul', '$image', '$detail', '$versi', '$spesifikasi', '$release_date', '$genre', '$videoThriller', '$logo', '$videoDoc')";
    
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
    $release_date = $_POST['release_date'];
    $genre = $_POST['genre'];

    $sql = "UPDATE GAME SET 
                judul_game='$judul', 
                detail_game='$detail', 
                versi='$versi', 
                spesifikasi='$spesifikasi', 
                release_date='$release_date',
                genre='$genre'";

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp_image = $_FILES['image']['tmp_name'];
        $folder_image = "../../public/image/game/";
        move_uploaded_file($tmp_image, $folder_image . $image);
        $sql .= ", image='$image'";
    }

    if (!empty($_FILES['logo']['name'])) {
        $logo = $_FILES['logo']['name'];
        $tmp_logo = $_FILES['logo']['tmp_name'];
        move_uploaded_file($tmp_logo, $folder_image . $logo);
        $sql .= ", logo='$logo'";
    }

    if (!empty($_FILES['video_thriller']['name'])) {
        $video = $_FILES['video_thriller']['name'];
        $tmp_video = $_FILES['video_thriller']['tmp_name'];
        $folder_video = "../../public/assets/video/";
        move_uploaded_file($tmp_video, $folder_video . $video);
        $sql .= ", video_thriller='$video'";
    }

    if (!empty($_FILES['video_documentation']['name'])) {
        $videoDoc = $_FILES['video_documentation']['name'];
        $tmpVideoDoc = $_FILES['video_documentation']['tmp_name'];
        $videoDocPath = "../../public/assets/video/";
        move_uploaded_file($tmpVideoDoc, $videoDocPath . $videoDoc);
        $sql .= ", video_documentation='$videoDoc'";
    }

    $sql .= " WHERE id_game='$id_game'";
    $koneksi->query($sql);
    header("Location: ../view/game.php");
}
?>
