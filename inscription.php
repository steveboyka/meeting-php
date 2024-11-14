

<?php
include'config.php';
// Récupération des données du formulaire
$nom = $_POST['nom'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hasher le mot de passe pour la sécurité

// Insertion des données dans la base de données
$sql = "INSERT INTO utilisateur (nom, email, password) VALUES ('$nom', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Nouvel utilisateur créé avec succès";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>