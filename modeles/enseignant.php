<?php
/**
 * Created by PhpStorm.
 * User: Miss Mhv
 * Date: 03/02/2020
 * Time: 20:58
 */

require_once"connexion.php";

/*********************** connexion d'un utilisateur ***********************/

function connexion_enseigant($nom_utilisateur, $mot_de_passe) {

    $pdo = db_connect();

    $requete = $pdo->prepare("SELECT id FROM enseignant
		WHERE
		login = :nom_utilisateur AND
		password = :mot_de_passe ");

    $requete->bindValue(':nom_utilisateur', $nom_utilisateur);
    $requete->bindValue(':mot_de_passe', $mot_de_passe);
    $requete->execute();

    if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {

        $requete->closeCursor();
        return $result['id'];
    }
    return false;
}

function lire_infos_utilisateur_enseignant($id_utilisateur)
{

    $pdo = db_connect();

    $requete = $pdo->prepare("
        SELECT *
		FROM enseignant
		WHERE
		id = :id_utilisateur");

    $requete->bindValue(':id_utilisateur', $id_utilisateur);
    $requete->execute();

    if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {

        $requete->closeCursor();
        return $result;
    }
    return false;
}

/*********************** liste des salles où un enseignant donné enseigne***********************/
function liste_niveau_par_enseignant($id_enseignant)
{

    $pdo = db_connect();
    $sql = "SELECT niveau.id as id_niveau
            FROM niveau WHERE niveau.id IN
            (SELECT ue.id_niveau
            FROM ue
            WHERE ue.id_enseignant =  '". $id_enseignant ."' )
            " ;
    try
    {
        $requete = $pdo->prepare($sql);
        $requete->execute();
        return ($requete);
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }
    return FALSE;
}

/*********************** liste des ue par enseignant dans chaque niveau où il enseigne***********************/
function liste_ue_par_enseignant_niveau($id_enseignant, $id_niveau)
{
    $pdo = db_connect();
    $sql = "
            SELECT *
            FROM ue
            WHERE id_enseignant =  '". $id_enseignant ."'
            AND id_niveau =  '". $id_niveau ."' " ;
    try
    {
        $requete = $pdo->prepare($sql);
        $requete->execute();
        return ($requete);
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }
    return FALSE;
}

/*********************** liste des ue par enseignant***********************/
function liste_ue_par_enseignant($id_enseignant)
{
    $pdo = db_connect();
    $sql = "
            SELECT *
            FROM ue
            WHERE id_enseignant =  '". $id_enseignant ."' " ;
    try
    {
        $requete = $pdo->prepare($sql);
        $requete->execute();
        return ($requete);
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }
    return FALSE;
}
