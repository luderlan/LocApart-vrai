<?php
require_once("../include/connexion.inc.php");
require_once("../class/class.photo.php");

$oPhoto = new Photo($con);

if (isset($_POST['updatePho'])) {
    $id_photo = $_POST['updatePho'];
    $nom_photo = $_POST['nom_photo'][$id_photo];
    $lien_photo = $_POST['lien_photo'][$id_photo];
    $id_bien = $_POST['id_bien'][$id_photo];


    $oPhoto->updatePhoto($id_photo, $nom_photo,$lien_photo,$id_bien);
    header("location:../affichage/aff.photo.php");
} elseif (isset($_POST['deletePho'])) {
    $id_photo = $_POST['deletePho'];
    $oPhoto->deletePhoto($id_photo);
    header("location:../affichage/aff.photo.php");
}
?>