<?php
    session_start();
    include "../config/db.php";
    include "insertUserTemp.php";
    include "usersTemp.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        $contactReq = new insertContact($conn);
        $contactId = $contactReq->contactSqlQuery($contact);

        header("Location: ../public/contacts.php?id=" . $_SESSION["id"]);
    }
?>