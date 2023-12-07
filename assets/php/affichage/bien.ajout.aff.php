<?php

require_once("../include/connexion.inc.php");
require_once("../class/bien.class.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biens - Loc'Appart</title>
    <script type="text/javascript" src="../../js/autocomp/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/autocomp/script.bien.js"></script>
</head>

<body>
    <?php include("../template/header.html"); ?>
    <main>
        <section class="conteneur" id="tableau_bien">
            <form action="../insert/bien.ins.php" method="post" class="formulaire-insertion">
                <label for="nom_bien" class="formulaire-label">Nom bien : </label>
                <input type="text" name="nom_bien" id="nom_bien" class="formulaire-input">

                <label for="rue_bien" class="formulaire-label">Rue bien : </label>
                <input type="text" name="rue_bien" id="rue_bien" class="formulaire-input">

                <label for="codeP_bien" class="formulaire-label">Code Postal bien : </label>
                <input type="text" name="codeP_bien" id="codeP_bien" class="formulaire-input">
                
                <label for="vil_bien" class="formulaire-label">Ville bien : </label>
                <input type="text" name="vil_bien" id="vil_bien" class="formulaire-input">

                <label for="sup_bien" class="formulaire-label">Superficie bien : </label>
                <input type="text" name="sup_bien" id="sup_bien" class="formulaire-input">

                <label for="nb_couchage" class="formulaire-label">Nombre de couchage : </label>
                <input type="text" name="nb_couchage" id="nb_couchage" class="formulaire-input">

                <label for="nb_piece" class="formulaire-label">Nombre de pieces : </label>
                <input type="text" name="nb_piece" id="nb_piece" class="formulaire-input">

                <label for="nb_chambre" class="formulaire-label">Nombre de chambre : </label>
                <input type="text" name="nb_chambre" id="nb_chambre" class="formulaire-input">

                <label for="descriptif" class="formulaire-label">Descriptif : </label>
                <input type="text" name="descriptif" id="descriptif" class="formulaire-input">

                <label for="ref_bien" class="formulaire-label">Reference du bien : </label>
                <input type="text" name="ref_bien" id="ref_bien" class="formulaire-input">

                <label for="statut_bien" class="formulaire-label">Statut du bien : </label>
                <input type="text" name="statut_bien" id="statut_bien" class="formulaire-input">

                <label for="id_type_bien" class="formulaire-label">Type de bien : </label>
                <input type="text" name="id_type_bien" id="id_type_bien" onkeyup="autocompletBien()" class="formulaire-input">
                <input type="hidden" name="id_type_bien2" id="id_type_bien2" class="formulaire-input">
                <ul id="type_list_id"> </ul>

                <input type="submit" value="Ajouter un bien" class="bouton-primaire">
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

        #type_list_id {
            list-style: none;
            padding: 0;
            margin: 0;
            border: 1px solid #aaa;
            border-radius: 4px;
            max-height: 200px;
            overflow-y: auto;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            background-color: #fff;
        }

        #type_list_id li {
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #type_list_id li:hover {
            background-color: #f0f0f0;
        }

        #type_list_id li:first-child {
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }

        #type_list_id li:last-child {
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
        }

    </style>
</html>