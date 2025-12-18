<?php
    if (isset($_SESSION["id"])) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $conn -> prepare($sql);
        $stmt -> execute([$_SESSION["id"]]);
        $userInfo = $stmt -> fetch(PDO::FETCH_ASSOC);
    }
