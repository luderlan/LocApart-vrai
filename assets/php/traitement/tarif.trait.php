<?php
require_once("../include/connexion.inc.php");
require_once("../class/tarif.class.php");

$oTarif = new tarif($con);

if (isset($_POST['update'])) {


    $id_tarif = $_POST['update'];

    $dd = 'dd_tarif'.$id_tarif;
    $dd_tarif = $_POST[$dd];

    $df = 'df_tarif' .$id_tarif;
    $df_tarif = $_POST[$df];

    $p = 'prix_loc' .$id_tarif;
    $prix_loc = $_POST[$p];

    $idb = 'id_bien' .$id_tarif;
    $id_bien = $_POST[$idb];

    header("location:../affichage/bien.modif.aff.php");

    $id_tarif = $_POST['updatetarif'];
    $oTarif->update($id_tarif, $dd_tarif, $df_tarif, $prix_loc, $id_bien);
    header("location:../affichage/bien.modif.aff.php");
} elseif (isset($_GET['deletetarif'])) {
    $id_tarif = $_POST['delete'];
    $oTarif->delete($id_tarif);
    header("location:../affichage/bien.modif.aff.php");
}
?>