<?php
    session_start();
    include "../config/db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nom"]) || empty($_POST["prenom"] || empty($_POST["phone"])) || empty($_POST["email"]) || empty($_POST["ville"]) || empty($_POST["paye"]) || empty($_POST["restofaddress"])) {
            $errorMessage = "You can't leave an empty input";
            header("Location: ../public/contacts.php?errorMessage=" . urlencode($errorMessage));
        }else{
            $fname = htmlspecialchars($_POST["nom"]);
            $fname = htmlspecialchars($_POST["prenom"]);
            $fname = htmlspecialchars($_POST["phone"]);
            $fname = htmlspecialchars($_POST["email"]);
            $fname = htmlspecialchars($_POST["ville"]);
            $fname = htmlspecialchars($_POST["paye"]);
            $fname = htmlspecialchars($_POST["restofaddress"]);
        }

        
    }
?>