<?php

function verificationMdp($bdd, $identifiants)
{

    try {
        $requete = $bdd->prepare('SELECT id, mdp FROM utilisateurs WHERE pseudo=:pseudo');
        $requete->execute([
            'pseudo' => $identifiants['pseudo']
        ]);

    } catch (\PDOException $e) {
        print "Error!: " . $e->getMessage() . "</br>";
    }

    return $requete;
}

function validerFormulaire($formulaire, $nonVerif = array())
{
    $erreurFormulaire = array();

    foreach ($formulaire as $cle => $donnees) {
        if (!in_array($cle, $nonVerif)) {
            if (empty($donnees)) {
                $erreurFormulaire += array($cle => 'Veuillez remplir le champ');
            }
        }
    }
    return $erreurFormulaire;
}

function ajouterUtilisateur($bdd, $formulaire){
    try {
        $requete = $bdd->prepare('INSERT INTO utilisateurs(mail, pseudo, mdp, admin) VALUES (:mail, :pseudo, :mdp, 1)');
        $requete->execute(array(
            'mail' => $formulaire['mail'],
            'pseudo' => $formulaire['pseudo'],
            'mdp' => password_hash($formulaire['mdp'],PASSWORD_DEFAULT)
        ));
    } catch (\PDOException $e) {
        print "Error!: " . $e->getMessage() . "</br>";
    }
}

function ajouterCommentaire($bdd, $formulaire){
    try {
        $requete = $bdd->prepare('INSERT INTO commentaires(contenu, dateCommentaire, idUtilisateur, idNews) VALUES (:contenu, :dateCommentaire, :idUtilisateur, :idNews)');
        $requete->execute(array(
            'contenu' => $formulaire['contenu'],
            'dateCommentaire' => $formulaire['dateCommentaire'],
            'idUtilisateur' => $formulaire['idUtilisateur'],
            'idNews' => $formulaire['idNews']
        ));
    } catch (\PDOException $e) {
        print "Error!: " . $e->getMessage() . "</br>";
    }
}

function supprimerCommentaire($bdd, $idCommentaire)
{
    try {

        $bdd->query('DELETE FROM commentaires WHERE id='.$idCommentaire);

    } catch (\PDOException $e) {
        print "Error!: " . $e->getMessage() . "</br>";
    }
}
