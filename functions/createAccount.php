<?php
    session_start();
    include "../config/db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"]) || empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["password"]) || empty($_POST["confirmPassword"])) {      
            $error = "you can't leave an empty input";  
            header("Location: ../public/register.php?errorMessage= " . urlencode($error)); 
        }else{
            $firstName = htmlspecialchars($_POST["firstName"]);
            $lastName = htmlspecialchars($_POST["lastName"]);
            $email = htmlspecialchars($_POST["email"]);
            $password = htmlspecialchars($_POST["password"]);
        }

        $sql = "INSERT INTO users (firstName, lastName, email, password, dateInscription) VALUES (:firstName, :lastName, :email, :password, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $userId = $conn->lastInsertId();
        $_SESSION["id"] = $userId;
        header("Location: ../public/profile.php?id=" . urlencode($userId));
        exit;
    }
?>