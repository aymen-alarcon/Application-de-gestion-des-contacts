<?php
    require_once __DIR__ . "/contactRepository.php";
    class registerContact extends contactRepository{
        function validate(){
            if (empty($_POST["phone"]) || empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["ville"]) || empty($_POST["paye"]) || empty($_POST["restofaddress"])|| empty($_POST["email"])) {
                throw new Exception("you can't leave an empty input");
            }
        }

        function __construct($conn)
        {
            $this->validate();
            parent::__construct(
                $conn, 
                $_POST["nom"], 
                $_POST["prenom"], 
                $_POST["email"], 
                $_POST["phone"], 
                $_POST["ville"], 
                $_POST["paye"], 
                $_POST["restofaddress"], 
                $_SESSION["id"]
            );
        }
    }
?>