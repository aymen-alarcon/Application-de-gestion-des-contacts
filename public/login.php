<?php
    $title = "Page de Connexion";
    include '../includes/header.php';
?>
    <main class="pt-5">
        <section class="d-flex flex-column justify-content-center align-items-center">
            <div class="shadow p-5 rounded-3">
                <h2>Connectez-vous à votre compte</h2>
                <form id="connectionForm" action="../functions/connectToAccount.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label small text-secondary">e-mail</label>
                        <div class="d-flex">
                            <div class="text-dark p-2 rounded-start border name-email">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <input type="text" name="email" class="form-control" required placeholder="Entrez votre nom d'utilisateur ou e-mail">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label small text-secondary">Mot de passe</label>
                        <div class="d-flex">
                            <div class="text-dark p-2 rounded-start border password">
                                <i class="bi bi-lock-fill"></i>
                            </div>
                            <input type="password" name="password" class="form-control" required placeholder="Entrez votre mot de passe">
                        </div>
                    </div>
                    <div class="text-end mb-3">
                        <a href="#" class="text-primary small">Mot de passe oublié ?</a>
                    </div>
                    <button type="submit" class="btn btn-primary text-white w-100 py-2">Connexion</button>
                </form>
                <div class="text-center mt-4 d-flex justify-content-center gap-2">
                    <p class="text-secondary small m-0">Pas encore de compte ?</p>
                    <a href="register.php" class="text-primary small">Créer un compte</a>
                </div>
            </div>
        </section>
    </main>
<?php include "../includes/footer.php"; ?>