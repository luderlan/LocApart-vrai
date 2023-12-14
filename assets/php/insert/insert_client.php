<?php

require_once("../include/connexion.inc.php");
require_once("../class/class.client.php");

$nvNomClient = $_POST['nom_client'];
$nvPrenomClient = $_POST['prenom_client'];
$nvRueClient = $_POST['rue_client'];
$nvCodeComm = $_POST['id_comm'];
$nvMailClient = $_POST['mail_client'];
$nvPassClient = password_hash($_POST['pass_client'], PASSWORD_DEFAULT);
$nvStatutClient = $_POST['statut_client'];
$nvValidClient = $_POST['valid_client'];

$oNouveauClient = new Client($con);

$oNouveauClient->insertClient($nvNomClient,$nvPrenomClient,$nvRueClient,$nvCodeComm,$nvMailClient,$nvPassClient,$nvStatutClient,$nvValidClient);

header("location:../affichage/aff.client.php");

?>
