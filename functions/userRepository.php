<?php

    class userRepository extends user{
        protected $conn;

        public function __construct($conn,$firstName,$lastName,$email,$password,$profilePicture) {
            $this->conn = $conn;
            parent::__construct($firstName, $lastName, $email, $password, $profilePicture);
        }

        public function sqlQuery()
        {
            $data = [
                "firstName" => $this->firstName,
                "lastName" => $this->lastName,
                "email" => $this->email,
                "password" => $this->password,
                "profilePicture" => $this->profilePicture
            ];

            $columns = implode(",", array_keys($data));
            $values = ":" . implode(",:", array_keys($data));

            $sql = "INSERT INTO users ($columns, dateInscription) VALUES ($values, NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);

            return $this->conn->lastInsertId();
        }
    }
