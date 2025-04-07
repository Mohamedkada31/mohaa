<?php
require_once 'config.php';
// Connexion à la base de données
$host = 'localhost';
$dbname = 'nom_de_ta_base';  // Remplace par le nom exact de ta base
$user = 'mohamed';
$pass = 'Mohamed31.';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération et sécurisation des données
    $email = htmlspecialchars(trim($_POST['email']));
    $username = htmlspecialchars(trim($_POST['username']));
    $age = intval($_POST['age']);
    $probleme = htmlspecialchars(trim($_POST['probleme']));

    // Préparation de la requête
    $sql = "INSERT INTO contact (email, username, age, probleme) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$email, $username, $age, $probleme]);
        echo "✅ Message envoyé avec succès.";
    } catch (PDOException $e) {
        echo "❌ Erreur lors de l'enregistrement : " . $e->getMessage();
    }
}
?>
