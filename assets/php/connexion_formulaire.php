<?php
$connexion = mysqli_connect("localhost", "root", "", "locapart");

if (!$connexion) {
    die("La connexion à la base de données a échoué: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

$requete = "SELECT * FROM connexion WHERE email='$email' AND mdp='$password'";
$resultat = mysqli_query($connexion, $requete);

if (mysqli_num_rows($resultat) == 1) {
    echo "Connexion réussie. Redirection vers la page d'accueil...";
} else {
    echo "Identifiants incorrects. Veuillez réessayer.";
}

mysqli_close($connexion);
?>
