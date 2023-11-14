<?php

require_once("../include/connexion.inc.php");
require_once("../class/class.client.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients - Loc'Appart</title>
</head>

<body>
    <?php include("../template/header.html"); ?>
    <main>
        <section class="conteneur" id="tableau_Clients">
            <form action="../traitement/trait.client.php" method="post">
                <table class="tableau">
                    <thead class="tableau_entete">

                        <tr>
                            <th>ID Clients</th>
                            <th>Nom client</th>
                            <th>Prenom client</th>
                            <th>Rue client</th>
                            <th>Code Postal client</th>
                            <th>Ville client</th>
                            <th>Mail client</th>
                            <th>Mdp client</th>
                            <th>Statut client</th>
                            <th>Valid client</th>
                        </tr>

                    </thead>
                    <tbody class="tableau_corps">
                        <?php
                        $oClient = new Client($con);
                        $result = $oClient->selectClient();

                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                                echo "<tr>";
                                echo "<td>", $row['id_client'], "</td>";

                                echo "<td><input type='text' name='nom_client[", $row['id_client'], "]' value='", $row['nom_client'], "'></td>";
                                echo "<td><input type='text' name='prenom_client[", $row['id_client'], "]' value='", $row['prenom_client'], "'></td>";
                                echo "<td><input type='text' name='rue_client[", $row['id_client'], "]' value='", $row['rue_client'], "'></td>";
                                echo "<td><input type='text' name='code_client[", $row['id_client'], "]' value='", $row['code_client'], "'></td>";
                                echo "<td><input type='text' name='vil_client[", $row['id_client'], "]' value='", $row['vil_client'], "'></td>";
                                echo "<td><input type='text' name='mail_client[", $row['id_client'], "]' value='", $row['mail_client'], "'></td>";
                                echo "<td><input type='password' name='pass_client[", $row['id_client'], "]' value='", $row['pass_client'], "'></td>";
                                echo "<td><input type='text' name='statut_client[", $row['id_client'], "]' value='", $row['statut_client'], "'></td>";
                                echo "<td><input type='text' name='valid_client[", $row['id_client'], "]' value='", $row['valid_client'], "'></td>";

                                echo "<td><button class='btn btn-primary' name='updateCli' value='", $row['id_client'], "' type=submit'>Modifier</button>
                                      <button class='btn btn-danger' name='deleteCli' value='", $row['id_client'], "' type=submit'>Supprimer</button></td>";
                                echo "</tr>";
                            }                            
                        } else {
                            echo "<p>Aucun résultat trouvé.</p>";
                        }
                        ?>
                    </tbody>
                </table>
            </form>

            <form action="../insert/insert_client.php" method="post" class="formulaire-insertion">

                <label for="nom_client" class="formulaire-label">Nom Client : </label>
                <input type="text" name="nom_client" id="nom_client" class="formulaire-input">

                <label for="prenom_client" class="formulaire-label">Prenom Client : </label>
                <input type="text" name="prenom_client" id="prenom_client" class="formulaire-input">

                <label for="rue_client" class="formulaire-label">Rue client : </label>
                <input type="text" name="rue_client" id="rue_client" class="formulaire-input">

                <label for="code_client" class="formulaire-label">Code postal : </label>
                <input type="text" name="code_client" id="code_client" class="formulaire-input">

                <label for="vil_client" class="formulaire-label">Ville client : </label>
                <input type="text" name="vil_client" id="vil_client" class="formulaire-input">

                <label for="mail_client" class="formulaire-label">Mail client : </label>
                <input type="text" name="mail_client" id="mail_client" class="formulaire-input">

                <label for='pass_client' class='formulaire-label'>Mot de passe client : </label>
                <input type='password' name='pass_client' id='pass_client' class='formulaire-input'>


                <label for="statut_client" class="formulaire-label">Statut du client : </label>
                <input type="text" name="statut_client" id="statut_client" class="formulaire-input">

                <label for="valid_client" class="formulaire-label">Client valide ? </label>
                <input type="text" name="valid_client" id="valid_client" class="formulaire-input">

                <input type="submit" value="Ajouter un Client" class="bouton-primaire">
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
</html>
