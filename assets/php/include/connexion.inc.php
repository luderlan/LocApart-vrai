<?php

    $user = "root";
    $mdp = "FwerTc-XcxK0B8l*";
    $serveur = "localhost";
    $bd = "locapart";
    $dns = "mysql:host=$serveur;dbname=$bd";

    try{
            $con = new PDO($dns, $user, $mdp);
    }

    catch (PDOException $e){
        echo"Erreur de connexion à la base de donnée : " .$e->getMessage();
    }

?>