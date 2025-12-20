<?php 
    session_start();
    require "../config/db.php";
    require "insertQueries.php";

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: ../public/register.php"); 
    }

    switch ($_POST["submit"]) {
        case 'createAccount':
                $data = [
                    "firstName" => htmlspecialchars($_POST["firstName"]),
                    "lastName" => htmlspecialchars($_POST["lastName"]),
                    "email" => htmlspecialchars($_POST["email"]),
                    "password" => htmlspecialchars($_POST["password"]),
                    "profilePicture" => "../uploads/" . $_FILES["photo"]["name"],
                ];

                move_uploaded_file($_FILES["photo"]["tmp_name"], $data["profilePicture"]); 

                $userId = $conn->lastInsertId();
                $_SESSION["id"] = $userId;
                $_SESSION['session_start_time'] = time();

                userSqlQuery($data, $conn);
                header("Location: ../public/profile.php?id=" . urlencode($userId));
                exit;    
            break;
        case 'createContact':
                $data = [
                    "firstName" => htmlspecialchars($_POST["nom"]),
                    "lastName" => htmlspecialchars($_POST["prenom"]),
                    "email" => htmlspecialchars($_POST["email"]),
                    "phone" => htmlspecialchars($_POST["phone"]),
                    "address" => htmlspecialchars($_POST["address"]),
                    "userId" => $_SESSION["id"],
                ];
                contactSqlQuery($data, $conn);
                header("Location: ../public/contacts.php?id=" . urlencode($userId));
                exit;    
            break;
    }

