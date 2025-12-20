<?php
    $title = "Créer un Compte";
    include '../includes/header.php';
?>
    <main>
        <section class="d-flex justify-content-center align-items-center py-4">
            <div class="card shadow w-50 p-5">
                <h1 class="text-center">Créer un Compte</h1>
                <form id="connectionForm" class="d-flex flex-column gap-3" action="../functions/controller.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label small text-secondary">Profile Picture</label>
                        <div class="d-flex">
                            <div class="text-dark p-2 rounded-start border name-email">
                                <i class="bi bi-image-fill"></i>
                            </div>
                            <input type="file" accept="image/png, image/jpeg" class="form-control" name="photo">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text-secondary">Adresse e-mail</label>
                        <div class="d-flex">
                            <div class="text-dark p-2 rounded-start border name-email">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <input required type="text" class="form-control" name="email" placeholder= 
                                <?php 
                                    if(isset($_GET["errorMessage"])){ 
                                        echo $_GET['errorMessage'] ;
                                    }else{ 
                                        echo "'Entrez votre adresse e-mail'";
                                    }
                                ?> 
                            >
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text-secondary">Nom d'utilisateur</label>
                        <div class="d-flex">
                            <div class="text-dark p-2 rounded-start border name-email">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <input required type="text" class="form-control" name="firstName" placeholder= 
                                <?php 
                                    if(isset($_GET["errorMessage"])){ 
                                        echo $_GET['errorMessage'];
                                    }else{ 
                                        echo "'Entrez votre nom d&#39;utilisateur'";
                                    }
                                ?>
                            >
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text-secondary">Prénom d'utilisateur</label>
                        <div class="d-flex">
                            <div class="text-dark p-2 rounded-start border name-email">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <input required type="text" class="form-control" name="lastName" placeholder=
                                <?php 
                                    if(isset($_GET["errorMessage"])){ 
                                        echo $_GET['errorMessage'];
                                    }else{ 
                                        echo "'Entrez votre nom d&#39;utilisateur'";
                                    }
                                ?>
                            >
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label small text-secondary">Mot de passe</label>
                        <div class="d-flex">
                            <div class="text-dark <?php if(isset($_GET["passwordErrorMessage"])) {echo "border-danger border-3";}?> p-2 rounded-start border password">
                                <i class="bi bi-lock-fill"></i>
                            </div>
                            <input required type="password" name="password" class="form-control <?php if(isset($_GET["passwordErrorMessage"])) {echo "border-danger border-3";}?>   " placeholder=
                                <?php 
                                    if(isset($_GET["passwordErrorMessage"])){ 
                                        echo $_GET['passwordErrorMessage'];
                                    }else{ 
                                        echo "'Entrez votre mot de passe'";
                                    }
                                ?> 
                            >
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label small text-secondary">Confirmer Mot de passe</label>
                        <div class="d-flex flex-column">
                            <div class="d-flex">
                                <div class="text-dark <?php if(isset($_GET["passwordErrorMessage"])) {echo "border-danger border-3";}?> p-2 rounded-start border confirm-password">
                                    <i class="bi bi-lock-fill"></i>
                                </div>
                                <input required type="password" name="confirmPassword" class="form-control <?php if(isset($_GET["passwordErrorMessage"])) {echo "border-danger border-3";}?>    " placeholder= 
                                    <?php 
                                        if(isset($_GET["passwordErrorMessage"])){ 
                                            echo $_GET['passwordErrorMessage'];
                                        } else{
                                            echo "'Entrez votre mot de passe'";
                                        }
                                    ?> 
                                >
                            </div>
                            <div class="password-check-container"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary text-white w-100">Créer un compte</button>
                </form>
                <div class="text-center mt-4">
                    <p class="text-secondary small">
                        Vous avez déjà un compte ?
                        <a href="login.php" class="text-primary text-decoration-underline">Se connecter</a>
                    </p>
                </div>
            </div>
        </section>
    </main>
<?php include "../includes/footer.php"; ?>