<?php
  require_once("../assets/php/include/connexion.inc.php");

  // Vérifie si l'ID du bien est présent dans la variable GET
  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
      $id_bien = $_GET['id'];

      // Requête pour récupérer les détails du bien
      $query = "SELECT * FROM biens WHERE id_bien = :id_bien";
      $stmt = $con->prepare($query);
      $stmt->bindParam(':id_bien', $id_bien, PDO::PARAM_INT);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
          $property = $stmt->fetch(PDO::FETCH_ASSOC);

          // Requête pour récupérer les photos associées au bien
          $photo_query = "SELECT * FROM photos WHERE id_bien = :id_bien";
          $photo_stmt = $con->prepare($photo_query);
          $photo_stmt->bindParam(':id_bien', $id_bien, PDO::PARAM_INT);
          $photo_stmt->execute();
          $photos = $photo_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/pageBien.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Borel&family=Handlee&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mooli:wght@400;700&display=swap" rel="stylesheet">
    <title>Page du bien</title>
</head>
<body>
  <header>
      <img class="logo" src="../logo-site/logo-finis.png" alt="">

      <ul class="navbar">
          <li><a href="accueil.php"><i class="fa-solid fa-house" style="color: #1b5eaf;"></i> Accueil</a></li>
          <li><a href="biens.php"><i class="fa-solid fa-thumbtack" style="color: #1b5eaf;"></i> Nos biens</a></li>
          <li><a href="contact.html"><i class="fa-solid fa-address-book" style="color: #1b5eaf;" ></i> Contact</a></li>
      </ul>

      <div class="navbar">
          <a href="connecter.php" class="user"><i class="fa-regular fa-user" style="color: #1b5eaf;"></i> Se Connecter</a>
          <a href="inscrire.html"><i class="fa-regular fa-address-card" style="color: #1b5eaf;"></i> S'inscrire</a>
          <div class="bx bx-menu" id="menu-icon"></div>
      </div>
  </header>

    <div class="wrapper">
      <i id="left" class="fa-solid fa-angle-left"></i>
        <div class="carousel">
          <?php foreach ($photos as $photo): ?>
            <img src="../assets/img/biens/<?php echo $photo['nom_photo']; ?>" alt="img" draggable="false">
          <?php endforeach; ?>
        </div>
        <i id="right" class="fa-solid fa-angle-right"></i>
    </div>

    <!-- Exécute le carrousel -->
    <script src="../assets/js/carrousel.js" defer></script>
    <!-- Affiche chaques images lors du clique -->
    <script src="../assets/js/afficher-images.js"></script>

    <hr class="hr">
    <div class="description-bien">
        <h2><i class="fa-solid fa-house" style="color: #1b5eaf;"></i> Logement :&nbsp<?php echo $property['nom_bien']; ?></h2>
        <p>Notre bien&nbsp<?php echo $property['nom_bien']; ?>&nbspce situe à&nbsp<?php echo $property['vil_bien']; ?>&nbsp<?php echo $property['codeP_bien']; ?>&nbspà l'adresse suivante :&nbsp<?php echo $property['rue_bien']; ?></p>
        <p>Détails du bien : <br><div class="espace-section">Superficie : <?php echo $property['sup_bien']; ?>m² ○&nbspNombre de couchages : <?php echo $property['nb_couchage']; ?> ○&nbspNombre de pièces : <?php echo $property['nb_piece']; ?> ○&nbspNombre de chambres : <?php echo $property['nb_chambre']; ?></p></div>
        <p>Descriptif du bien : <br> 
        <div class="espace-section"><?php echo $property['descriptif']; ?></p></div>
    </div>
</body>
</html>

<?php
      } else {
          echo "<p>Le bien avec l'ID $id_bien n'a pas été trouvé.</p>";
      }
  } else {
      echo "<p>Aucun ID de bien n'a été fourni.</p>";
  }
?>


<footer>
    <div class="card">
        <a href="#" class="socialContainer containerOne">
          <svg class="socialSvg instagramSvg" viewBox="0 0 16 16"> <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path> </svg>
        </a>
        
        <a href="#" class="socialContainer containerTwo">
          <svg class="socialSvg twitterSvg" viewBox="0 0 16 16"> <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path> </svg>              
        </a>
          
        <a href="#" class="socialContainer containerThree">
          <svg class="socialSvg linkdinSvg" viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg>
        </a>
        
        <a href="#" class="socialContainer containerFour">
          <svg class="socialSvg whatsappSvg" viewBox="0 0 16 16"> <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path> </svg>
        </a>
    </div>      

    <hr class="hr-2">

    <div class="bas-page">
        <div class="section-bas-page">
            <h4>Assistance</h4>
            <p>Centre d'aide</p>
            <p>Options d'annulation</p>
            <p>Assistance handicap</p>
            <p>J'ai un problème de voisinage</p>
        </div>
        <div class="section-bas-page">
            <h4>Conditions générales</h4>
            <p>Centre d'aide</p>
            <p>Plan du site</p>
            <p>Fonctionnement du site</p>
            <p>Infos sur l'entreprise</p>
        </div>
        <div class="section-bas-page">
            <h4>Accueil de voyageurs</h4>
            <p>Mettez votre logement sur Loc'Appart</p>
            <p>Ressources pour les hôtes</p>
            <p>Forum de la communauté</p>
            <p>Hébergement responsable</p>
        </div>
        <div class="section-bas-page">
            <h4>Loc'Appart</h4>
            <p>Nouvelles fonctionnalités<x/p>
            <p>Carrières</p>
            <p>Investisseurs</p>
            <p>Cartes cadeaux</p>
        </div>
    </div>
    <br>
  <div class="Copyright" style="background-color: #f9f9f9;">
    <i class="fa-solid fa-copyright" style="color: #1b5eaf;"></i> 2023 Copyright:
    <a class="text-reset fw-bold" href="accueil.html">Loc'Appart</a> - <i class="fa-solid fa-globe" style="color: #1b5eaf;"></i> Français (FR) - <i class="fa-solid fa-euro-sign" style="color: #1b5eaf;"></i> EUR
  </div>
</footer>
</html>