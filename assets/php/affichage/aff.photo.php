<?php

require_once("../include/connexion.inc.php");
require_once("../class/class.photo.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photos - Loc'Appart</title>
    <script type="text/javascript" src="../../js/autocomp/script.photo.js"></script>
    <script type="text/javascript" src="../../js/autocomp/jquery.min.js"></script>
</head>

<body>
    <?php include("../template/header.php"); ?>
    <main>
        <section class="conteneur" id="tableau_Photos">
            <form action="../traitement/trait.photo.php" method="post">
                <table class="tableau">
                    <thead class="tableau_entete">

                        <tr>
                            <th>ID Photo</th>
                            <th>Nom Photo</th>
                            <th>Lien Photo</th>
                            <th>ID_bien</th>
                        </tr>

                    </thead>
                    <tbody class="tableau_corps">
                        <?php
                        $oPhoto = new Photo($con);
                        $result = $oPhoto->selectPhoto();

                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                                echo "<tr>";
                                echo "<td>", $row['id_photo'], "</td>";

                                echo "<td><input type='text' name='nom_photo[", $row['id_photo'], "]' value='", $row['nom_photo'], "'></td>";
                                echo "<td><input type='text' name='lien_photo[", $row['id_photo'], "]' value='", $row['lien_photo'], "'></td>";
                                echo '<label for="id_bien" class="formulaire-label">bien : </label>
                                <div class="input_container">
                                    <input type="text" name="id_bien" id="id_bien" onkeyup="autocomplet()" class="formulaire-input">
                                    <input type="text" name="id_bien2" id="id_bien2" class="formulaire-input">
                                    <ul id="id_list_bien"></ul>
                                </div>';
                            

                
                                


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

            <form action="../insert/insert.photo.php" method="post" class="formulaire-insertion">

                <label for="nom_photo" class="formulaire-label">Nom photo : </label>
                <input type="text" name="nom_photo" id="nom_photo" class="formulaire-input">

                <label for="lien_photo" class="formulaire-label">Lien photo : </label>
                <input type="text" name="lien_photo" id="lien_photo" class="formulaire-input">



                <label for="id_bien" class="formulaire-label">bien : </label>
                <div class="input_container">
                    <input type="text" name="id_bien" id="id_bien" onkeyup="autocomplet()" class="formulaire-input">
                    <input type="text" name="id_bien2" id="id_bien2" class="formulaire-input">
                    <ul id="id_list_bien"></ul>
                </div>











        

                <input type="submit" value="Ajouter une Photo" class="bouton-primaire">
            </form>
        </section>
    </main>
</body>




<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        main {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 16px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #323232;
            color: white;
        }

        input[type="text"] {
            padding: 8px;
            margin-right: 10px;
        }

        .formulaire-insertion {
            margin-top: 20px;
        }

        .formulaire-label {
            display: block;
            margin-bottom: 8px;
        }

        .formulaire-input {
            width: 60%;
            padding: 8px;
            margin-bottom: 20px;
        }

        .bouton-primaire {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .bouton-primaire:hover {
            background-color: #45a049;
        }

        .btn {
            padding: 8px 12px;
            margin-right: 5px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #1b5eaf;
            color: white;
            border: none;
            border-radius: 4px;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
        }

    </style>


                    echo "<td><select id="id_bien" name="id_bien">";
                                    $all_photo = $con->selectIdBien();
                                    foreach($all_photos as $photo) {
                                        echo"<option value=" echo $photo["id_photo"];
                                        echo $équipe["id_photo"]." ".$équipe["région"];}
                                </option>
                            </select>
                        </td>"

                        </html>
