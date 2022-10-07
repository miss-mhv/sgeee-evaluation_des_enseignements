<?php
/**
 * Created by PhpStorm.
 * User: Miss Mhv
 * Date: 03/02/2020
 * Time: 20:58
 */

require_once"connexion.php";

/*********************** affichage de la liste des UE par niveau = code ***********************/

function liste_ue_niveau($code_niveau)
{
    $pdo = db_connect();
    $sql = "SELECT ue.id as id_ue, ue.code as code_ue, ue.intitule as nom_ue, ue.id_niveau
            FROM ue INNER JOIN niveau
            ON ue.id_niveau = niveau.id
            WHERE niveau.code =  '". $code_niveau ."' "   ;
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

/*********************** recuperer le ode d'un niveau à partir de l'id du niveau ***********************/

function code_niveau($id_niv)
{
    $pdo = db_connect();
    $sql = "SELECT *
            FROM niveau
            WHERE id  = '". $id_niv ."' ";
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

/*********************** affichage de la liste des critères ***********************/

function liste_critere()
{
    $pdo = db_connect();
    $sql = "SELECT id as critere_id, libelle as critere_name
            FROM critere";
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

/*********************** affichage de la liste des questions ***********************/

function liste_question()
{
    $pdo = db_connect();
    $sql = "SELECT id as quest_id, intitule as quest_name
            FROM question";

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


/*********************** affichage de la liste des questions par critère ***********************/

function liste_question_par_critere($idCritere)
{
    $pdo = db_connect();
    $sql = "SELECT question.id as quest_id, question.intitule as quest_name
            FROM question INNER JOIN critere
            ON question.id_critere = critere.id
            WHERE question.id_critere = '". $idCritere ."' ";
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

/*********************** Insertion d'une évaluation par un étudiant ***********************/

function evaluer($id_etudiant, $id_question, $id_ue, $valeur, $sess_eval)
{

    $pdo = db_connect();

    $sql = "INSERT INTO reponse(id_etudiant, id_question, id_ue, valeur, id_session_evaluation, date_soumission) VALUES (:id_etudiant, :id_question, :id_ue, :valeur, :id_session_evaluation, NOW())";

    $requete = $pdo->prepare($sql);

    $requete->bindValue(':id_etudiant', $id_etudiant);
    $requete->bindValue(':id_question', $id_question);
    $requete->bindValue(':id_ue', $id_ue);
    $requete->bindValue(':valeur', $valeur);
    $requete->bindValue(':id_session_evaluation', $sess_eval);

    if ($requete->execute()) {

        return $pdo->lastInsertId();
    }
    return $requete->errorInfo();
}

/*********************** Soumission d'une suggestion ***********************/

function soumettre_suggestion($id_etudiant,$sess_eval, $id_ue, $content_suggestion)
{

    $pdo = db_connect();

    $sql = "INSERT INTO suggestion(id_etudiant, id_session_evaluation, id_ue, content_suggestion, date_soumission) VALUES (:id_etudiant, :id_session_evaluation, :id_ue, :content_suggestion, NOW())";

    $requete = $pdo->prepare($sql);

    $requete->bindValue(':id_etudiant', $id_etudiant);
    $requete->bindValue(':id_session_evaluation', $sess_eval);
    $requete->bindValue(':id_ue', $id_ue);
    $requete->bindValue(':content_suggestion', $content_suggestion);

    if ($requete->execute()) {

        return $pdo->lastInsertId();
    }
    return $requete->errorInfo();
}

/*********************** fin Soumission d'une suggestion ***********************/



/*********************** tester si un étudiant a déjà évaluer une ue pour une session donnée ***********************/
function evaluation_deja_soumis($id_etd, $id_ue, $id_sess_eval)
{

    $pdo = db_connect();

    $requete = $pdo->prepare("
        SELECT *
        FROM reponse
		WHERE id_etudiant = :id_etudiant
		AND id_ue = :id_ue
	    AND id_session_evaluation = :id_session_evaluation ");

    $requete->bindValue(':id_etudiant', $id_etd);
    $requete->bindValue(':id_ue', $id_ue);
    $requete->bindValue(':id_session_evaluation', $id_sess_eval);
    $requete->execute();

    if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {

        $requete->closeCursor();
        return $result['id'];
    }
    return false;
}


/*********************** connexion d'un utilisateur ***********************/

function connexion_etudiant($nom_utilisateur, $mot_de_passe) {

    $pdo = db_connect();

    $requete = $pdo->prepare("SELECT id FROM etudiant
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

function lire_infos_utilisateur_etudiant($id_utilisateur)
{

    $pdo = db_connect();

    $requete = $pdo->prepare("
        SELECT *
		FROM etudiant
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

/****************************** Liste des UE évaluées par l'étudiant pour une session donnée ************************/
function liste_ue_evaluer_par_etd($id_etd, $id_niveau, $id_sess_eval)
{
    $pdo = db_connect();
    $sql = "
        SELECT id
        FROM ue
        WHERE id_niveau = '". $id_niveau ."'
        AND id IN
            ( SELECT id_ue
            FROM reponse
            WHERE id_etudiant = '". $id_etd ."'
            AND id_session_evaluation = '". $id_sess_eval ."' )

        ";
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

/****************************** Liste des UE non évaluées par l'étudiant pour une session donnée ************************/
function liste_ue_non_evaluer_par_etd2($id_etd, $id_niveau, $id_sess_eval)
{
    $pdo = db_connect();
    $sql = "
        SELECT id
        FROM ue
        WHERE id_niveau = '". $id_niveau ."'
        AND id NOT IN
            ( SELECT id_ue
            FROM reponse
            WHERE id_etudiant = '". $id_etd ."'
            AND id_session_evaluation = '". $id_sess_eval ."' )

        ";
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

/*********************** liste etudiant ayant évaluer une ue ***********************/
function liste_etd_evaluer_ue($id_ue, $id_niveau, $id_sess_eval)
{
    $pdo = db_connect();
    $sql = "
        SELECT DISTINCT r.id_etudiant
        FROM reponse as r
        WHERE r.id_ue = '". $id_ue ."'
        AND r.id_session_evaluation = '". $id_sess_eval ."'
        AND r.id_etudiant IN
            ( SELECT etd.id
            FROM etudiant as etd
            WHERE etd.id_niveau = '". $id_niveau ."')
        ";
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

/*********************** info sur un inveau***********************/
function lire_info_niveau($id_niveau)
{

    $pdo = db_connect();

    $requete = $pdo->prepare("
        SELECT *
		FROM niveau
		WHERE
		id = :id_niveau");

    $requete->bindValue(':id_niveau', $id_niveau);
    $requete->execute();

    if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {

        $requete->closeCursor();
        return $result;
    }
    return false;
}

/*********************** info sur une ue***********************/
function lire_info_ue($id_ue)
{

    $pdo = db_connect();

    $requete = $pdo->prepare("
        SELECT *
		FROM ue
		WHERE
		id = :id_ue");

    $requete->bindValue(':id_ue', $id_ue);
    $requete->execute();

    if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {

        $requete->closeCursor();
        return $result;
    }
    return false;
}

/*********************** affichage de la liste des UE par niveau = id***********************/

function liste_ue_par_niveau_ens($id_niveau, $îd_ens)
{
    $pdo = db_connect();
    $sql = "SELECT *
            FROM ue
            WHERE id_niveau =  '". $id_niveau ."'
            AND id_enseignant = '". $îd_ens ."'
            "   ;
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
