<?php 
    session_start();
    include "../config/config.php";
    include "../functions/selectUsers.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title><?= $title ?></title>    
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg border-bottom bg-light px-3">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <img src="../assets/img/logo.png" height="36" class="me-2">
                    <span class="fw-bold text-dark">ConnectSys</span>
                </a>
                <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <?php if (isset($_SESSION["id"])): ?>
                            <li class="nav-item">
                                <a class="nav-link <?= ($title == 'Page de profile') ? 'active' : '' ?>" href="profile.php">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($title == 'Page de contact') ? 'active' : '' ?>" href="contacts.php">Contacts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($title == 'Page de Connexion') ? 'active' : '' ?>" href="logout.php">Déconnecter</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link <?= ($title == 'Page de Connexion') ? 'active' : '' ?>" href="login.php">Connexion</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>