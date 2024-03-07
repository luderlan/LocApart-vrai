<?php

	include '../include/connexion.inc.php';

$keyword = '%'.$_POST['keyword'].'%';  // récupère la lettre saisie dans le champ texte en provenance de JS 


$sql = "SELECT * FROM communes_departement_region WHERE nom_comms LIKE (:var) or cp_villes LIKE (:var) or COL13 LIKE (:var) ORDER BY nom_comms ASC LIMIT 0, 10";  // création de la requete avec sélection des résultats sur la lettre 
$req = $con->prepare($sql);
$req->bindParam(':var', $keyword, PDO::PARAM_STR);
$req->execute();
$list = $req->fetchAll();
foreach ($list as $res) {
	//  affichage
	$Listecomm = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $res['nom_comms'].' '.$res['cp_villes'].' '.$res['nom_comms']);
	// sélection 
	echo '<li onclick="set_item(\''.str_replace("'", "\'", $res['cp_villes'].' '.$res['nom_comms']).'\',\''.str_replace("'", "\'", $res['id_comm']).'\')">'.$Listecomm.'</li>';
}
?>
