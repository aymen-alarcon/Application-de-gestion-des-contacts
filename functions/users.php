<?php 
    class user{
        public $firstName;
        public $lastName;
        public $email;
        public $password;

        function __construct($firstName, $lastName, $email, $password){
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
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

        function getPassword(){
            return $this->password;
        }
    }
?>