<?php
    class contact{
        protected $firstName;
        protected $lastName;
        protected $email;
        protected $phone;
        protected $city;
        protected $country;
        protected $rest;
        protected $userId;

        function __construct($firstName, $lastName, $email, $phone, $city, $country, $rest, $userId){
            $this->firstName = htmlspecialchars($firstName);
            $this->lastName = htmlspecialchars($lastName);
            $this->email = htmlspecialchars($email);
            $this->phone = htmlspecialchars($phone);
            $this->city = htmlspecialchars($city);
            $this->country = htmlspecialchars($country);
            $this->rest = htmlspecialchars($rest);
            $this->userId = htmlspecialchars($userId);
        }
    }
?>