<?php
    $serverName = "localhost";
    $userNameDb = "root";
    $password ="";
    $dbName = "ConnectSys";

    try {
        $pdo = new PDO("mysql:host-$serverName; dbname-$dbName", $userNameDb, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo "Connection failed: $e->getMessage()";
    }
?>