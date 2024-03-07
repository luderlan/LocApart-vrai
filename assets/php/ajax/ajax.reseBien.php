<?php

	include '../include/connexion.inc.php';

$keyword = '%'.$_POST['keyword'].'%';  // récupère la lettre saisie dans le champ texte en provenance de JS 


$sql = "SELECT * FROM biens WHERE nom_bien LIKE (:var) or vil_bien LIKE (:var) ORDER BY nom_bien ASC LIMIT 0, 10";  // création de la requete avec sélection des résultats sur la lettre 
$req = $con->prepare($sql);
$req->bindParam(':var', $keyword, PDO::PARAM_STR);
$req->execute();
$list = $req->fetchAll();
foreach ($list as $res) {
	//  affichage
	$ListeClientRese = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $res['nom_bien'].' '.$res['vil_bien']);
	// sélection 
	echo '<li onclick="set_itemBienRese(\''.str_replace("'", "\'", $res['nom_bien'].' '.$res['vil_bien']).'\',\''.str_replace("'", "\'", $res['id_bien']).'\')">'.$ListeClientRese.'</li>';
}
?>