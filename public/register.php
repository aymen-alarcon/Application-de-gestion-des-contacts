<?php
    $title = "Créer un Compte";
    include '../includes/header.php';

    if (isset($_GET["errorMessage"])) {
        echo "<script>alert('". $_GET["errorMessage"] ."');</script>";
    }
?>
    <main>
        <section class="container d-flex justify-content-center align-items-center min-vh-100 py-4">
            <div class="card shadow w-50 p-4 p-sm-5">
                <div class="text-center mb-4">
                    <h1 class="fw-black">Créer un Compte</h1>
                </div>
                <form id="connectionForm" class="d-flex flex-column gap-3" action="../functions/createAccount.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-secondary">Profile Picture</label>
                        <div class="d-flex">
                            <div class="d-flex align-items-center justify-content-center text-dark p-2 rounded-start border name-email">
                                <i class="bi bi-image-fill"></i>
                            </div>
                            <input type="file" class="form-control rounded-end" name="photo">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-secondary">Adresse e-mail</label>
                        <div class="d-flex">
                            <div class="d-flex align-items-center justify-content-center text-dark p-2 rounded-start border name-email">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <input type="text" class="form-control rounded-end" name="email" placeholder="Entrez votre adresse e-mail">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-secondary">Nom d'utilisateur</label>
                        <div class="d-flex">
                            <div class="d-flex align-items-center justify-content-center text-dark p-2 rounded-start border name-email">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <input type="text" class="form-control rounded-end" name="firstName" placeholder="Entrez votre nom d'utilisateur">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-secondary">Prénom d'utilisateur</label>
                        <div class="d-flex">
                            <div class="d-flex align-items-center justify-content-center text-dark p-2 rounded-start border name-email">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <input type="text" class="form-control rounded-end" name="lastName" placeholder="Entrez votre nom d'utilisateur">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold small text-secondary">Mot de passe</label>
                        <div class="d-flex">
                            <div class="d-flex align-items-center justify-content-center text-dark p-2 rounded-start border password">
                                <i class="bi bi-lock-fill"></i>
                            </div>
                            <input type="password" name="password" class="form-control rounded-end" placeholder="Entrez votre mot de passe">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold small text-secondary">Confirmer Mot de passe</label>
                        <div class="d-flex flex-column">
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-center text-dark p-2 rounded-start border confirm-password">
                                    <i class="bi bi-lock-fill"></i>
                                </div>
                                <input type="password" name="confirmPassword" class="form-control rounded-end" placeholder="Entrez votre mot de passe">
                            </div>
                            <div class="password-check-container"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary text-white fw-bold w-100 py-3">Créer un compte</button>
                </form>
                <div class="text-center mt-4">
                    <p class="text-secondary small">
                        Vous avez déjà un compte ?
                        <a href="login.php" class="text-primary fw-medium text-decoration-underline">
                            Se connecter
                        </a>
                    </p>
                </div>
            </div>
        </section>
    </main>
<?php include "../includes/footer.php"; ?>