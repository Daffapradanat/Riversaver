<?php
include '../config/koneksi.php';

$result_berita = $koneksi->query("SELECT COUNT(*) AS total FROM BERITA");
$total_berita = $result_berita->fetch_assoc()['total'];

$result_game = $koneksi->query("SELECT COUNT(*) AS total FROM GAME");
$total_game = $result_game->fetch_assoc()['total'];

$result_galeri = $koneksi->query("SELECT COUNT(*) AS total FROM GALERI");
$total_galeri = $result_galeri->fetch_assoc()['total'];

$result_komentar = $koneksi->query("SELECT COUNT(*) AS total FROM KOMENTAR");
$total_komentar = $result_komentar->fetch_assoc()['total'];

$result_aktivitas = $koneksi->query("SELECT 'Berita' AS tipe, judul_berita AS judul, tgl_berita AS waktu FROM BERITA 
                                    UNION 
                                    SELECT 'Game' AS tipe, judul_game AS judul, NOW() AS waktu FROM GAME 
                                    UNION 
                                    SELECT 'Galeri' AS tipe, judul_galeri AS judul, tgl_galeri AS waktu FROM GALERI 
                                    ORDER BY waktu DESC LIMIT 5");
$aktivitas_terbaru = $result_aktivitas->fetch_all(MYSQLI_ASSOC);
