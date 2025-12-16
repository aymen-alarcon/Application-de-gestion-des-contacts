<?php
    class insertContact{
        public $conn;

        function __construct($conn){
            $this->conn = $conn;
        }

        function contactSqlQuery(contact $contact){
            $sql = "INSERT INTO contacts (firstName, LastName, phone, email, city, country, restOfAddress, userId) VALUES (:firstName, :lastName, :phone, :email, :city, :country, :restOfAddress, :userId)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":firstName", $contact->getFirstName());
            $stmt->bindValue(":lastName", $contact->getLastName());
            $stmt->bindValue(":phone", $contact->getPhone());
            $stmt->bindValue(":email", $contact->getEmail());
            $stmt->bindValue(":city", $contact->getCity());
            $stmt->bindValue(":country", $contact->getCountry());
            $stmt->bindValue(":restOfAddress", $contact->getRest());
            $stmt->bindValue(":userId", $contact->getUserId());

            $stmt->execute();
        }
    }
?>