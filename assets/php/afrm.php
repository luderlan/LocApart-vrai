<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "locapart";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }

    if (isset($_POST['login'])) {
        $log = ($_POST['login']);
        $mdp = ($_POST['mdp']);

        $stmt = $conn->prepare("SELECT * FROM users WHERE admin_log=? AND mot_de_passe=?");
        $stmt->bindParam(1, $log);
        $stmt->bindParam(2, $mdp);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if ($result) {
            session_start();
            $_SESSION['admin_log'] = $log;

            header("Location:../php/template/header.php");
            exit();
        } else {
            echo "Login ou mot de passe incorrect";
        }

        $stmt->closeCursor();
    }

    $conn = null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/connecter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Borel&family=Handlee&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mooli:wght@400;700&display=swap" rel="stylesheet">

    <title>Se Connecter</title>
</head>
<body>
    <div class="content">
        <div class="container">
            <h2>Bienvenue !</h2>
            <br><br>
            <div class="form_area">
                <p class="title">Connexion</p>
                <form action="afrm.php" method="POST">
                    <div class="form_group">
                        <label class="sub_title" for="login">Login</label>
                        <input placeholder="Saisir le login..." name="login" id="login" class="form_style" type="text" required>
                    </div>
                    <div class="form_group">
                        <label class="sub_title" for="mdp">Mot de passe</label>
                        <input placeholder="Saisir le mot de passe..." name="mdp" id="password" class="form_style" type="password" required>
                    </div>
                    <br><br><br>
                    <div>
                        <button type="submit" class="btn">Se connecter</button>
                        <!-- <p><a class="link" href="x.php">Mot de passe oublié ? </a></p> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br> 
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Finlandica:wght@500&display=swap');
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    text-decoration: none;
    list-style: none;
}   

body {
    min-height: 100vh;
    font-family: 'Mooli', sans-serif;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #fff;
}

.content {
    width: 70%;
    max-width: 850px; 
    height: 550px;
    background-color: #e2e7f1; 
    padding: 20px;
    border-radius: 76px;
    background: linear-gradient(145deg, #adc8ff, #7184b0);
    box-shadow:  19px 19px 15px #1b5eafcf,
                -19px -19px 15px #8ab1ff82;
}

.header {
    background-color: #eae4e444;
    padding: 20px;
    text-align: center;
    border-radius: 20px 20px 0 0;
    margin-bottom: 20px;
}

.header .title {
    color: #264143;
    font-weight: 900;
    font-size: 1.5em;
}

.container {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
  }
  
  .form_area {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-color: #eae4e444;
    height: auto;
    width: auto;
    border: 2px solid #264143;
    border-radius: 20px;
    box-shadow: 3px 4px 0px 1px #1b5eaf;
  }
  
  .title {
    color: #264143;
    font-weight: 900;
    font-size: 1.5em;
    margin-top: 20px;
  }
  
  .sub_title {
    font-weight: 600;
    margin: 5px 0;
  }
  
  .form_group {
    display: flex;
    flex-direction: column;
    align-items: baseline;
    margin: 10px;
  }
  
  .form_style {
    outline: none;
    border: 2px solid #264143;
    box-shadow: 3px 4px 0px 1px #1b5eaf;
    width: 290px;
    padding: 12px 10px;
    border-radius: 4px;
    font-size: 15px;
  }
  
  .form_style:focus, .btn:focus {
    transform: translateY(4px);
    box-shadow: 1px 2px 0px 0px #1b5eaf;
  }
  
  .btn {
    padding: 15px;
    margin: 25px 0px;
    width: 290px;
    font-size: 15px;
    background: #eae4e444;
    border-radius: 10px;
    font-weight: 800;
    box-shadow: 3px 3px 0px 0px #264143;
  }
  
  .btn:hover {
      transition: 0.5s;
      background-color: #1b5eaf;
      color: #fff;
      opacity: .9;
  }
  
  .link {
    font-weight: 800;
    color: #264143;
    padding: 5px;
  }
  
  footer {
      bottom: 0;
      width: 100%;
      background-color: #ddd0c8;
      padding-top: 40px;
      box-sizing: border-box;
  }
</style>