<?php
/**
 * Created by PhpStorm.
 * User: Miss Mhv
 * Date: 22/08/2017
 * Time: 09:54
 */
include '../global/config.php';

session_start();

include CHEMIN_MODELE.'connexion.php';

// V�rifie si l'utilisateur est connect�
function utilisateur_est_connecte($role_user) {
    if($role_user == 'etudiant')
    {
        return !empty($_SESSION['id_etd']);
    }
    elseif($role_user == 'enseignant')
    {
        return !empty($_SESSION['id_ens']);
    }
    elseif($role_user == 'admin')
    {
        return !empty($_SESSION['id_admin']);
    }
}

// On a besoin du mod�le des admins et des candidats

include CHEMIN_MODELE.'admin.php';
include CHEMIN_MODELE.'enseignant.php';
include CHEMIN_MODELE.'etudiant.php';

