<?php
    include '../config/db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"]) || empty($_POST["password"])) {      
            $error = "you can't leave an empty input";  
            header("Location: ../public/register.php?errorMessage= " . urlencode($error)); 
        }else{
            $email = htmlspecialchars($_POST["email"]);
            $password = htmlspecialchars($_POST["password"]);
        }

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn -> prepare($sql);
        $stmt -> execute([$email]);
        $userLoginCredentials = $stmt -> fetch();
        
        if (password_verify($password, $userLoginCredentials['password'])) {
            session_start();
            $_SESSION["id"] = $userLoginCredentials["id"];
            header("Location: ../public/profile.php?id=" . urlencode($_SESSION["id"]));
        }else{            
            header("Location: ../public/index.php?credentials_are_incorrect");
        }
    }
?>