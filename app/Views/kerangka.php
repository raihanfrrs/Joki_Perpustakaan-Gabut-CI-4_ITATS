<!doctype html>
<html lang="en">

<?php
$request = \Config\Services::request();
$segment = $request->uri->getSegment(1);
$session = session();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan Ceria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- Bagian Navbar -->
        <nav class="navbar mt-4 mb-2 navbar-expand-lg bg-primary rounded-3" data-bs-theme="dark" style="background-color: purple !important;">
            <div class="container-fluid">
                <a class="navbar-brand" href="">Perpustakaan Gabut</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?= ($segment == 'home') ? 'active' : '' ?>" aria-current="page" href="<?= base_url('home') ?>">Home</a>
                        </li>
                        <?php if ($session->get('logged_in')): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= ($segment == 'koleksi') ? 'active' : '' ?>" href="<?= base_url('koleksi') ?>">Informasi Koleksi</a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link <?= ($segment == 'kontak') ? 'active' : '' ?>" href="<?= base_url('kontak') ?>">Kontak</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <?php if ($session->get('logged_in')): ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="<?= base_url('logout') ?>">Logout</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="<?= base_url('login') ?>">Login</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="alert alert-primary" role="alert">
            <h1>Sistem Perpustakaan </h1>
            <p>Selamat datang di Sistem Perpustakaan kami, sebuah platform yang dirancang untuk memberikan pengalaman membaca terbaik dan memudahkan pencarian buku favorit Anda.</p>
        </div>
        <hr>

        <div class="card mb-2">
            <div class="card-body">
                <!-- ini adalah bagian isi -->
                <?= $this->renderSection('isi_web') ?>

            </div>
        </div>
        <hr>

        <footer class="bg-primary rounded-3 text-center text-lg-start mb-2 text-white" style="background-color: purple !important;">
            <!-- Copyright -->
            <div class="text-center p-3 fw-bold" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2024 Copyright:
                <a class="text-white" href="#">Sistem Informasi Perpustakaan</a>
            </div>
            <!-- Copyright -->
        </footer>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>