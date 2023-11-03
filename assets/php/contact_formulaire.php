<?php
$serveur = "localhost";  
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "locapart";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $connexion->real_escape_string($_POST["prenom"]);
    $nom = $connexion->real_escape_string($_POST["nom"]);
    $email = $connexion->real_escape_string($_POST["email"]);
    $telephone = $connexion->real_escape_string($_POST["telephone"]);
    $message = $connexion->real_escape_string($_POST["message"]);

    $requete = "INSERT INTO contact (prenom, nom, email, telephone, message) VALUES ('$prenom', '$nom', '$email', '$telephone', '$message')";

    if ($connexion->query($requete) === TRUE) {
        echo "Enregistrement réussi !";
    } else {
        echo "Erreur lors de l'enregistrement : " . $connexion->error;
    }

    $connexion->close();
}
?>