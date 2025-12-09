<?php
    session_start();
    include "../config/db.php";

    $sql = "DELETE FROM contacts WHERE id = ?";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute([$_GET["contactId"]]);
    header("Location: ../public/contacts.php?userId=" . urlencode($_SESSION["id"]));
?>