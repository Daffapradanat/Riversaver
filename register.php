<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin - Riversaver</title>
    <link rel="icon" href="/Riversaver_Native/public/assets/logo.png" type="image/png">
    <link rel="stylesheet" href="/Riversaver_Native/public/assets/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light d-flex align-items-center" style="height: 100vh;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h4 class="text-center mb-4">Register</h4>

                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="backoffice/controller/authController.php" method="POST">
                        <input type="hidden" name="register" value="1">
                        
                        <div class="mb-3">
                            <label for="nama_admin" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_admin" id="nama_admin" required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Register</button>
                    </form>

                    <div class="text-center mt-3">
                        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/Riversaver_Native/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
