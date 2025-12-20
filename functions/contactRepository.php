<?php
    require_once __DIR__ . "/contacts.php";

    class contactRepository extends contact{
        public $conn;

        function __construct($conn, $firstName, $lastName, $email, $phone, $city, $country, $rest, $userId){
            $this->conn = $conn;
            parent::__construct($firstName, $lastName, $email, $phone, $city, $country, $rest, $userId);
        }

        function contactSqlQuery(){
            $contact = [
                "firstName" => $this->firstName,
                "lastName" => $this->lastName,
                "email" => $this->email,
                "phone" => $this->phone,
                "city" => $this->city,
                "country" =>$this->country,
                "restOfAddress" =>$this->rest,
                "userId" => $this->userId,
            ];

            $column = implode(",", array_keys($contact));
            $value = ":" . implode(",:", array_keys($contact));
            $sql = "INSERT INTO contacts ($column) VALUES ($value)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($contact);
            var_dump($column);
            var_dump($value);
            var_dump($stmt);
        }
    }
?>