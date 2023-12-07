<?php
require_once("../include/connexion.inc.php");
require_once("../class/bien.class.php");

$oBiens = new bien($con);

if (isset($_POST['update'])) {


    $id_bien = $_POST['id_bien'];

    $nom_bien = $_POST['nom_bien'];

    $rue_bien = $_POST['rue_bien'];

    $codeP_bien = $_POST['codeP_bien'];

    $vil_bien = $_POST['vil_bien'];

    $sup_bien = $_POST['sup_bien'];

    $nb_couchage = $_POST['nb_couchage'];

    $nb_piece = $_POST['nb_piece'];

    $nb_chambre = $_POST['nb_chambre'];

    $descriptif = $_POST['descriptif'];

    $ref_bien = $_POST['ref_bien'];

    $statut_bien = $_POST['statut_bien'];

    $id_type_bien = $_POST['id_type_bien'];

   

    
    $oBiens->update($id_bien, $nom_bien, $rue_bien, $codeP_bien, $vil_bien, $sup_bien, $nb_couchage, $nb_piece, $nb_chambre, $descriptif, $ref_bien, $statut_bien, $id_type_bien);
} elseif (isset($_GET['action'])=='sup') {
    $id_bien = $_GET['id'];
    $oBiens->delete($id_bien);
 
}
  header("location:../affichage/bien.aff.php");
?>