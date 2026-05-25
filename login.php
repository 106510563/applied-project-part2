<?php
require_once("settings.php");

$message = "";
$toastClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM linkly_db WHERE email")
    $stmt->execute();
    $stmt->store_result();
    
}

?>
