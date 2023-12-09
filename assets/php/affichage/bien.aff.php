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
        <br><br><br>
        <main>
            <section class="conteneur" id="tableau_bien">
                    <table class="tableau">
                        <thead class="tableau_entete">
                            <tr>
                                <th>ID Bien</th>
                                <th>Nom</th>
                                <th>Rue</th>
                                <th>Code Postal</th>
                                <th>Ville</th>
                                <th>Superficie</th>
                                <th>Nombre de couchage</th>
                                <th>Nombre de piece</th>
                                <th>Nombre de chambre</th>
                                <th>Descriptif</th>
                                <th>Reference</th>
                                <th>Statut</th>
                                <th>Type bien</th>
                            </tr>
                        </thead>
                        <tbody class="tableau_corps">
                            <?php
                            $oBiens = new bien($con);
                            $result = $oBiens->selectBien();
                            if ($result->rowCount() > 0) {
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    $nob = 'nom_bien'.$row['id_bien'];
                                    $r = 'rue_bien'.$row['id_bien'];
                                    $cp = 'codeP_bien'.$row['id_bien'];
                                    $v = 'vil_bien'.$row['id_bien'];
                                    $s = 'sup_bien'.$row['id_bien'];
                                    $nbco = 'nb_couchage'.$row['id_bien'];
                                    $nbp = 'nb_piece'.$row['id_bien'];
                                    $nbch = 'nb_chambre'.$row['id_bien'];
                                    $d = 'descriptif'.$row['id_bien'];
                                    $rb = 'ref_bien'.$row['id_bien'];
                                    $sb = 'statut_bien'.$row['id_bien'];
                                    $idt = 'id_type_bien'.$row['id_bien'];                              
                                    $oTypeBien = new bien($con);
                                    $lib = $oTypeBien->getlib_type_bien($row['id_type_bien'],$con);
                                    $id = $row['id_bien'];
                                    echo "<tr>";
                                    echo "<td>", $row['id_bien'], "</td>";
                                    echo "<td><span>", $row['nom_bien'], "</span></td>";
                                    echo "<td><span>", $row['rue_bien'], "</span></td>";
                                    echo "<td><span>", $row['codeP_bien'], "</span></td>";
                                    echo "<td><span>", $row['vil_bien'], "</span></td>";
                                    echo "<td><span>", $row['sup_bien'], "</span></td>";
                                    echo "<td><span>", $row['nb_couchage'], "</span></td>";
                                    echo "<td><span>", $row['nb_piece'], "</span></td>";
                                    echo "<td><span>", $row['nb_chambre'], "</span></td>";
                                    echo "<td><span>", $row['descriptif'], "</span></td>";
                                    echo "<td><span>", $row['ref_bien'], "</span></td>";
                                    echo "<td><span>", $row['statut_bien'], "</span></td>";
                                    echo "<td><span>", $lib, "</span></td>";
                                    ?>
                                    <td>
                                        <button class='btn btn-primary' onclick="javascript:window.location.href = 'bien.modif.aff.php?id=<?php echo $id?>' "> Modifier </button>
                                    <button class='btn btn-danger' onclick="javascript:window.location.href ='../traitement/bien.trait.php?action=sup&id=<?php echo $id?>' "> Supprimer </button>
                                </td>
                                    <?php    
                                    echo "</tr>";
                                }
                            } else {
                                echo "<p>Aucun résultat trouvé.</p>";
                            }
                            ?>
                        </tbody>
                    </table>
                <a href="bien.ajout.aff.php"><button class = "bouton-primaire">Ajouter</button></a>
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