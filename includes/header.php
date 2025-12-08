<?php 
    session_start();
    include "../config/db.php";

    if (isset($_SESSION["id"])) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $conn -> prepare($sql);
        $stmt -> execute([$_SESSION['id']]);
        $userInfo = $stmt -> fetch(PDO::FETCH_ASSOC);
    }
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
        <nav class="navbar navbar-expand-lg border-bottom px-3" style="background-color: #f6f6f8; height: 64px;">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <img src="../assets/img/logo.png" alt="ConnectSys Logo" height="36" class="me-2">
                    <span class="fw-bold text-dark">ConnectSys</span>
                </a>
                <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold <?php echo ($title == 'Page de profile') ? 'active' : ''; ?>" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold <?php echo ($title == 'Page de contact') ? 'active' : ''; ?>" href="contacts.php">Contacts</a>
                        </li>
                        <li class="nav-item">
                            <?php if (!isset($_SESSION["id"])): ?>
                                <a class="nav-link fw-semibold <?= ($title == 'Page de Connexion') ? 'active' : '' ?>" href="login.php">
                                    Connexion
                                </a>
                            <?php else: ?>
                                <span class="nav-link fw-semibold">
                                    <?php echo $userInfo["firstName"] . " ". $userInfo["lastName"]; ?>
                            </span>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>