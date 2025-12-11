<?php
    class insertUser{
        public $conn;

        function __construct($conn){
            $this -> conn = $conn;
        }

        function sqlQuery(user $user){
            $sql = "INSERT INTO users (firstName, lastName, email, password, dateInscription) VALUES (:firstName, :lastName, :email, :password, now())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":firstName", $user->getFirstName());
            $stmt->bindValue(":lastName", $user->getLastName());
            $stmt->bindValue(":email", $user->getEmail());
            $stmt->bindValue(":password", $user->getPassword());

            $stmt->execute();
            
            return $this->conn->lastInsertId();
        }
    }
?>