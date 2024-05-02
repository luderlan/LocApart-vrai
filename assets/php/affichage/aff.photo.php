<?php
    require_once("../include/connexion.inc.php");
    require_once("../class/class.photo.php");
    require_once("../class/class.bien.php");
?>

<!DOCTYPE html>
<html lang="fr">



<head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/style.client.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajout de photos</title>
</head>



<body>

<?php include("../template/header.php"); ?>

<br>
<?php $id_temp = $_GET['id'] ?>
<?php $nom_temp = $_GET['nom'] ?>

<h1>Photos du bien <?php echo $id_temp ?> - <?php echo $nom_temp ?></h1>

<br>

<form action="../traitement/trait.photo.php" method="post" enctype="multipart/form-data">
    Sélectionnez les photos à télécharger :
    <input type="file" name="files[]" multiple>
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    <input type="submit" value="Uploader les fichiers" name="ajoutPho">
</form>

<section class="conteneur" id="tableau_photos">
            <form action="../traitement/trait.photo.php" method="post">
                <table class="tableau">
                    <thead class="tableau_entete">
                        <tr>
                            <th>ID Photo</th>
                            <th>Photo</th>
                            <th>Nom photo</th>
                            <th>Chemin photo</th>
                            <th>id_bien</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="tableau_corps">
                        <?php
                        $oPhoto = new photo($con);
                        $result = $oPhoto->selectPhoto($_GET['id']);
                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                $chemin = "../../img/biens/".$row['nom_photo']; 
                        ?>
                                <tr>
                                <td><?php echo $row['id_photo']; ?></td>
                                <td><img src="<?php echo $chemin; ?>" height='150px' width='auto'></td>
                                <td><input type='text' name='nom_photo[<?php echo $row['id_photo']; ?>]' value='<?php echo $row['nom_photo']; ?>'></td>
                                <td><input type='text' name='lien_photo[<?php echo $row['id_photo']; ?>]' value='<?php echo $row['lien_photo']; ?>'></td>
                                <td><input type='text' name='id_bien[<?php echo $row['id_photo']; ?>]' value='<?php echo $row['id_bien']; ?>'></td>
                                <td><button class='btn btn-primary' name='updatePho' value='<?php echo $row['id_photo']; ?>' type='submit'>Modifier</button>
                                <button class='btn btn-danger' name='deletePho' value='<?php echo $row['id_photo']; ?>' type='submit'>Supprimer</button>
                                </td>
                                </tr>
                        <?php
                            }                            
                        } else {
                            echo "<p>Aucun résultat trouvé.</p>";
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </section>
</body>
</html>