<?php
// Connexion à la base de données
$connexion = new mysqli("192.168.1.13", "mohamed", "12345678", "site");

// Vérifier si la requête est bien en POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insertion dans la base de données
    $sql = "INSERT INTO users (email, password) 
            VALUES ('$email', '$password')";

    mysqli_query($connexion, $sql);
}
?>

