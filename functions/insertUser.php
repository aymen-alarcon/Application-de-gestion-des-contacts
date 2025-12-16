<?php
    class insertUser{
        public $conn;

        function __construct($conn){
            $this -> conn = $conn;
        }

        function sqlQuery(user $user){
            $sql = "INSERT INTO users (firstName, lastName, email, password, dateInscription, profilePicture) VALUES (:firstName, :lastName, :email, :password, now(), :profilePicture)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":firstName", $user->getFirstName());
            $stmt->bindValue(":lastName", $user->getLastName());
            $stmt->bindValue(":email", $user->getEmail());
            $stmt->bindValue(":password", $user->getPassword());
            $stmt->bindValue(":profilePicture", $user->getProfilePicture());

            $stmt->execute();
            
            return $this->conn->lastInsertId();
        }
    }
?>