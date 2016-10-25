<?php
// session_start();
// require_once('bddconnect.php');
require_once('fonctions.php');
require_once('header_footer.php') ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News Rogue Project</title>
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/global.css">
    <link rel="stylesheet" href="CSS/news.css">
</head>
<body>

<?php headerHTML(); ?>
<div id="main">
    <div id="content" class="center">
        <?php
        if (!empty($_POST['envoi_commentaire'])) {
            $erreurformulaire = validerFormulaire($_POST, ['news_id']);

            if (empty($erreurformulaire)) {
                $formulaire = [
                    'contenu' => htmlentities($_POST['news_comment']),
                    'idNews' => htmlentities($_POST['news_id']),
                    // 'idUtilisateur' => $_SESSION['id'],
                    'dateCommentaire' => date("Y-m-d H:i:s")
                ];

                //  ajouterCommentaire($bdd, $formulaire);
                var_dump($formulaire);
            }
        }

        if (!empty($_POST['effacer_commentaire'])) {
            supprimerCommentaire($bdd, $_POST['commentaire_id']);
        }
        ?>

        <?php for ($i = 0; $i < 10; $i++) { ?>
            <div class="news">
                <h3 class="subtitle">Lorem ipsum dolor sit amet</h3>

                <p><?= rand(1, 31) . '/' . rand(1, 12) . '/' . rand(2016, 2017) ?>, par Betawëen</p>

                <img src="/resources/characters.png" alt="Image de la news">

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto deserunt molestias
                    necessitatibus
                    perferendis porro quibusdam tempora, velit. Aperiam blanditiis eius, eligendi enim ex quasi vitae
                    voluptate.
                    Eos laborum mollitia provident.</p>

                <div id="<?= 'news_display_' . $i ?>">
                    <form method="post" action="">
                        <label for="<?= 'news_comment_' . $i ?>"></label>
                        <textarea name="<?= 'news_comment' ?>" id="<?= 'news_comment_' . $i ?>" cols="60" rows="8" placeholder="Écrire un commentaire..."></textarea>
                        <input type="hidden" name="news_id" value="<?= $i ?>">
                        <input type="submit" name="envoi_commentaire" value="Poster">
                    </form>
                </div>

                <div class="comment_list" id="<?= 'liste_commentaires_' . $i ?>">
                    <?php for ($j = 0; $j < rand(0, 5); $j++) { ?>
                        <div class="comment">
                            <p><span class="pseudo"><?= 'Pseudo_' . $j ?></span>,
                                le <?= rand(1, 31) . '/' . rand(1, 12) . '/' . rand(2016, 2017) ?></p>
                            <p>Aperiam atque aut distinctio exercitationem expedita explicabo fuga hic incidunt numquam
                                optio.</p>

                            <?php if (isset($_SESSION['id'])) {
                                if ($_SESSION['id'] == $commentaire['id_utilisateur'] || $_SESSION['admin'] == 1) { ?>

                                    <form method="post" action="">
                                        <input type="hidden" name="commentaire_id" value="<?= $commentaire['id'] ?>">
                                        <input type="submit" value="effacer le commentaire" name="effacer_commentaire">
                                    </form>

                                <?php }
                            } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php footerHTML(); ?>

</body>
</html>