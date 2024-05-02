<?php

require_once("../include/connexion.inc.php");
require_once("../class/class.photo.php");

$oPhoto = new photo($con);

$action = isset($_POST['ajoutPho']) ? 'ajout' : (isset($_POST['updatePho']) ? 'update' : (isset($_POST['deletePho']) ? 'delete' : ''));

switch ($action) {
    case 'ajout':
        if(isset($_FILES['files']['name'])) {
            $total_files = count($_FILES['files']['name']);
        
            // Parcours chaque fichier soumis
            for($i = 0; $i < $total_files; $i++) {
                $file_name = $_FILES['files']['name'][$i];
                    echo "$file_name<br>";
                $temp_name = $_FILES['files']['tmp_name'][$i];
                    echo "$temp_name<br>";
                $file_size = $_FILES['files']['size'][$i];
                    echo "$file_size<br>";
                $file_type = $_FILES['files']['type'][$i];
                    echo "$file_type<br>";
        
                // Emplacement où le fichier sera sauvegardé
                $target_dir = "../../img/biens/";
                $target_file = $target_dir . basename($file_name);
        
                // Déplace le fichier téléchargé vers le dossier de destination
                if(move_uploaded_file($temp_name, $target_file)) {
                    echo "Le fichier $file_name a été téléchargé avec succès.<br>";
                    echo "Chemin du fichier : $target_file<br><br>";
                } else {
                    echo "Une erreur s'est produite lors du téléchargement du fichier $file_name.<br>";
                }
            }
        } else {
            echo "Aucun fichier n'a été soumis.";
        }
        
        $nouveauNomPhoto = $file_name;
        $nouveauLienPhoto = $target_file;
        $nouveauIdBien = $_POST['id'];
        
        $oNouveauPhoto= new photo($con);
        
        $oNouveauPhoto->insertPhoto($nouveauNomPhoto,$nouveauLienPhoto,$nouveauIdBien);

        break;

    case 'update':
        if (isset($_POST['updatePho'])) {
            $id_photo = $_POST['updatePho'];
            $nom_photo = $_POST['nom_photo'][$id_photo];
            $lien_photo = $_POST['lien_photo'][$id_photo];
            $id_bien = $_POST['id_bien'][$id_photo];

            $oPhoto->updatePhoto($id_photo,$nom_photo,$lien_photo,$id_bien);
        }
        header("location:../affichage/bien.aff.php");
        break;

        case 'delete':
            $id_photo = $_POST['deletePho'];
            $oPhoto->deletePhoto($id_photo);
    
            header("location:../affichage/bien.aff.php");
        break;
    
    }

?>
