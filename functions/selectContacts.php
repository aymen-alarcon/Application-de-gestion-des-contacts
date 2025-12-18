<?php
    $sql = "SELECT * FROM contacts WHERE userId = ?";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute([$_SESSION["id"]]);
    $userContacts = $stmt -> fetchAll(PDO::FETCH_ASSOC);
?>