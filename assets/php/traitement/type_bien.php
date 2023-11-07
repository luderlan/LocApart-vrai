<?php
require_once("../include/connexion.inc.php");
require_once("../class/type_bien.php");

$oTypeBien = new type_bien($con);

if (isset($_POST['update'])) {
    $id_type_bien = $_POST['update'];
    $lib_type_bien = $_POST['lib_type_bien'][$id_type_bien];
    $oTypeBien->update($id_type_bien, $lib_type_bien);
    header("location:../affichage/type_bien.php");
} elseif (isset($_POST['delete'])) {
    $id_type_bien = $_POST['delete'];
    $oTypeBien->delete($id_type_bien);
    header("location:../affichage/type_bien.php");
}
?>