<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title></title>
</head>
<body>
    <header>
        <img class="logo" src="../../../logo-site/logo-finis.png" alt="">

        <ul class="navbar">
            <li><a href="../../../interface/accueil.php"><i class="fa-solid fa-house" style="color: #1b5eaf;"></i> Accueil</a></li>
            <li><a href="../../../interface/biens.html"><i class="fa-solid fa-thumbtack" style="color: #1b5eaf;"></i> Nos biens</a></li>
            <li><a href="../../../interface/contact.html"><i class="fa-solid fa-address-book" style="color: #1b5eaf;" ></i> Contact</a></li>
        </ul>

        <div class="navbar">
            <a href="../../../interface/connecter.php" class="user"><i class="fa-regular fa-user" style="color: #1b5eaf;"></i> Se Connecter</a>
            <a href="../../../interface/inscrire.html"><i class="fa-regular fa-address-card" style="color: #1b5eaf;"></i> S'inscrire</a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>
    <div class="section-admin">
        <h2>Connecté en tant qu'administrateur</h2>
        <br>
        <h4>Dirigez-vous vers la page de gestion de votre choix :</h4>
        <br>
        <br>
        <a href="../affichage/aff.client.php" class="button">Clients</a>
        <a href="../affichage/bien.aff.php" class="button">Biens</a>
        <a href="../affichage/aff.reservation.php" class="button">Réservation</a>
        <a href="../affichage/type_bien.php" class="button">Type bien</a>
    </div>
</body>
<style>
@import url('https://fonts.googleapis.com/css2?family=Finlandica:wght@500&display=swap');
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    text-decoration: none;
    list-style: none;
}

:root{
    --bg-color: #ddd0c8;
    --text-color: #323232;
    --main-color: #1b5eaf;
}

body {
    min-height: 100vh;
    color: var(--text-color);
    font-family: 'Mooli', sans-serif;
}

header {
    width: 100%;
    height: 146px;
    top: 0;
    right: 0;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: transparent;
    padding: 60px 12%;
    transition: all .50s ease;
    font-family: 'Finlandica', sans-serif;
    background: var(--bg-color);
}

.logo {
    max-width: 450px;
    max-height: 450px;
}

.navbar {
    display: flex;
    align-items: center;
    white-space: nowrap;
}

.navbar a {
    color: var(--text-color);
    font-size: 1.1rem;
    font-weight: 500;
    padding: 5px 25px;
    margin: 5px 0;
    transition: all .50s ease;
}   

.navbar a:hover {
    color: var(--main-color);
}

.navbar a.active {
    color: var(--main-color);
}

.main {
    display: flex;
    align-items: center;
}

.main a {
    margin-right: 25px;
    margin-left: 10px;
    color: var(--text-color);
    font-size: 1.1rem;
    font-weight: 500;
    transition: all .50s ease;
}

.main a:hover{
    color: var(--main-color);
}

#menu-icon{
    font-size: 35px;
    color: var(--text-color);
    cursor: pointer;
    z-index: 10001;
    display: none;
}

@media (max-width: 1280px) {
    header{
        padding: 14px 2%;
        transition: .2s;
    }
    .navbar a{
        padding: 5px 0;
        margin: 0px 20px;
    }
}

@media (max-width: 1090px) {
    #menu-icon{
        display: block;
    }
    .navbar{
        position: absolute;
        top: 100%;
        right: -100%;
        width: 270px;
        height: 29vh;
        background: var(--main-color);
        display: flex;
        flex-direction: column;
        justify-content:flex-start;
        border-radius: 10px;
        transition: all .50s ease;
    }
    .navbar a {
        display: block;
        margin: 12px 0;
        padding: 0px 25px;
        transition: all .50s ease;
    }
    .navbar a:hover {
        color: var(--text-color);
        transform: translateY(5px);
    }
    .navbar a.active{
        color: var(--text-color);
    }
    .navbar.open{
        right: 2%;
    }
}

.navbar .search-bar {
    display: flex;
    align-items: center;
    margin: 0px 30px;
}

.navbar .search-bar input {
    padding: 5px;
    border: none;
    border-radius: 9px;
    margin-right: 6px;
    font-family: 'Finlandica', sans-serif;
}

.navbar .search-bar i {
    color: var(--main-color);
    font-size: 20px;
    cursor: pointer;
}

.sub-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    box-shadow: 0 0 10px rgba(14, 14, 14, 0.1);
    width: 100%;
    z-index: 1; 
    text-align: center;
    background-color: #fff;
    border-radius: 20px;
}

.navbar > li:hover .sub-menu {
    display: block;
}

.navbar > li {
    position: relative;
}

.sub-menu li {
    padding: 10px;
    border-bottom: 1px solid #ccc;
    display: block;
    width: 100%;
}

.sub-menu li:last-child {
    border-bottom: none;
}

.sub-menu li {
    transition: background-color 0.2s;
}

.sub-menu li:hover {
    background-color: #ddd0c8;
}

.section-admin {
    text-align: center;
}

.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #1b5eaf;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.button:hover {
    background-color: #15548c;
}

</style>
</html> 