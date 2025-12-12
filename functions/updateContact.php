<?php
    class updateContact{
        public $conn;

        function __construct($conn){
            $this -> conn = $conn;
        }

        function updateContactSqlQuery(contact $contact){
            $sql = "UPDATE contact SET firstName = ?, lastName = ?, email = ?, phone = ?, city = ?, country = ?, restOfAddress = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $contact->getFirstName(),
                $contact->getLastName(),
                $contact->getEmail(),
                $contact->getPhone(),
                $contact->getCity(),
                $contact->getCountry(),
                $contact->getRest(),
                $contact->getId(),
            ]);
        }
    }
?>