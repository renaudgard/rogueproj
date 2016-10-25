<?php
session_start();
require_once('bddconnect.php') ;
require_once('fonctions.php') ;
require_once('header_footer.php') ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion Rogue Project</title>
</head>
<body>
<?php headerHTML(); ?>

<?php
if (!empty($_POST['connexion']))
{
    $erreurformulaire = validerFormulaire($_POST);

    if (empty($erreurformulaire))
    {
        $identifiants = [
            'pseudo' => ucfirst(strtolower(htmlentities($_POST['identifiant']))),
            'mdp' => htmlentities($_POST['mdp'])
        ];

        $requete = verificationMdp($bdd, $identifiants)->fetch();

        $validation = password_verify($identifiants['mdp'], $requete['mdp']);

        if ($validation)
        {
            $_SESSION['id']=$requete['id'];
            $_SESSION['admin']=$requete['admin'];
            header('Location:http://rogueproj/index.php');
        }
        else
        {
            $message = 'Les identifiants de connexion sont incorrects';
        }
    }
}
?>


<form method="post" action="">
    <fieldset>
        <legend><h3>Connexion</h3></legend>
        <label for="identifiant">Pseudo </label><br><input type="text" id="identifiant" name="identifiant">
        <?php if(!empty($erreurformulaire['identifiant'])){echo $erreurformulaire['identifiant'];} ?>
        <br>

        <label for="mdp">Mot de passe </label><br><input type="password" id="mdp" name="mdp">
        <?php if(!empty($erreurformulaire['mdp'])){echo $erreurformulaire['mdp'];} ?>
        <br>
        <input type="submit" value="Connexion" name="connexion">
        <input type="reset" value="Annuler">
    </fieldset>
</form>

<?php if(!empty($message)){echo $message;} ?>

<?php footerHTML(); ?>

</body>
</html>

