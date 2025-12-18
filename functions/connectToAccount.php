<?php
    require "../config/db.php";

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: index.php");
        exit;
    }

    if (empty($_POST["password"]) || empty($_POST["email"])) {
        header("Location: index.php");
        exit;
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $userCredentials = $stmt->fetch();
    var_dump($userCredentials);

    if (password_verify($password, $userCredentials["password"])) {
        session_start();
        $_SESSION["id"] = $userCredentials["id"];
        header("Location: ../public/profile.php?id=" . urlencode($userCredentials["id"]));
    }else{
        header("Location: ../public/index.php");
    }