<?php
require_once("../include/connexion.inc.php");
require_once("../class/bien.class.php");

$nouveauNomBien = $_POST['nom_bien'];
$nouveauRueBien = $_POST['rue_bien'];
$nouveauCodePBien = $_POST['codeP_bien'];
$nouveauVilleBien = $_POST['vil_bien'];
$nouveauSupBien = $_POST['sup_bien'];
$nouveauNBCouchage = $_POST['nb_couchage'];
$nouveauNBPiece = $_POST['nb_piece'];
$nouveauNBChambre = $_POST['nb_chambre'];
$nouveauDescriptif = $_POST['descriptif'];
$nouveauRefBien = $_POST['ref_bien'];
$nouveauStatutBien = $_POST['statut_bien'];
$nouveauIdTypeBien = $_POST['id_type_bien2'];

$oNouveauBien= new bien($con);

$oNouveauBien->insert(NULL,$nouveauNomBien, $nouveauRueBien, $nouveauCodePBien, $nouveauVilleBien, $nouveauSupBien, $nouveauNBCouchage,
 $nouveauNBPiece, $nouveauNBChambre, $nouveauDescriptif, $nouveauRefBien, $nouveauStatutBien,$nouveauIdTypeBien);

header("location:../affichage/bien.aff.php");
?>