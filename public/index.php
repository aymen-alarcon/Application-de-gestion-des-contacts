<?php 
    $title = "page d'accueil";
    include '../includes/header.php'; 
?>
    <main class="d-flex h-75 align-items-center justify-content-center p-4">
        <section class="w-100 ">
            <h1 class="text-center fw-bold text-dark-custom mb-4">
                Bienvenue sur ConnectSys
            </h1>
            <div class="d-flex align-items-center justify-content-center gap-3 px-2">
                <a href="login.php" class="btn btn-outline-primary btn-rounded">S’inscrire</a>
                <a href="register.php" class="btn btn-outline-secondary btn-rounded">Se connecter</a>
            </div>
        </section>
    </main>
<?php include "../includes/footer.php"; ?>