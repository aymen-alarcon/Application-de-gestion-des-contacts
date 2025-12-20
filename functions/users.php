<?php 
    class user{
        protected $firstName;
        protected $lastName;
        protected $email;
        protected $password;
        protected $profilePicture;

        function __construct($firstName, $lastName, $email, $password, $profilePicture){
            $this->firstName = htmlspecialchars($firstName);
            $this->lastName = htmlspecialchars($lastName);
            $this->email = htmlspecialchars($email);
            $this->password = password_hash($password, PASSWORD_DEFAULT);
            $this->profilePicture = htmlspecialchars($profilePicture);
        }
    }
?>
