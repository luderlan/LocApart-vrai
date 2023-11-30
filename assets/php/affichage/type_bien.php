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
    <button class="bouton" onclick="redirectToHeader()">
        <svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
            <path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z" fill="#323232"></path>
        </svg>
        <span>Retour</span>
    </button>
    <script>
        function redirectToHeader() {
            window.location.href = "../template/header.php";
        }
    </script>
    <style>
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
    </style>
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
