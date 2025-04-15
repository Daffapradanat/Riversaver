<?php
session_start();
include '../../config/koneksi.php';

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $nama_admin = mysqli_real_escape_string($koneksi, $_POST['nama_admin']);

    $checkQuery = "SELECT * FROM ADMIN WHERE username='$username'";
    $checkResult = mysqli_query($koneksi, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['error'] = 'Username sudah digunakan!';
        header('Location: ../../register.php');
        exit();
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $insertQuery = "INSERT INTO ADMIN (username, password, nama_admin) 
                        VALUES ('$username', '$hashedPassword', '$nama_admin')";
        
        if (mysqli_query($koneksi, $insertQuery)) {
            $_SESSION['success'] = 'Registrasi berhasil! Silakan login.';
            header('Location: ../../login.php');
            exit();
        } else {
            $_SESSION['error'] = 'Terjadi kesalahan saat registrasi!';
            header('Location: ../../register.php');
            exit();
        }
    }
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = "SELECT * FROM ADMIN WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['admin_id'] = $user['id_admin'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama_admin'] = $user['nama_admin'];

            header('Location: ../../backoffice/index.php');
            exit();
        } else {
            $_SESSION['error'] = 'Password salah!';
        }
    } else {
        $_SESSION['error'] = 'Username tidak ditemukan!';
    }

    header('Location: ../../login.php');
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../../login.php');
    exit();
}

function checkAuth() {
    if (!isset($_SESSION['admin_id'])) {
        header('Location: ../../login.php');
        exit();
    }
}