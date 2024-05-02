<?php
    require_once("../include/connexion.inc.php");
    require_once("../class/class.tarif.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarifs - Loc'Appart</title>
    <script type="text/javascript" src="../../js/autocomp/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/autocomp/script.tarif.js"></script>
    <link rel="stylesheet" href="../../css/style.tarif.css">
</head>

<body>

    <?php include("../template/header.php"); ?>

    <br>

    <?php $id_temp = $_GET['id'] ?>
    <?php $nom_temp = $_GET['nom'] ?>

    <h1>Tarifs du bien <?php echo $id_temp ?> - <?php echo $nom_temp ?></h1>

    <main>
        <section class="conteneur" id="tableau_tarif">
            <form action="../traitement/trait.tarif.php" method="post">
                <table class="tableau">
                    <thead class="tableau_entete">
                        <tr>
                            <th>ID Tarif</th>
                            <th>Date de debut</th>
                            <th>Date de fin</th>
                            <th>Prix</th>
                            <th>ID Bien</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="tableau_corps">
                        <?php
                        $oTarif = new tarif($con);
                        $result = $oTarif->selectTarif($_GET['id']);
                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                
                                $dd = 'dd_tarif'.$row['id_tarif'];
                                $df = 'df_tarif'.$row['id_tarif'];
                                $p = 'prix_loc'.$row['id_tarif'];
                                $idb = 'id_bien'.$row['id_tarif'];
                        ?>

                        <tr>
                            <td><?php echo $row['id_tarif']; ?></td>
                            <td><input type='text' name='dd_tarif' value='<?php echo $row['dd_tarif']; ?>'></td>
                            <td><input type='text' name='df_tarif' value='<?php echo $row['df_tarif']; ?>'></td>
                            <td><input type='text' name='prix_loc' value='<?php echo $row['prix_loc']; ?>'></td>
                            <td><input type='text' name='id_bien' value='<?php echo $row['id_bien']; ?>'></td>
                            <td>
                                <button class='btn btn-primary' name='updateTarif' value='<?php echo $row['id_tarif']; ?>' type='submit'>Modifier</button>
                                <button class='btn btn-danger' name='deleteTarif' value='<?php echo $row['id_tarif']; ?>' type='submit'>Supprimer</button>
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

            <form action="../traitement/trait.tarif.php" method="post" class="formulaire-insertion">

                <label for="dd_tarif" class="formulaire-label">Date de debut : </label>
                <input type="date" name="dd_tarif" id="dd_tarif" class="formulaire-input">

                <label for="df_tarif" class="formulaire-label">Date de fin : </label>
                <input type="date" name="df_tarif" id="df_tarif" class="formulaire-input">

                <label for="prix_loc" class="formulaire-label">Prix : </label>
                <input type="text" name="prix_loc" id="prix_loc" class="formulaire-input">
                
                <label for="id_bien" class="formulaire-label">Bien : </label>
                <input type="text" name="refb" id="refb" onkeyup="autocompletTarif()" class="formulaire-input">
                <input type="hidden" name="refb2" id="refb2" class="formulaire-input">
                <ul id="bien_list_id"> </ul>

                <td><button class='btn btn-danger' name='ajoutTarif' value='Ajouter un tarif' type='submit'>Ajouter</button></td>
            </form>
        </section>
    </main>
</body>
</html>