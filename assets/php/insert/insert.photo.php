<?php

require_once("../include/connexion.inc.php");
require_once("../class/class.photo.php");

$nvNomPhoto = $_POST['nom_photo'];
$nvLienPhoto = $_POST['lien_photo'];
$nouveauIdBien = $_POST['id_bien2'];

$oNouveauPhoto= new Photo($con);

$oNouveauPhoto->insertPhoto($nvNomPhoto, $nvLienPhoto, $nouveauIdBien);

header("location:../affichage/aff.photo.php");
?>
