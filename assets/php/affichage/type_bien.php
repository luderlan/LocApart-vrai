<?php

require_once("../include/connexion.inc.php");
require_once("../class/type_bien.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type de biens - Loc'Appart</title>
</head>

<body>
    <?php include("../template/header.php"); ?>
    <main>
        <section class="conteneur" id="tableau_typebien">
            <form action="../traitement/type_bien.php" method="post">
                <table class="tableau">
                    <thead class="tableau_entete">
                        <tr>
                            <th>ID Type Bien</th>
                            <th>Libellé Type Bien</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="tableau_corps">
                        <?php
                        $oTypes = new type_bien($con);
                        $result = $oTypes->select();
                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>", $row['id_type_bien'], "</td>";
                                echo "<td><input type='text' name='lib_type_bien[", $row['id_type_bien'], "]' value='", $row['lib_type_bien'], "'></td>";
                                echo "<td><button class='btn btn-primary' name='update' value='", $row['id_type_bien'], "' type=submit'>Modifier</button>
                                      <button class='btn btn-danger' name='delete' value='", $row['id_type_bien'], "' type=submit'>Supprimer</button></td>";
                                echo "</tr>";
                            }                            
                        } else {
                            echo "<p>Aucun résultat trouvé.</p>";
                        }
                        ?>
                    </tbody>
                </table>
            </form>
            <form action="../insert/type_bien.php" method="post" class="formulaire-insertion">
                <label for="lib_type_bien" class="formulaire-label">Nouveau type de bien : </label>
                <input type="text" name="lib_type_bien" id="lib_type_bien" class="formulaire-input">
                <input type="submit" value="Ajouter un type de bien" class="bouton-primaire">
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
        .section-admin {
        margin-left: 30px;
        display: none;
        }
    </style>
</html>