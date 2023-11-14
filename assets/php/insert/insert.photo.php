<?php

require_once("../include/connexion.inc.php");
require_once("../class/class.photo.php");

$nvNomPhoto = $_POST['nom_photo'];
$nvLienPhoto = $_POST['lien_photo'];
$nvIdBien = $_POST['id_bien'];

$oNouveauClient = new Photo($con);

$oNouveauClient->insertPhoto($nvNomPhoto,$nvLienPhoto,$nvIdBien);

header("location:../affichage/aff.photo.php");

?>