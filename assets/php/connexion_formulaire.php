<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "create_client") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];

    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $nom_base_de_données = "locapart";

    $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_données);

    if ($connexion->connect_error) {
        die("Échec de la connexion : " . $connexion->connect_error);
    }

    $sql = "INSERT INTO connexion (email, mdp) VALUES ('$email', '$mdp')";

    if ($connexion->query($sql) === TRUE) {
        echo "Nouvel enregistrement créé avec succès";
    } else {
        echo "Erreur : " . $sql . "<br>" . $connexion->error;
    }

    $connexion->close();
}
?>
