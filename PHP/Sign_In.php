<?php
$host = 'localhost';
$dbname = 'ton_nom_de_bdd';
$user = 'mohamed';
$pass = 'Mohamed31.';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("Connexion échouée : " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Doit correspondre aux "name" dans le HTML
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateurs (username, email, password) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $email, $password]);

    echo "Inscription réussie !";
}
?>
