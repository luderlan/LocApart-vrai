<?php
    require_once("../include/connexion.inc.php");
    require_once("../class/class.photo.php");
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

<h1>Photos du bien <?php echo $_GET['id'] ?></h1>

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
                        </tr>
                    </thead>
                    <tbody class="tableau_corps">
                        <?php
                        $oPhoto = new photo($con);
                        $result = $oPhoto->selectPhoto();
                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>", $row['id_photo'], "</td>";
                                echo '<td><img src="C:\wamp64\' . $row['lien_photo'] . $row['id_photo'] . '"> </td>';
                                echo "<td><input type='text' name='nom_photo[", $row['id_photo'], "]' value='", $row['nom_photo'], "'></td>";
                                echo "<td><input type='text' name='lien_photo[", $row['id_photo'], "]' value='", $row['lien_photo'], "'></td>";
                                echo "<td><input type='text' name='id_bien[", $row['id_photo'], "]' value='", $row['id_bien'], "'></td>";
                                echo "<td><button class='btn btn-primary' name='updatePho' value='", $row['id_photo'], "' type=submit'>Modifier</button>
                                <button class='btn btn-danger' name='deletePho' value='", $row['id_photo'], "' type=submit'>Supprimer</button></td>";
                                echo "</tr>";
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