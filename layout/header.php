<?php include_once "../app/dataLayout.php";
include_once "../config/config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./view_login.php");

    exit();
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SEMINAR NASIONAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="d-flex flex-column flex-shrink-0 p-3 fixed-top sidebar bg-secondary-subtle" style="width: 280px; height: 100vh">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap"></use>
            </svg>
            <span class="fs-4">SEMINAR</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <?php if ($_SESSION['level'] == 'user') : ?>
                <?php foreach ($menuPeserta as $fitur) : ?>
                    <li>
                        <a href="<?= $fitur[1] ?>" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            <?= $fitur[0] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php elseif ($_SESSION['level'] == 'admin') : ?>
                <?php foreach ($menuAdmin as $fitur) : ?>
                    <li>
                        <a href="<?= $fitur[1] ?>" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            <?= $fitur[0] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif ?>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong><?= $_SESSION['nama']; ?></strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li><a class="dropdown-item" href="#">Notifikasi</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="../public/logout.php">Sign out</a></li>
            </ul>
        </div>
    </div>
    <nav class="setNavbar fixed-top navbar rounded shadow">
        <div class="container-fluid">
            <button id="sidebarToggle" class="btn btn-primary btn-sm">Sidebar</button>
        </div>
    </nav>