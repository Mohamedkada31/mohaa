<?php
session_start();

// Connexion à la base de données
$host = 'localhost';
$dbname = 'nom_de_ta_base';  // 🔁 Remplace par le vrai nom de ta base
$user = 'mohamed';
$pass = 'Mohamed31.';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Connexion échouée : " . $e->getMessage());
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];

    // Recherche de l'utilisateur par email
    $sql = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Connexion réussie
        $_SESSION['user'] = $user['username'];
        echo "✅ Connexion réussie ! Bienvenue " . htmlspecialchars($user['username']);
        // Tu peux rediriger ici vers un tableau de bord par exemple :
        // header("Location: ../Site/Accueil.html");
    } else {
        echo "❌ Email ou mot de passe incorrect.";
    }
}
?>
