<?php
require_once('header_footer.php') ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil Rogue Project</title>
</head>
<body>

<?php headerHTML(); ?>
<br>
<h2>CLASSEMENT</h2>

<div>
    <ul>
        <li>NIVEAU</li>
        <li>DATE</li>
        <li>RANG</li>
        <li>PERSO</li>
        <li>JOUEUR</li>
        <li>COMPETENCES</li>
        <li>TEMPS</li>
    </ul>

    <ul>
        <?php for ($i = 1;$i<=10;$i++){ ?>

            <li aria-haspopup="true">
                <!-- checkbox cachée -->
                <input type="checkbox" style="display: none" id="<?= 'classement_checkbox_niveau_'.(26-$i) ?>">

                <!-- liste contenant l'enregistrement affiché -->
                <ul>
                    <!-- niveau + label checkbox hack -->
                    <li>
                        <!-- affichage niveau -->
                        <?= 26-$i ?>

                        <!-- affichage sous liste -->
                        <label for="<?= 'classement_checkbox_niveau_'.(26-$i) ?>"><img src="" alt="plus"></label>
                    </li>

                    <!-- affichage de la date -->
                    <li>le <?= rand(1,31).'/'.rand(1,12).'/'.rand(2016,2017) ?></li>

                    <!-- affichage rang (toujours à 1) -->
                    <li>#1</li>

                    <!-- affichage du personnage utilisé -->
                    <li><img src="" alt="Perso"></li>

                    <!-- affichage du pseudo du joueur -->
                    <li><?= 'Pseudo'.$i ?></li>

                    <!-- affichage du build -->
                    <li>
                        <?php $tabMana = ['feu','terre','eau']; for ($k = 0;$k<3;$k++){ ?>
                            <?= rand(0,10) ?>
                            <img src="" alt="<?= $tabMana[$k] ?>">
                        <?php } ?>
                    </li>

                    <!-- affichage du temps de jeu -->
                    <li><?= rand(8,18).':'.rand(0,59) ?></li>
                </ul>
                <br>

                <!-- sous-liste cachée avec les mêmes caractéristiques, contenant les autres enregistrements pour ce même niveau-->
                <div aria-hidden="true">
                <?php for ($j = 2;$j<=5;$j++){ ?>
                    <ul>
                        <li><?= 26-$i ?></li>

                        <li>le <?= rand(1,31).'/'.rand(1,12).'/'.rand(2016,2017) ?></li>

                        <li><?= '#'.$j ?></li>

                        <li><img src="" alt="Perso"></li>

                        <li><?= 'Pseudo'.$i.($j-2) ?></li>

                        <li>
                            <?php $tabMana = ['feu','terre','eau']; for ($k = 0;$k<3;$k++){ ?>
                                <?= rand(0,10) ?>
                                <img src="" alt="<?= $tabMana[$k] ?>">
                            <?php } ?>
                        </li>

                        <li><?= rand(8,18).':'.rand(0,59) ?></li>
                    </ul>
                    <br>
                <?php } ?>
                </div>
            </li>
            <hr>

        <?php } ?>
    </ul>
</div>
<br>
<?php footerHTML(); ?>

</body>
</html>