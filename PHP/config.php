<?php
$host = 'localhost';
$dbname = 'ton_nom_de_bdd';
$user = 'mohamed';
$pass = 'Mohamed31.';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>
