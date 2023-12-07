<?php
require_once("../include/connexion.inc.php");
require_once("../class/tarif.class.php");

$nouveauDDTarif = $_POST['dd_tarif'];
$nouveauDFTarif = $_POST['df_tarif'];
$nouveauPrixLoc = $_POST['prix_loc'];
$nouveauIdBien = $_POST['id_bien2'];

$oNouveauTarif= new tarif($con);

$oNouveauTarif->insert(NULL,$nouveauDDTarif, $nouveauDFTarif, $nouveauPrixLoc, $nouveauIdBien);

header("location:../affichage/tarif.aff.php");
?>