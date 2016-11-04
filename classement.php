<?php
session_start();
require_once('header_footer.php') ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Classement Rogue Project</title>
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/classement.css">
</head>
<body>

<?php headerHTML("classement"); ?>

    <div id="content" class="center">
        <h2 class="title">classement</h2>
        <div id="leaderboard">
            <ul id="board_title" class="big">
                <li class="niveau">niveau</li>
                <li class="rang">rang</li>
                <li class="date">date</li>
                <li class="perso">perso</li>
                <li class="joueur">joueur</li>
                <li class="competences">compétences</li>
                <li class="temps">temps</li>
                <li class="details">détails</li>
            </ul>

            <ul id="board">
                <?php for ($i = 1; $i <= 10; $i++) { ?>

                    <li>
                        <!-- checkbox cachée -->
                        <input type="checkbox"
                               id="<?= 'classement_checkbox_niveau_' . (26 - $i) ?>" class="display_sublines">

                        <!-- liste contenant l'enregistrement affiché -->
                        <!-- affichage sous liste (checkbox hack) -->
                        <label for="<?= 'classement_checkbox_niveau_' . (26 - $i) ?>" class="display_list">
                            <ul class="board_line">
                                <!-- niveau  -->
                                <li class="niveau">
                                    <!-- affichage niveau -->
                                    <?= 26 - $i ?>
                                </li>

                                <!-- affichage rang (toujours à 1) -->
                                <li class="rang">#1</li>

                                <!-- affichage de la date -->
                                <li class="date"><?= rand(1,31).'/'.rand(1,12).'/'.rand(2016,2017) ?></li>

                                <!-- affichage du personnage utilisé -->
                                <li class="perso"><img src="Resources/icons/mage.png" alt="Mage"></li>

                                <!-- affichage du pseudo du joueur -->
                                <li class="joueur"><?= 'Pseudo' . $i ?></li>

                                <!-- affichage du build -->
                                <li class="competences">
                                    <?php $tabMana = ['feu', 'terre', 'eau'];
                                    for ($k = 0; $k < 3; $k++) { ?>
                                        <?= rand(0, 10) ?>
                                        <img src="Resources/icons/<?= $tabMana[$k] ?>.png"<?= $tabMana[$k] ?>" alt="<?= $tabMana[$k] ?>">
                                    <?php } ?>
                                </li>

                                <!-- affichage du temps de jeu -->
                                <li class="temps"><?= rand(8, 18) . ':' . rand(0, 59) ?></li>

                                <!-- affichage des détails de la partie-->
                                <li class="details"><a href="" class="cross"></a></li>

                            </ul>
                        </label>
                        <!-- sous-liste cachée avec les mêmes caractéristiques, contenant les autres enregistrements pour ce même niveau-->
                        <div class="sub_lines">
                            <?php for ($j = 2; $j <= 5; $j++) { ?>
                                <ul class="board_line">
                                    <li class="niveau"><?= 26 - $i ?></li>

                                    <li class="rang"><?= '#' . $j ?></li>

                                    <li class="date"><?= rand(1,31).'/'.rand(1,12).'/'.rand(2016,2017) ?></li>

                                    <li class="perso"><img src="Resources/icons/mage.png" alt="Mage"></li>

                                    <li class="joueur"><?= 'Pseudo' . $i . ($j - 2) ?></li>

                                    <li class="competences">
                                        <?php $tabMana = ['feu', 'terre', 'eau'];
                                        for ($k = 0; $k < 3; $k++) { ?>
                                            <?= rand(0, 10) ?>
                                            <img src="Resources/icons/<?= $tabMana[$k] ?>.png"<?= $tabMana[$k] ?>" alt="<?= $tabMana[$k] ?>">
                                        <?php } ?>
                                    </li>

                                    <li class="temps"><?= rand(8, 18) . ':' . rand(0, 59) ?></li>
                                    <li class="details"><a href="" class="cross"></a></li>
                                </ul>
                            <?php } ?>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

<?php footerHTML(); ?>

</body>
</html>