<?php

include '../include/connexion.inc.php';

$keyword = '%'.$_POST['keyword'].'%';  // récupère la lettre saisie dans le champ texte en provenance de JS 

$sql = "SELECT * FROM biens WHERE id_bien LIKE (:var) or nom_bien LIKE (:var) ORDER BY id_bien ASC LIMIT 0, 10";  // création de la requete avec sélection des résultats sur la lettre 
$req = $con->prepare($sql);
$req->bindParam(':var', $keyword, PDO::PARAM_STR);
$req->execute();
$list = $req->fetchAll();
foreach ($list as $res) {
	//  affichage
	$ListeBien = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $res['id_bien'].' '.$res['nom_bien']);
	// sélection 
	echo '<li onclick="set_item(\''.str_replace("'", "\'", $res['id_bien'].' '.$res['nom_bien']).'\',\''.str_replace("'", "\'", $res['id_bien']).'\')">'.$ListeBien.'</li>';
}
?>
