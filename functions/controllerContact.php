<?php
session_start();

require "../config/db.php";
require "registerContact.php";
require "updateContact.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../public/contacts.php?id=" . $_SESSION["id"]);
    exit;
}

if (empty($_POST["contact_id"])) {
    $contactReq = new registerContact($conn);
    $contactReq->contactSqlQuery();
} else {
    $updateReq = new updateContact($conn);
    $updateReq->updateContactSqlQuery();
}

header("Location: ../public/contacts.php?id=" . urlencode($_SESSION["id"]));
exit;
