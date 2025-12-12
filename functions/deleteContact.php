<?php
    session_start();
    include "../config/db.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["idContact"])) {
            $errorMessage = "You can't leave an empty input";
            header("Location: ../public/contacts.php?errorMessage=" . urlencode($errorMessage));
        }else{
            $id = htmlspecialchars($_POST["idContact"]);
        }

        $sql = "DELETE FROM contacts WHERE id = ?";
        $stmt = $conn -> prepare($sql);
        $stmt -> execute([$id]);
        header("Location: ../public/contacts.php?userId=" . urlencode($_SESSION["id"]));
    }

?>