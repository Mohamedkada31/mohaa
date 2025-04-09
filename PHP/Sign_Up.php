<?php
require_once '../PHP/config.php'; // Assure-toi que le chemin est correct

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        die("❌ Les mots de passe ne correspondent pas.");
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO utilisateurs (email, username, age, password) VALUES (?, ?, ?, ?)");
    $stmt->execute([$email, $username, $age, $hash]);

    echo "✅ Inscription réussie !";
}
?>
