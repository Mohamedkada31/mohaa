<?php
$host = 'localhost';
$dbname = 'nom_de_ta_base';      // 🔁 Remplace avec le nom réel de ta base
$user = 'mohamed';
$pass = 'Mohamed31.';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Connexion échouée : " . $e->getMessage());
}
?>

