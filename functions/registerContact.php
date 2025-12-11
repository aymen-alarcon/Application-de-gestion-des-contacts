<?php
    session_start();
    include "../config/db.php";
    include "contacts.php";
    include "insertContact.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $contact = new contact(
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["phone"],
            $_POST["email"],
            $_POST["ville"],
            $_POST["paye"],
            $_POST["restofaddress"],
            $_SESSION["id"]
        );

        $contactReq = new insertContact($conn);
        $contactId = $contactReq->contactSqlQuery($contact);

        header("Location: ../public/contact.php?id=" . urlencode($_SESSION["id"]));
        exit;
    }