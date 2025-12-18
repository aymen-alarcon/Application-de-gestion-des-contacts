<?php
    session_start();
    include "../config/db.php";
    include "users.php";
    include "insertUser.php";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = "'you can't leave an empty input'";  
        header("Location: ../public/register.php?errorMessage= " . urlencode($error)); 
        exit;
    } 
    
    if (empty($_POST["email"]) || empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["password"]) || empty($_POST["confirmPassword"])) {      
        $error = "'you can't leave an empty input'";  
        header("Location: ../public/register.php?errorMessage= " . urlencode($error)); 
    }elseif ($_POST["confirmPassword"] !== $_POST["password"]) {
        $error = "'Your passwords doesn&#39;t match'";  
        header("Location: ../public/register.php?passwordErrorMessage= " . urlencode($error)); 
    }else{
        $user = new user(
            $_POST["firstName"],
            $_POST["lastName"],
            $_POST["email"],
            $_POST["password"],
            $profilePicture = "../uploads/" . $_FILES["photo"]["name"]
        );

        move_uploaded_file($_FILES["photo"]["tmp_name"], $profilePicture);
        $userRepo = new insertUser($conn);
        $userId = $userRepo->sqlQuery($user);

        $_SESSION["id"] = $userId;
        $_SESSION['session_start_time'] = time();
        header("Location: ../public/profile.php");
        exit;
    }
?>