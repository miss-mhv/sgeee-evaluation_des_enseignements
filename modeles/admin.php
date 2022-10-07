<?php
/**
 * Created by PhpStorm.
 * User: Miss Mhv
 * Date: 03/02/2020
 * Time: 20:58
 */

require_once"connexion.php";

function connexion_admin($nom_utilisateur, $mot_de_passe) {

    $pdo = db_connect();

    $requete = $pdo->prepare("SELECT id FROM admin
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

function lire_infos_utilisateur_admin($id_utilisateur)
{

    $pdo = db_connect();

    $requete = $pdo->prepare("
        SELECT *
		FROM admin
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

/*********************** Recupération de la ssession d'évaluation en cours ***********************/

function session_en_cours()
{
    $pdo = db_connect();

    $requete = $pdo->prepare("
        SELECT *
		FROM session_evaluation
		WHERE
		etat = '1'
		LIMIT 1");

    $requete->execute();

    if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {

        $requete->closeCursor();
        return $result;
    }
    return FALSE;
}

/**************** Liste des sessions d'évalutation afficher en ordre croissant de date **********************/

function liste_session_eval()
{
    $pdo = db_connect();
    $sql = "SELECT *
            FROM session_evaluation" ;
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

/**************** Désactivation des aniciennes session d'évaluation **********************/
function desactive_sess_eval()
{
    $pdo = db_connect();

    $sql = " UPDATE session_evaluation SET etat = '0'";

    $requete = $pdo->prepare($sql);


    if ($requete->execute()) {

        return $pdo->lastInsertId();
    }
    return $requete->errorInfo();
}

/**************** ajout et activation d'une nouvelle session d'évaluation **********************/

function ajouter_et_activer_sess_eval($mois, $annee, $etat)
{
    $pdo = db_connect();
    desactive_sess_eval();
    $sql = "INSERT INTO session_evaluation (mois, annee, etat, date_ajout) VALUES (:mois, :annee, :etat, NOW())";

    $requete = $pdo->prepare($sql);

    $requete->bindValue(':mois', $mois);
    $requete->bindValue(':annee', $annee);
    $requete->bindValue(':etat', $etat);

    if ($requete->execute()) {

        return $pdo->lastInsertId();
    }
    return $requete->errorInfo();
}


/**************** ajout sans activiation d'une nouvelle session d'évaluation  **********************/

function ajouter_sans_activer_sess_eval($mois, $annee, $etat)
{
    $pdo = db_connect();
    $sql = "INSERT INTO session_evaluation (mois, annee, etat, date_ajout) VALUES (:mois, :annee, :etat, NOW())";

    $requete = $pdo->prepare($sql);

    $requete->bindValue(':mois', $mois);
    $requete->bindValue(':annee', $annee);
    $requete->bindValue(':etat', $etat);

    if ($requete->execute()) {

        return $pdo->lastInsertId();
    }
    return $requete->errorInfo();
}

function recuperer_evaluation($id_ue, $id_niveau, $id_question, $id_sess_eval)
{
    $pdo = db_connect();

    $requete = "
        SELECT *
		FROM reponse as r
		INNER JOIN ue
		ON r.id_ue = ue.id
		WHERE
		r.id_ue = '".$id_ue. "' AND
		ue.id_niveau = '".$id_niveau. "' AND
		r.id_question = '".$id_question. "' AND
		r.id_session_evaluation = '".$id_sess_eval. "'
		";

    try
    {
        $requete = $pdo->prepare($requete);
        $requete->execute();
        return ($requete);
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }
}


function recuperer_evaluation_value($id_ue, $id_niveau, $id_question, $id_sess_eval, $val)
{
    $pdo = db_connect();

    $requete = "
        SELECT *
		FROM reponse as r
		INNER JOIN ue
		ON r.id_ue = ue.id
		WHERE
		r.id_ue = '".$id_ue. "' AND
		ue.id_niveau = '".$id_niveau. "' AND
		r.id_question = '".$id_question. "' AND
		r.id_session_evaluation = '".$id_sess_eval. "' AND
		r.valeur = '".$val. "'
		";

    try
    {
        $requete = $pdo->prepare($requete);
        $requete->execute();
        return ($requete);
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }
}

/*********************** Recupérer la liste des suggestions par sessions d'évaluation et par ue pour chaque niveau ***********************/
function recuperer_suggestion($id_ue, $id_niveau, $id_sess_eval)
{
    $pdo = db_connect();

    $requete = "
        SELECT *
		FROM suggestion as s
		INNER JOIN ue
		ON s.id_ue = ue.id
		WHERE
		s.id_ue = '".$id_ue. "' AND
		ue.id_niveau = '".$id_niveau. "' AND
		s.id_session_evaluation = '".$id_sess_eval. "'
		";

    try
    {
        $requete = $pdo->prepare($requete);
        $requete->execute();
        return ($requete);
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }
}

/*********************** fin Recupérer la liste des suggestions par sessions d'évaluation et par ue pour chaque niveau ***********************/


/*********************** liste de tous les niveaux ***********************/
function liste_niveau()
{

    $pdo = db_connect();
    $sql = "SELECT *
            FROM niveau " ;
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

/*********************** liste des ue par niveaux ***********************/
function liste_ue_niveau_ad($id_niveau)
{

    $pdo = db_connect();
    $sql = "SELECT *
            FROM ue
            WHERE ue.id_niveau = '".$id_niveau."'" ;
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

/*********************** Entregistrement d'un nouvel utilisateur (etudiant) ***********************/

function enregistrer_user_etudiant($nom, $prenom, $matricule, $id_niveau, $login, $password)
{

    $pdo = db_connect();

    $sql = "INSERT INTO etudiant (nom, prenom, matricule, id_niveau, login, password, date_enregistrement) VALUES (:nom, :prenom, :matricule, :id_niveau, :login, :password, NOW())";

    $requete = $pdo->prepare($sql);

    $requete->bindValue(':nom', $nom);
    $requete->bindValue(':prenom', $prenom);
    $requete->bindValue(':matricule', $matricule);
    $requete->bindValue(':id_niveau', $id_niveau);
    $requete->bindValue(':login', $login);
    $requete->bindValue(':password', $password);

    if ($requete->execute()) {

        return $pdo->lastInsertId();
    }
    return $requete->errorInfo();
}

/*********************** Entregistrement d'un nouvel utilisateur (enseignant) ***********************/

function enregistrer_user_enseignant($nom, $prenom, $matricule, $login, $password, $grade, $fonction, $email)
{

    $pdo = db_connect();

    $sql = "INSERT INTO enseignant (nom, prenom, matricule, login, password, grade, fonction, email, date_enregistrement) VALUES (:nom, :prenom, :matricule, :login, :password, :grade, :fonction, :email, NOW())";

    $requete = $pdo->prepare($sql);

    $requete->bindValue(':nom', $nom);
    $requete->bindValue(':prenom', $prenom);
    $requete->bindValue(':matricule', $matricule);
    $requete->bindValue(':login', $login);
    $requete->bindValue(':password', $password);
    $requete->bindValue(':grade', $grade);
    $requete->bindValue(':fonction', $fonction);
    $requete->bindValue(':email', $email);

    if ($requete->execute()) {

        return $pdo->lastInsertId();
    }
    return $requete->errorInfo();
}

/*********************** affichage de la liste des étudiants ***********************/

function liste_etudiant()
{
    $pdo = db_connect();
    $sql = "SELECT *
            FROM etudiant";

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

/*********************** affichage de la liste des étudiants par niveau***********************/

function liste_etudiant_par_niveau($id_niveau)
{
    $pdo = db_connect();
    $sql = "
            SELECT *
            FROM etudiant as etd
            INNER JOIN niveau as niv
            ON etd.id_niveau = niv.id
            WHERE etd.id_niveau = '". $id_niveau . "'
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
function liste_enseignant()
{
    $pdo = db_connect();
    $sql = "SELECT *
            FROM enseignant";

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

/******************************** Ajouter un critère d'évaluation ******************************************/
function ajouter_critere($libelle)
{
    $pdo = db_connect();

    $sql = "INSERT INTO critere (libelle) VALUES (:libelle)";

    $requete = $pdo->prepare($sql);

    $requete->bindValue(':libelle', $libelle);

    if ($requete->execute()) {

        return $pdo->lastInsertId();
    }
    return $requete->errorInfo();
}

/******************************** Ajouter une question relative à un critère donné  ******************************************/
function ajouter_question($id_critere, $intitule_quest)
{
    $pdo = db_connect();

    $sql = "INSERT INTO question (id_critere, intitule) VALUES (:id_critere, :intitule)";

    $requete = $pdo->prepare($sql);

    $requete->bindValue(':id_critere', $id_critere);
    $requete->bindValue(':intitule', $intitule_quest);

    if ($requete->execute()) {

        return $pdo->lastInsertId();
    }
    return $requete->errorInfo();
}

?>