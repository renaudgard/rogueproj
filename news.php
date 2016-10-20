<?php
// require_once('bddconnect.php');
require_once('fonctions.php');
require_once('header_footer.php') ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News Rogue Project</title>
    <script src="Javascript_site/script_site.js"></script>
</head>
<body>

<?php headerHTML(); ?>
<br>

<?php
if (!empty($_POST['envoi_commentaire']))
{
    $erreurformulaire = validerFormulaire($_POST, ['news_id']);

    if (empty($erreurformulaire))
    {
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

if (!empty($_POST['effacer_commentaire']))
{
    supprimerCommentaire($bdd, $_POST['commentaire_id']);
}
?>

<?php for ($i=0 ; $i<10 ; $i++){ ?>
    <img src="/Ressources/No_Image_Available.png" alt="Image de la news" height="128px" width="128px">

    <h3>Lorem ipsum dolor sit amet</h3>

    <p>
        Par Betawëen, le <?= rand(1,31).'/'.rand(1,12).'/'.rand(2016,2017) ?>
        <?php // if (isset($_SESSION['id'])){ ?>
            <button onclick="display_comment(<?= $i ?>)">Commenter</button>
        <?php // }?>
    </p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto deserunt molestias necessitatibus perferendis porro quibusdam tempora, velit. Aperiam blanditiis eius, eligendi enim ex quasi vitae voluptate. Eos laborum mollitia provident.</p>

    <div id="<?= 'news_display_'.$i ?>" style="display: none">
        <form method="post" action="">
            <label for="<?= 'news_comment_'.$i ?>"></label>
            <textarea name="<?= 'news_comment' ?>" id="<?= 'news_comment_'.$i ?>" cols="60" rows="8" style="resize: none"></textarea>
            <input type="hidden" name="news_id" value="<?= $i ?>">
            <input type="submit" name="envoi_commentaire" value="Poster">
        </form>
    </div>


    <!--  Avant que tu fasses une crise cardiaque, le css dans la balise HTML était juste pour que tu différencies les commentaires du reste... PAS TAPER !  -->
    <div <?= 'liste_commentaires_'.$i ?> style="border:solid black 1px; text-align: end">
        <?php for ($j=0 ; $j<rand(0,5) ; $j++){ ?>
            <p>De <?= 'Pseudo_'.$j ?>, le <?= rand(1,31).'/'.rand(1,12).'/'.rand(2016,2017) ?></p>
            <p>Aperiam atque aut distinctio exercitationem expedita explicabo fuga hic incidunt numquam optio.</p>

            <?php if (isset($_SESSION['id']))
                { if ($_SESSION['id'] == $commentaire['id_utilisateur'] || $_SESSION['admin'] == 1) { ?>

                    <form method="post" action="">
                        <input type="hidden" name="commentaire_id" value="<?= $commentaire['id'] ?>">
                        <input type="submit" value="effacer le commentaire" name="effacer_commentaire">
                    </form>

            <?php }} ?>
        <?php } ?>
    </div>

    <hr>
<?php } ?>

<br>
<?php footerHTML(); ?>

</body>
</html>