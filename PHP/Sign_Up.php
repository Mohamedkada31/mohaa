<?php
require_once 'config.php';
// Démarrer une session (utile plus tard)
session_start();

// Connexion à MariaDB
$host = 'localhost';
$dbname = 'nom_de_ta_base';  // 🔁 À remplacer par le nom réel de ta base
$user = 'mohamed';
$pass = 'Mohamed31.';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Connexion échouée : " . $e->getMessage());
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données
    $email = htmlspecialchars(trim($_POST['email']));
    $username = htmlspecialchars(trim($_POST['username']));
    $age = (int)$_POST['age'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Vérifier si les mots de passe correspondent
    if ($password !== $confirm_password) {
        die("❌ Les mots de passe ne correspondent pas.");
    }

    // Vérifier si l'email existe déjà
    $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        die("⚠️ Cet email est déjà utilisé.");
    }

    // Hacher le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insérer dans la base
    $sql = "INSERT INTO utilisateurs (email, username, age, password) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email, $username, $age, $hashedPassword]);

    echo "✅ Inscription réussie ! Tu peux maintenant te connecter.";
    // Redirection possible :
    // header("Location: ../Sign_In/Sign_In.html");
}
?>
