<?php
    session_start();
    include "../config/db.php";
    include "users.php";
    include "insertUser.php";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = new user(
            $_POST["firstName"],
            $_POST["lastName"],
            $_POST["email"],
            $_POST["password"],
        );

        $userRepo = new insertUser($conn);
        $userId = $userRepo->sqlQuery($user);

        $_SESSION["id"] = $userId;
        $_SESSION['session_start_time'] = time();

        header("Location: ../public/profile.php?id=" . $userId);
        exit;
    }    
?>