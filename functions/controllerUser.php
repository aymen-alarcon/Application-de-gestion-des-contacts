<?php
    session_start();

    include "../config/db.php";
    include "../functions/users.php";
    include "../functions/userRepository.php";
    include "../functions/registerUser.php";

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: ../public/register.php");
        exit;
    }

    $register = new registerUser($conn);
    $userId = $register->sqlQuery();

    $_SESSION["id"] = $userId;
    $_SESSION["session_start_time"] = time();

    header("Location: ../public/profile.php");
    exit;
?>