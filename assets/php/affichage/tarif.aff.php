<?php

require_once("../include/connexion.inc.php");
require_once("../class/tarif.class.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarif de biens - Loc'Appart</title>
    <script type="text/javascript" src="../../js/autocomp/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/autocomp/script.tarif.js"></script>
</head>

<body>
    <?php include("../template/header.php"); ?>
    <main>
        <section class="conteneur" id="tableau_tarif">
            <form action="../traitement/tarif.trait.php" method="post">
                <table class="tableau">
                    <thead class="tableau_entete">
                        <tr>
                            <th>ID Tarif</th>
                            <th>Date de debut</th>
                            <th>Date de fin</th>
                            <th>Prix</th>
                            <th>ID Bien</th>
                        </tr>
                    </thead>
                    <tbody class="tableau_corps">
                        <?php
                        $oTarif = new tarif($con);
                        $result = $oTarif->select();
                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                
                                $dd = 'dd_tarif'.$row['id_tarif'];
                                $df = 'df_tarif'.$row['id_tarif'];
                                $p = 'prix_loc'.$row['id_tarif'];
                                $idb = 'id_bien'.$row['id_tarif'];

                                echo "<tr>";
                                echo "<td>", $row['id_tarif'], "</td>";
                                echo "<td><input type='text' name='$dd' value='", $row['dd_tarif'], "'></td>";
                                echo "<td><input type='text' name='$df' value='", $row['df_tarif'], "'></td>";
                                echo "<td><input type='text' name='$p' value='", $row['prix_loc'], "'></td>";
                                echo "<td><input type='text' name='$idb' value='", $row['id_bien'], "'></td>";
                                echo "<td><button class='btn btn-primary' name='update' value='", $row['id_tarif'], "' type=submit'>Modifier</button>
                                <button class='btn btn-danger' name='delete' value='", $row['id_tarif'], "' type=submit'>Supprimer</button></td>";
                                
                                echo "</tr>";

                            }
                        } else {
                            echo "<p>Aucun résultat trouvé.</p>";
                        }
                        ?>
                    </tbody>
                </table>
            </form>
            <form action="../insert/tarif.ins.php" method="post" class="formulaire-insertion">
                <label for="dd_tarif" class="formulaire-label">Date de debut : </label>
                <input type="date" name="dd_tarif" id="dd_tarif" class="formulaire-input">

                <label for="df_tarif" class="formulaire-label">Date de fin : </label>
                <input type="date" name="df_tarif" id="df_tarif" class="formulaire-input">

                <label for="prix_loc" class="formulaire-label">Prix : </label>
                <input type="text" name="prix_loc" id="prix_loc" class="formulaire-input">
                
                <label for="id_bien" class="formulaire-label">Bien : </label>
                <input type="text" name="id_bien" id="id_bien" onkeyup="autocomplet()" class="formulaire-input">
                <input type="hidden" name="id_bien2" id="id_bien2" class="formulaire-input">
                <ul id="bien_list_id"> </ul>

                <input type="submit" value="Ajouter un tarif" class="bouton-primaire">
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
            max-width:1500px;
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
            padding: 6px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #323232;
            color: white;
        }

        input[type="text"] {
            padding: 4px;
            margin-right: 5px;
            width: 100%;
        }

        .formulaire-insertion {
            margin-top: 10px;
        }

        .formulaire-label {
            display: block;
            margin-bottom: 8px;
            
        }

        .formulaire-input {
            width: 25%;
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

        .bouton {
        background: transparent;
        position: absolute;
        top: 25%;
        left: 17%;
        transform: translate(-50%, -50%);
        padding: 5px 15px;
        display: flex;
        align-items: center;
        font-size: 17px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        border: 1px solid #1b5eaf;
        border-radius: 25px;
        outline: none;
        overflow: hidden;
        color: #323232;
        transition: color 0.7s 0.4s ease-out;
        text-align: center;
    }

    .bouton span {
        margin: 10px;
    }

    .bouton > svg {
        margin-right: 5px;
        margin-left: 5px;
        font-size: 20px;
        transition: all 0.4s ease-in;
    }

    .bouton:hover > svg {
        font-size: 1.2em;
        transform: translateX(-5px);
    }

    .bouton::before {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        content: '';
        border-radius: 50%;
        display: block;
        width: 20em;
        height: 20em;
        left: -5em;
        text-align: center;
        transition: box-shadow 0.5s ease-out;
        z-index: -1;
    }

    .bouton:hover {
        color: #f4f4f4;
        border: 1px solid #1b5eaf;
    }

    .bouton:hover::before {
        box-shadow: inset 0 0 0 10em #1b5eaf;
    }

    .bouton svg path {
        fill: #323232;
        transition: fill 0.4s ease-in-out;
    }

    .bouton:hover svg path {
        fill: #fff;
    }

        .section-admin {
            margin-left: 30px;
            display: none;
        }
    </style>
</html>