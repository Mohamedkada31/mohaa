<?php
// Database connection
$connexion = new mysqli("192.168.1.13", "mohamed", "12345678", "site");

mysqli_query($connexion, "INSERT INTO users (email, username, age, password) VALUES ('$email', '$username', '$age', '$password')");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

}
?>
