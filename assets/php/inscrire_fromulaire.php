<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "create_client") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $rue = $_POST["rue"];
    $cp = $_POST["cp"];
    $ville = $_POST["ville"];
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];

    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $nom_base_de_données = "locapart";

    $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_données);

    if ($connexion->connect_error) {
        die("Échec de la connexion : " . $connexion->connect_error);
    }

    $sql = "INSERT INTO inscrire (nom, prenom, rue, cp, ville, mail, mdp) VALUES ('$nom', '$prenom', '$rue', '$cp', '$ville', '$mail', '$mdp')";

    if ($connexion->query($sql) === TRUE) {
        echo "Nouvel enregistrement créé avec succès";
    } else {
        echo "Erreur : " . $sql . "<br>" . $connexion->error;
    }

    $connexion->close();
}
?>  
