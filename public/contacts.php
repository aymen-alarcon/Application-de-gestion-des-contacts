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
    
    <div class="modal fade" id="deleteContact" tabindex="-1" role="dialog" aria-labelledby="deleteContactLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteContactLabel">Are you sure you want to Delete Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../functions/deleteContact.php" method="POST">
                        <input type="hidden" name="idContact" id="idContact">
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <main class="p-4">
        <h1>Gestion de Contacts</h1>
        <div class="row g-4">
            <section class="col-lg-8">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="flex-grow-1">
                        <label for="search" class="form-label">Search</label>
                        <input type="search" id="search" class="form-control">
                    </div>
                    <div>
                        <label for="sort" class="form-label">Sort by</label>
                        <select id="sort" class="form-select">
                            <option value="name_asc">Name (A → Z)</option>
                            <option value="name_desc">Name (Z → A)</option>
                        </select>
                    </div>
                </div>
                <div class="card border border-custom shadow-sm">
                    <div class="card-header">
                        <h2>Liste des contacts</h2>
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
                                                <tr class="contactInfo">
                                                    <td class="nameOfContact">' . $contact["firstName"] . ' ' . $contact["lastName"] . '</td>
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
                                                        <a href="#" data-id="'. $contact['id'] .'" data-bs-toggle="modal" data-bs-target="#deleteContact" class="text-danger text-decoration-underline deleteContactBtn">Supprimer</a>
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
                <div class="card border shadow-sm">
                    <div class="card-header">
                        <h3>Ajouter un contact</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" id="contactForm" action="../functions/registerContact.php">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input required type="text" class="form-control" id="name" name="nom" placeholder="Aymen" minlength="2">
                                <div class="form-text">Requis, 2 caractères minimum.</div>
                            </div>
                            <div class="mb-3">
                                <label for="Prénom" class="form-label">Prénom</label>
                                <input required type="text" class="form-control" id="Prénom" name="prenom" placeholder="Oumaalla" minlength="2">
                                <div class="form-text">Requis, 2 caractères minimum.</div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input required type="tel" class="form-control" id="phone" name="phone" pattern="[+\-\s\(\)0-9]*" placeholder="+212 629 474 030">
                                <div class="form-text">Optionnel.</div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input required type="email" class="form-control" id="email" name="email" placeholder="Aymen.Oumaalla@email.com">
                                <div class="form-text">Requis, format email valide.</div>
                            </div>
                            <div class="mb-3">
                                <label for="Ville" class="form-label">Ville</label>
                                <input required class="form-control" id="Ville" name="ville" placeholder="Marrakech">
                                <div class="form-text">Optionnel</div>
                            </div>
                            <div class="mb-3">
                                <label for="Paye" class="form-label">Paye</label>
                                <input required class="form-control" id="Paye" name="paye" placeholder="Maroc">
                                <div class="form-text">Optionnel</div>
                            </div>
                            <div class="mb-3">
                                <label for="restOfAddress" class="form-label">rest Of the Address</label>
                                <input required class="form-control" id="restOfAddress" name="restofaddress" placeholder="4000">
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