<?php
    session_start();
    include "../config/db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nom"]) || empty($_POST["prenom"] || empty($_POST["phone"])) || empty($_POST["email"]) || empty($_POST["ville"]) || empty($_POST["paye"]) || empty($_POST["restofaddress"])) {
            $errorMessage = "You can't leave an empty input";
            header("Location: ../public/contacts.php?errorMessage=" . urlencode($errorMessage));
        }else{
            $fname = htmlspecialchars($_POST["nom"]);
            $lname = htmlspecialchars($_POST["prenom"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $email = htmlspecialchars($_POST["email"]);
            $city = htmlspecialchars($_POST["ville"]);
            $country = htmlspecialchars($_POST["paye"]);
            $restofaddress = htmlspecialchars($_POST["restofaddress"]);
        }

        if (isset($_SESSION["id"])) {
            $sql = "INSERT INTO contacts (firstName, lastName, phone, email, city, country,	restOfAddress, userId) VALUES (:firstName, :lastName, :phone, :email, :city, :country, :restOfAddress, :userId)";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindParam(":firstName", $fname);
            $stmt -> bindParam(":lastName", $lname);
            $stmt -> bindParam(":phone", $phone);
            $stmt -> bindParam(":email", $email);
            $stmt -> bindParam(":city", $city);
            $stmt -> bindParam(":country", $country);
            $stmt -> bindParam(":restOfAddress", $restofaddress);
            $stmt -> bindParam(":userId", $_SESSION["id"]);
            $stmt -> execute();
            header("Location: ../public/contacts.php?id=" . urlencode($_SESSION["id"]));
        }
    }
?>