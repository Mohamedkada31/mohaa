<?php
// Connexion à la base de données
$connexion = new mysqli("192.168.1.13", "mohamed", "12345678", "site");

// Vérifier si la requête est bien en POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $username = $_POST['username'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Insertion dans la base de données
    $sql = "INSERT INTO users (email, username, age, password) 
            VALUES ('$email', '$username', '$age', '$password')";

    mysqli_query($connexion, $sql);
}
?>
