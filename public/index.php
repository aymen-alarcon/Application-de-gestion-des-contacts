<?php
    $title = "page d'accueil";
    include '../includes/header.php'; 

    if (isset($_SESSION["id"])) {
        header("Location: profile.php?id=" . urlencode($_SESSION["id"]));
    }
?>
    <main class="d-flex h-75 align-items-center justify-content-center">
        <section>
            <h1>Bienvenue sur ConnectSys</h1>
            <div class="d-flex align-items-center justify-content-center gap-3">
                <a href="login.php" class="btn btn-outline-primary">Se connecter</a>
                <a href="register.php" class="btn btn-outline-secondary">S’inscrire</a>
            </div>
        </section>
    </main>
<?php include "../includes/footer.php"; ?>