<?php
$host = '192.168.1.13';
$dbname = 'site';      // 🔁 Remplace avec le nom réel de ta base
$user = 'mohamed';
$pass = '12345678';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Connexion échouée : " . $e->getMessage());
}
?>

