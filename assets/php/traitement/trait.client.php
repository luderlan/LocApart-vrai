<?php
require_once("../include/connexion.inc.php");
require_once("../class/class.client.php");

$oClient = new client($con);

if (isset($_POST['updateCli'])) {
    $id_client = $_POST['updateCli'];
    $nom_client = $_POST['nom_client'][$id_client];
    $prenom_client = $_POST['prenom_client'][$id_client];
    $rue_client = $_POST['rue_client'][$id_client];
    $code_comm = $_POST['code_comm'][$id_client];
    $mail_client = $_POST['mail_client'][$id_client];
    $pass_client = $_POST['pass_client'][$id_client];
    $statut_client = $_POST['statut_client'][$id_client];
    $valid_client = $_POST['valid_client'][$id_client];


    $oClient->updateClient($id_client, $nom_client,$prenom_client,$rue_client,$code_comm,$mail_client,$pass_client,
    $statut_client,$valid_client);
    header("location:../affichage/aff.client.php");
} elseif (isset($_POST['deleteCli'])) {
    $id_client = $_POST['deleteCli'];
    $oClient->deleteClient($id_client);
    header("location:../affichage/aff.client.php");
}
?>
