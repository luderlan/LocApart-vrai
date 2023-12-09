<?php
    if ($biens && is_array($biens)) {
        foreach ($biens as $bien) {
            ?>
            <div class='box'>
            <img src='../img/bien1/img1.jpg' alt=''>
            <h3><?php echo $bien['nom_bien']; ?></h3>
            <div class='content'>
                <div class='text'>
                    <p><?php echo $bien['vil_bien']; ?></p>
                </div>
                <div class='icon'>
                    <i class='bx bx-bed'></i><span><?php echo $bien['nb_couchage']; ?></span>
                </div><br>
                <div class="center-buttons">
                    <a href="indexCrud.php" class="btn">En savoir plus</a>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p>Aucun bien disponible.</p>";
}
?>