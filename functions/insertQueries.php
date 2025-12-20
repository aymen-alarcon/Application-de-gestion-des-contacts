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
?>