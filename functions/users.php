<?php 
    class user{
        public $firstName;
        public $lastName;
        public $email;
        public $password;
        public $profilePicture;

        function __construct($firstName, $lastName, $email, $password, $profilePicture){
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
            $this->profilePicture = $profilePicture;
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

        function getProfilePicture(){
            return $this->profilePicture;
        }
    }
?>