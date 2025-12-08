<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {      
            $emailErr = "Email is required";  
            header("Location: ../public/register.php?emailError= " . urlencode($emailErr)); 
        }else{
            $email = htmlspecialchars($_POST["email"]);
        }
        if (empty($_POST["firstName"])) {   
            $firstNameErr = "First Name is required";     
            header("Location: ../public/register.php?fnameError= " . urlencode($firstNameErr)); 
        }else {
            $firstName = htmlspecialchars($_POST["firstName"]);
        }
        if (empty($_POST["lastName"])) {            
            $lastNameErr = "Last Name is required";     
            header("Location: ../public/register.php?lnameError= " . urlencode($lastNameErr)); 
        }else {
            $lastName = htmlspecialchars($_POST["lastName"]);
        }
        if (empty($_POST["password"])) {            
            $passwordErr = "Password is required";     
            header("Location: ../public/register.php?passwordError= " . urlencode($passwordErr)); 
        }else {
            $password = htmlspecialchars($_POST["password"]);
        }
        if (empty($_POST["confirmPassword"])) {            
            $confirmPasswordErr = "Confirm Password is required";     
            header("Location: ../public/register.php?confirmPasswordError= " . urlencode($confirmPasswordErr)); 
        }else {
            $confirmPassword = htmlspecialchars($_POST["confirmPassword"]);
        }
    }
?>