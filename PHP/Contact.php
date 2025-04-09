<?php
require_once '../PHP/config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $age = $_POST['age'];
    $probleme = $_POST['probleme'];

    $stmt = $pdo->prepare("INSERT INTO contact (email, username, age, message) VALUES (?, ?, ?, ?)");
    $stmt->execute([$email, $username, $age, $probleme]);

    echo "✅ Message envoyé avec succès !";
}
?>
