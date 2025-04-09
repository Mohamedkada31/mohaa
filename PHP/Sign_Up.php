<?php
$host = '192.168.1.13';
$dbname = 'site';      // 🔁 Remplace avec le nom réel de ta base
$user = 'mohamed';
$pass = '12345678';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

}
?>
