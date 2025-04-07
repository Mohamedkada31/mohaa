<?php
$host = 'localhost';
$dbname = 'ton_nom_de_bdd';
$user = 'root';
$pass = 'ton_mot_de_passe_mysql';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("Connexion échouée : " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];  // Doit correspondre aux "name" dans le HTML
    $email = $_POST['email'];
    $problem = $_POST['problem'];
    $age = $_POST['age'];

    $sql = "INSERT INTO utilisateurs (username, email, password) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $email, $password]);

    echo "Inscription réussie !";
}
?>
