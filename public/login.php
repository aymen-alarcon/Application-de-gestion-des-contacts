<?php
    $title = "Page de Connexion";
    include '../includes/header.php';
?>
    <main class="pt-5">
        <section class="container d-flex flex-column justify-content-center align-items-center py-4">
            <div class="card-custom bg-white shadow p-4 p-sm-5 rounded-3 w-50">
                <h2 class="fw-bold text-center mb-4">
                    Connectez-vous à votre compte
                </h2>
                <form id="connectionForm" action="connectToAccount.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-secondary">Nom d'utilisateur ou e-mail</label>
                        <div class="d-flex">
                            <div class="d-flex align-items-center justify-content-center text-dark p-2 rounded-start border name-email">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <input type="text" class="form-control rounded-end" placeholder="Entrez votre nom d'utilisateur ou e-mail">
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
                    <div class="text-end mb-3">
                        <a href="#" class="text-primary-custom small text-decoration-underline">Mot de passe oublié ?</a>
                    </div>
                    <button type="submit" class="btn btn-primary text-white w-100 fw-semibold py-2">Connexion</button>
                </form>
                <div class="text-center mt-4 d-flex justify-content-center gap-2">
                    <p class="text-secondary small m-0">Pas encore de compte ?</p>
                    <a href="register.php" class="text-primary-custom small fw-semibold text-decoration-underline">Créer un compte</a>
                </div>
            </div>
        </section>
    </main>
<?php include "../includes/footer.php"; ?>