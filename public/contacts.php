<?php
    $title = "Page de contact";
    include '../includes/header.php';

    if (isset($_GET["errorMessage"])) {
        echo "<script>alert('" . $_GET["errorMessage"] . "')</script>";
    }

    $sql = "SELECT * FROM contacts WHERE userId = ?";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute([$_SESSION["id"]]);
    $userContacts = $stmt -> fetchAll(PDO::FETCH_ASSOC);
?>
    <div class="modal fade" id="modifyContact" tabindex="-1" role="dialog" aria-labelledby="modifyContactLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modifyContactLabel">Modify Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editContactForm" action="../functions/modifyContact.php">
                        <input type="hidden" name="id" id="contactId">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" placeholder="Aymen" minlength="2">
                            <div class="form-text">Requis, 2 caractères minimum.</div>
                        </div>
                        <div class="mb-3">
                            <label for="Prénom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" name="prenom" placeholder="Oumaalla" minlength="2">
                            <div class="form-text">Requis, 2 caractères minimum.</div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" name="phone" pattern="[+\-\s\(\)0-9]*" placeholder="+212 629 474 030">
                            <div class="form-text">Optionnel.</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Aymen.Oumaalla@email.com">
                            <div class="form-text">Requis, format email valide.</div>
                        </div>
                        <div class="mb-3">
                            <label for="Ville" class="form-label">Ville</label>
                            <input class="form-control" name="ville" placeholder="Marrakech">
                            <div class="form-text">Optionnel</div>
                        </div>
                        <div class="mb-3">
                            <label for="Paye" class="form-label">Paye</label>
                            <input class="form-control" name="paye" placeholder="Maroc">
                            <div class="form-text">Optionnel</div>
                        </div>
                        <div class="mb-3">
                            <label for="restOfAddress" class="form-label">rest Of the Address</label>
                            <input class="form-control" name="restofaddress" placeholder="4000">
                            <div class="form-text">Optionnel</div>
                        </div>
                        <div class="d-flex justify-content-center w-100 gap-2">
                            <button type="button" class="btn btn-outline-secondary w-100" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-primary w-100"><i class="bi bi-floppy2-fill"></i> Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <main class="px-4 py-4">
        <h1 class="display-5 fw-bold">Gestion de Contacts</h1>
        <div class="row g-4">
            <section class="col-lg-8">
                <div class="card border border-custom shadow-sm">
                    <div class="card-header">
                        <h2 class="h5 fw-bold mb-0">Liste des contacts</h2>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                        <th>Adresse</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($userContacts as $contact) {
                                            echo '
                                                <tr>
                                                    <td>' . $contact["firstName"] . ' ' . $contact["lastName"] . '</td>
                                                    <td>' . $contact["phone"] . '</td>
                                                    <td>' . $contact["email"] . '</td>
                                                    <td>'. $contact["city"] . ' | ' . $contact["country"] .' | ' . $contact["restOfAddress"] . '</td>
                                                    <td class="table-actions">
                                                            <a href="#" 
                                                                class="text-primary text-decoration-underline editContactBtn"
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#modifyContact"
                                                                data-id="'. $contact['id'] .'"
                                                                data-fname="'. $contact['firstName'] . '"
                                                                data-lname="'. $contact['lastName'] . '"
                                                                data-phone="'. $contact['phone'] . '"
                                                                data-email="'. $contact['email'] . '"
                                                                data-city="'. $contact['city'] . '"
                                                                data-country="'. $contact['country'] . '"
                                                                data-rest="'. $contact['restOfAddress'] . '"
                                                            >
                                                            Modifier
                                                        </a>
                                                        <a href="../functions/deleteContact.php?contactId= '. urlencode($contact["id"]) .'" class="text-danger text-decoration-underline">Supprimer</button>
                                                    </td>
                                                </tr>
                                            ';
                                        };
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <aside class="col-lg-4">
                <div class="card border border-custom shadow-sm sticky-top" style="top: 2rem;">
                    <div class="card-header">
                        <h2 class="h5 fw-bold mb-0">Ajouter un contact</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" id="contactForm" action="../functions/createNewContact.php">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="name" name="nom" placeholder="Aymen" minlength="2">
                                <div class="form-text">Requis, 2 caractères minimum.</div>
                            </div>
                            <div class="mb-3">
                                <label for="Prénom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="Prénom" name="prenom" placeholder="Oumaalla" minlength="2">
                                <div class="form-text">Requis, 2 caractères minimum.</div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" pattern="[+\-\s\(\)0-9]*" placeholder="+212 629 474 030">
                                <div class="form-text">Optionnel.</div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Aymen.Oumaalla@email.com">
                                <div class="form-text">Requis, format email valide.</div>
                            </div>
                            <div class="mb-3">
                                <label for="Ville" class="form-label">Ville</label>
                                <input class="form-control" id="Ville" name="ville" placeholder="Marrakech">
                                <div class="form-text">Optionnel</div>
                            </div>
                            <div class="mb-3">
                                <label for="Paye" class="form-label">Paye</label>
                                <input class="form-control" id="Paye" name="paye" placeholder="Maroc">
                                <div class="form-text">Optionnel</div>
                            </div>
                            <div class="mb-3">
                                <label for="restOfAddress" class="form-label">rest Of the Address</label>
                                <input class="form-control" id="restOfAddress" name="restofaddress" placeholder="4000">
                                <div class="form-text">Optionnel</div>
                            </div>
                            <div class="d-flex justify-content-center w-100 gap-2">
                                <button type="button" name="clearButton" class="btn btn-outline-light w-100 border border-black text-dark">Annuler</button>
                                <button type="submit" class="btn btn-outline-primary w-100">
                                    <i class="bi bi-floppy2-fill"></i> Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </aside>
        </div>
    </main>
<?php include "../includes/footer.php"; ?>