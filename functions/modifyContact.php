<?php
    session_start();
    include "../config/db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["nom"]) || empty($_POST["prenom"] || empty($_POST["phone"]) || empty($_POST["ville"]) || empty($_POST["paye"]) || empty($_POST["restofaddress"]))) {
            $errorMessage = "you can't leave any empty inputs";
            header("Location: ../public/contacts.php?errorMessage=" . urlencode($errorMessage));
        }else{
            $id = $_POST["id"];
            $fname = htmlspecialchars($_POST["nom"]);
            $lname = htmlspecialchars($_POST["prenom"]);
            $email = htmlspecialchars($_POST["email"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $city = htmlspecialchars($_POST["ville"]);
            $country = htmlspecialchars($_POST["paye"]);
            $restofadress = htmlspecialchars($_POST["restofaddress"]);
        }

        $sql = "UPDATE contacts SET firstName = ?, lastName = ?, email = ?, phone = ?, city = ?, country = ?, restOfAddress = ? WHERE id = ? AND userId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$fname, $lname, $email, $phone, $city, $country, $restofadress, $id, $_SESSION["id"]]);  
        
        header("Location: ../public/contacts.php");
        exit;
    }
?>