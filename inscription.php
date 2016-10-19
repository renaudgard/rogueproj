<?php
//require_once('bddconnect.php') ;
require_once('fonctions.php') ;
require_once('header_footer.php') ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription Rogue Project</title>
</head>
<body>
<?php headerHTML(); ?>

<?php
if (!empty($_POST['inscription']))
{
    $erreurformulaire = validerFormulaire($_POST);

    if (empty($erreurformulaire))
    {
        $formulaire = [
            'pseudo' => ucfirst(strtolower(htmlentities($_POST['identifiant']))),
            'mail' => htmlentities($_POST['email']),
            'mdp' => htmlentities($_POST['mdp']),
            'confirmation_mdp' => htmlentities($_POST['confirmation_mdp'])
        ];

        if (strcmp($formulaire['mdp'],$formulaire['confirmation_mdp']) == 0)
        {
            //ajouterUtilisateur($bdd,$formulaire);
        }
        else
        {
            $message = 'Les deux mots de passe ne correspondent pas.';
        }
    }
}
?>


<form method="post" action="">
    <fieldset>
        <legend><h3>Inscription</h3></legend>
        <label for="identifiant">Pseudo </label><br><input type="text" id="identifiant" name="identifiant">
        <?php if(!empty($erreurformulaire['identifiant'])){echo $erreurformulaire['identifiant'];} ?>
        <br>

        <label for="email">Adresse mail </label><br><input type="email" id="email" name="email">
        <?php if(!empty($erreurformulaire['email'])){echo $erreurformulaire['email'];} ?>
        <br>

        <label for="mdp">Mot de passe </label><br><input type="password" id="mdp" name="mdp">
        <?php if(!empty($erreurformulaire['mdp'])){echo $erreurformulaire['mdp'];} ?>
        <br>

        <label for="confirmation_mdp">Confirmez votre mot de passe </label><br><input type="password" id="confirmation_mdp" name="confirmation_mdp">
        <?php if(!empty($erreurformulaire['confirmation_mdp'])){echo $erreurformulaire['confirmation_mdp'];} ?>
        <?php if(!empty($message)){echo $message;} ?>
        <br>
        <input type="submit" value="Valider" name="inscription">
        <input type="reset" value="Annuler">
    </fieldset>
</form>



<?php footerHTML(); ?>
</body>
</html>

