<?php
    session_start();
    include "../config/db.php";

    include "insertContact.php";
    include "updateContact.php";
    include "contacts.php";

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: ../public/contacts.php?id=" . $_SESSION["id"]);
        exit;
    }

    $contact = new contact(
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["email"],
        $_POST["phone"],
        $_POST["ville"],
        $_POST["paye"],
        $_POST["restofaddress"],
        $_SESSION["id"]
    );

    if (empty($_POST["contact_id"])) { 
        $contactReq = new insertContact($conn);
        $contactReq->contactSqlQuery($contact);

    } else { 
        $updateReq = new updateContact($conn);
        $updateReq->updateContactSqlQuery($contact);
    }
    header("Location: ../public/contacts.php?id=" . urlencode($_SESSION["id"]));
?>