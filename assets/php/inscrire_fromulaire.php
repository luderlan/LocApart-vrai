<?php

require_once("include/connexion.inc.php");
require_once("class/class.client.php");

    $nvNomClient = $_POST['nom_client'];
    $nvPrenomClient = $_POST['prenom_client'];
    $nvRueClient = $_POST['rue_client'];
    $nvCodeComm = $_POST['id_comm'];
    $nvMailClient = $_POST['mail_client'];
    $nvPassClient = password_hash($_POST['pass_client'], PASSWORD_DEFAULT);

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
        echo "Vous êtes inscrit ! Vous pouvez retourner sur le site pour vous connecter";
    } else {
        echo "Erreur : " . $sql . "<br>" . $connexion->error;
    }

    $connexion->close();
}
?>  
