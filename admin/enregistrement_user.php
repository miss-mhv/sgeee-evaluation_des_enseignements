<?php
/**
 * Created by PhpStorm.
 * User: Miss Mhv
 * Date: 16/02/2020
 * Time: 10:16
 */
include '../global/init.php';

/* traitement de l'enregistrement d'un nouveau */

if(isset($_POST['type_etd']) && $_POST['type_etd'] == 'etudiant')
{
    if(enregistrer_user_etudiant($_POST['nom_etd'], $_POST['prenom_etd'], $_POST['matricule_etd'], $_POST['niveau_etd'], $_POST['login_etd'], $_POST['password_etd']))
    {
        //include_once ('index.php');
       header('Location: index.php');
        //echo "succès!";
    }
    else
        echo "echec";
}
elseif(isset($_POST['type_ens']) && $_POST['type_ens'] == 'enseignant')
{
    if(enregistrer_user_etudiant($_POST['nom_etd'], $_POST['prenom_etd'], $_POST['matricule_etd'], $_POST['niveau_etd'], $_POST['login_etd'], $_POST['password_etd']))
    {
        echo "succès!";
    }
    else
        echo "echec";
}

?>