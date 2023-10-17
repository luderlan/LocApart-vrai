<?php
require_once 'include/connexion.inc.php';

$action = $_POST['action'];

switch ($action) {
    case 'create_joueur':
        // Récupération des valeurs du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $dateNaissance = $_POST['datenaissance'];

        // Création d'une nouvelle instance de la classe Joueur
        $joueur = new Joueur($nom, $prenom, $dateNaissance);

        // Appel de la fonction pour créer un nouveau joueur dans la base de données
        $result = create_joueur($joueur);

        if ($result) {
            echo "Le joueur a été créé avec succès.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;
        
    case 'create_equipe':
        $nom = $_POST['nom'];
        $president = $_POST['president'];
        $ID_ligue = $_POST['ID_ligue'];

        $equipe = new Equipe($nom, $president, $ID_ligue);

        $result = create_equipe($equipe);

        if ($result) {
            echo "L'équipe a été créée avec succès.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;
        
    case 'create_ligue':
        $region = $_POST['region'];

        $ligue = new Ligue($region);

        $result = create_ligue($ligue);

        if ($result) {
            echo "La ligue a été créée avec succès.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'create_membre':
        $ID_joueur = $_POST['ID_joueur'];
        $ID_equipe = $_POST['ID_equipe'];

        $membre = new Membre($ID_joueur, $ID_equipe);

        $result = create_membre($membre);

        if($result) {
            echo "Le joueur a été intégré avec succès.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

    case 'delete_joueur':
        $ID_joueur = $_POST['ID_joueur'];

        $result = delete_joueur_by_id($ID_joueur);

        if($result) {
            echo "Le joueur a été supprimé avec succès.";
        } else {
            echo "Une erreur est survenue : " . $result;
        }
        break;

        case 'delete_equipe':
            $ID_equipe = $_POST['ID_equipe'];
    
            $result = delete_equipe_by_id($ID_equipe);
    
            if($result) {
                echo "L'équipe a été supprimée avec succès.";
            } else {
                echo "Une erreur est survenue : " . $result;
            }
            break;

        case 'delete_ligue':
            $ID_ligue = $_POST['ID_ligue'];
    
            $result = delete_ligue_by_id($ID_ligue);
    
            if($result) {
                echo "La ligue a été supprimée avec succès.";
            } else {
                echo "Une erreur est survenue : " . $result;
            }
            break;
        
        case 'delete_membre_on_ID_joueur':
                $ID_joueur = $_POST['ID_joueur'];
        
                $result = delete_ligue_by_id($ID_joueur);
        
                if($result) {
                    echo "Le joueur a été retiré de l'équipe avec succès.";
                } else {
                    echo "Une erreur est survenue : " . $result;
                }
                break;

    default:
        echo "Action non reconnue.";
}
?>

<br>
<a href="main.php">
    <button type="button">Retourner à la page principale</button>
</a>