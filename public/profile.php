<?php
    $title = "Page de profile";
    date_default_timezone_set('Africa/Casablanca');
    include '../includes/header.php';
?>
    <div class="container-fluid mt-4 p-5">
        <main>
            <header class="mb-4">
                <h1 class="fw-bold display-6">Bienvenue, <?php if(isset($_SESSION["id"])) { echo $userInfo["firstName"] . " " . $userInfo["lastName"];};?>!</h1>
                <p class="text-muted">Gérez les informations de votre profil et vos paramètres ici.</p>
            </header>
            <section class="card p-4 shadow-sm mb-4">
                <h2 class="fs-3 fw-bold border-bottom pb-3">Mes Informations</h2>

                <div class="row pt-4 gy-3">
                    <div class="col-md-3 text-muted">Nom d'utilisateur</div>
                    <div class="col-md-9"><?php if(isset($_SESSION["id"])){ echo $userInfo["firstName"] ;}?></div>
                    <div class="col-md-3 text-muted">Email</div>
                    <div class="col-md-9"><?php if(isset($_SESSION["id"])){ echo $userInfo["firstName"] ;}?>@gmail.com</div>
                    <div class="col-md-3 text-muted">Date d'inscription</div>
                    <div class="col-md-9"><?php if(isset($_SESSION["id"])){ echo $userInfo["dateInscription"] ;}?></div>
                </div>
            </section>
            <section class="card p-4 shadow-sm mb-4">
                <h2 class="fs-3 fw-bold border-bottom pb-3">Session Actuelle</h2>
                <div class="row pt-4 gy-3">
                    <div class="col-md-3 text-muted">Heure de connexion</div>
                    <div class="col-md-9 d-flex align-items-center gap-2">
                        <span class="material-symbols-outlined">schedule</span>
                        <?php
                            if (!isset($_SESSION['session_start_time'])) {
                                $_SESSION['session_start_time'] = time();
                            }
                            
                            echo date('Y-m-d H:i:s', $_SESSION['session_start_time']);
                        ?>
                    </div>
                </div>
            </section>
            <section class="card border-dashed p-4 shadow-sm">
                <h3 class="fw-bold mb-2">Gérer les Contacts</h3>
                <p class="text-muted">Organisez et accédez à votre liste de contacts personnels et professionnels.</p>
                <a href="contacts.php?userId=<?php echo $_SESSION["id"]?>" class="btn btn-primary d-flex align-items-center gap-2 px-4 py-2 mt-2 w-25">
                    Gérer mes contacts <i class="bi bi-arrow-right"></i>
                </a>
            </section>
        </main>
    </div>
<?php include "../includes/footer.php"; ?>