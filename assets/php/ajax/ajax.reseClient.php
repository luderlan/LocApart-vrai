<?php

	include '../include/connexion.inc.php';

$keyword = '%'.$_POST['keyword'].'%';  // récupère la lettre saisie dans le champ texte en provenance de JS 


$sql = "SELECT * FROM clients WHERE nom_client LIKE (:var) or prenom_client LIKE (:var) ORDER BY nom_client ASC LIMIT 0, 10";  // création de la requete avec sélection des résultats sur la lettre 
$req = $con->prepare($sql);
$req->bindParam(':var', $keyword, PDO::PARAM_STR);
$req->execute();
$list = $req->fetchAll();
foreach ($list as $res) {
	//  affichage
	$ListeClientRese = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $res['nom_client'].' '.$res['prenom_client']);
	// sélection 
	echo '<li onclick="set_itemCliRese(\''.str_replace("'", "\'", $res['prenom_client'].' '.$res['nom_client']).'\',\''.str_replace("'", "\'", $res['id_client']).'\')">'.$ListeClientRese.'</li>';
}
?>