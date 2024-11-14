<?php
include 'config.php';

// Récupération des données du formulaire de connexion
$email = $_POST['email'];
$password = $_POST['password'];

// Préparation de la requête SQL pour vérifier les informations de connexion
$sql = "SELECT * FROM utilisateur WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Un utilisateur a été trouvé
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Le mot de passe est correct, on démarre la session
        session_start();
        $_SESSION['user_id'] = $row['id']; // Ou tout autre identifiant unique
        $_SESSION['username'] = $row['nom']; // Par exemple
        header("Location: accueil.php"); // Redirection vers la page d'accueil
    } else {
        echo "Mot de passe incorrect";
    }
} else {
    echo "Utilisateur introuvable";
}

$conn->close();
?>