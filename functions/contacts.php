<?php
    class contact{
        public $firstName;
        public $lastName;
        public $email;
        public $phone;
        public $city;
        public $country;
        public $rest;
        public $userId;

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
        
        function getFirstName(){
            return $this->firstName;
        }
        
        function getLastName(){
            return $this->lastName;
        }
        
        function getEmail(){
            return $this->email;
        }
        
        function getPhone(){
            return $this->phone;
        }
        
        function getCity(){
            return $this->city;
        }
        
        function getCountry(){
            return $this->country;
        }
        
        function getRest(){
            return $this->rest;
        }
        
        function getUserId(){
            return $this->userId;
        }
    }
?>