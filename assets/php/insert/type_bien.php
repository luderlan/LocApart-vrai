<?php
require_once("../include/connexion.inc.php");
require_once("../class/type_bien.php");

$nouveauLibTypebien = $_POST['lib_type_bien'];

$oNouveauType = new type_bien($con);

$oNouveauType->insert($nouveauLibTypebien);

header("location:../affichage/type_bien.php");
?>