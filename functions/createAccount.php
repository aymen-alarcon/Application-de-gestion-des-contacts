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
            $picturePath = "../uploads/" . $_FILES["photo"]["name"];
            move_uploaded_file($_FILES["photo"]["tmp_name"], $picturePath); 
        }

        $sql = "INSERT INTO users (firstName, lastName, email, password, profilePicture, dateInscription) VALUES (:firstName, :lastName, :email, :password, :profilePicture, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':profilePicture', $picturePath);
        $stmt->execute();
        
        $userId = $conn->lastInsertId();
        $_SESSION["id"] = $userId;
        $_SESSION['session_start_time'] = time();

        header("Location: ../public/profile.php?id=" . urlencode($userId));
        exit;
    }
?>