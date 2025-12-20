<?php
    function userSqlQuery($data, $conn){
        $columns = implode(",", array_keys($data));
        $values = ":" . implode(",:", array_keys($data));
        $sql = "INSERT INTO users ($columns, dateInscription) VALUES ($values, now())";
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $data["profilePicture"]); 

        $userId = $conn->lastInsertId();
        $_SESSION["id"] = $userId;
        $_SESSION['session_start_time'] = time();
    }

    function contactSqlQuery($data, $conn){
        $columns = implode(",", array_keys($data));
        $values = ":" . implode(",:", array_keys($data));
        $sql = "INSERT INTO contacts ($columns) VALUES ($values)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
    }

    function updateContactSqlQuery($data, $conn){
        $contactId = $data['id'];
        unset($data["id"]);
        $columns = implode(", ", array_map(fn($key) => "$key = ?",array_keys($data)));
        $sql = "UPDATE contacts SET $columns WHERE id = " . $contactId . " AND userId = ". $_SESSION["id"] . "";
        var_dump($sql);
        var_dump($data);
        $stmt = $conn->prepare($sql);
        var_dump($stmt);
        $stmt->execute(array_values($data));  
    }
?>