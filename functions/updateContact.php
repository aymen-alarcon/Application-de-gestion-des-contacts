<?php
class updateContact extends contactRepository
{
    function __construct($conn)
    {
        // Initialize parent with POST data and session user ID
        parent::__construct(
            $conn,
            $_POST["firstName"] ?? '',
            $_POST["lastName"] ?? '',
            $_POST["email"] ?? '',
            $_POST["phone"] ?? '',
            $_POST["city"] ?? '',
            $_POST["country"] ?? '',
            $_POST["rest"] ?? '',
            $_SESSION["id"] ?? 0
        );
    }

    function updateContactSqlQuery()
    {
        if (empty($_POST["contact_id"])) {
            throw new Exception("Contact ID is missing");
        }

        $contactId = $_POST["contact_id"];

        $sql = "UPDATE contacts 
                SET firstName = :firstName, 
                    lastName = :lastName, 
                    email = :email, 
                    phone = :phone, 
                    city = :city, 
                    country = :country, 
                    rest = :rest
                WHERE id = :id AND userId = :userId";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "email" => $this->email,
            "phone" => $this->phone,
            "city" => $this->city,
            "country" => $this->country,
            "rest" => $this->rest,
            "id" => $contactId,
            "userId" => $this->userId
        ]);
    }
}
