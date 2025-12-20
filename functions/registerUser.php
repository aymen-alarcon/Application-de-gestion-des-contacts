<?php

class registerUser extends userRepository{
    function validate(){
        if (empty($_POST["email"]) || empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["password"]) || empty($_POST["confirmPassword"])) {
            throw new Exception("you can't leave an empty input");
        }
        if ($_POST["password"] !== $_POST["confirmPassword"]) {
            throw new Exception("Your passwords don't match");
        }
    }

    function __construct($conn){
        $this->validate();
        $profilePicture = "../uploads/" . $_FILES["photo"]["name"];
        move_uploaded_file($_FILES["photo"]["tmp_name"], $profilePicture);

        parent::__construct(
            $conn,
            $_POST["firstName"],
            $_POST["lastName"],
            $_POST["email"],
            $_POST["password"],
            $profilePicture
        );
    }
}