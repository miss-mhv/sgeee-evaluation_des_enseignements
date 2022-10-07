<?php
/**
 * Cette page représente le squelette de notre application
 * c'est le support de toutes les sessions de ce panel d'administration
 */

include '../global/init.php';

// Début de la tamporisation de sortie
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SGEEE - Admin</title>

  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="icon" type="../image/png" href="../img/logo_uy1.png" />

  <!-- stylesheet -->
  <link href="../css/admin.min.css" rel="stylesheet">
  <link href="../css/styles.css" rel="stylesheet">
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php

/****    Traitement de l'enregistrement d'un nouvveau compte étudiant *********/
if(isset($_SESSION['id_admin']) && isset($_POST['type_user']) && $_POST['type_user'] == 'etudiant')
{
  $all_etd = liste_etudiant();
  $nb_etd = $all_etd->rowCount();
  $df = 0;
  while ($etd = $all_etd->fetch())
  {
    if(1)
    {
      if($etd['login'] != $_POST['login_etd'])
      {
        $df = $df + 1;
      }
      else
      {
        break;
      }
    }
  }
  if($nb_etd == $df)
  {
    $last_id = enregistrer_user_etudiant($_POST['nom_etd'], $_POST['prenom_etd'], $_POST['matricule_etd'], $_POST['niveau_etd'], $_POST['login_etd'], $_POST['password_etd']);
    include_once 'vues/ajout_compte_ok.php';
  }
  else
  {
    include_once 'vues/ajout_compte_non_ok.php';
  }
}
elseif(isset($_SESSION['id_admin']) && isset($_POST['type_user']) && $_POST['type_user'] == 'enseignant')
{
  /****    Traitement de l'enregistrement d'un nouvveau compte enseignant *********/
  $all_ens = liste_enseignant();
  $nb_ens = $all_ens->rowCount();
  $df = 0;
  while ($ens = $all_ens->fetch())
  {
    if(1)
    {
      if($ens['login'] != $_POST['login_ens'])
      {
        $df = $df + 1;
      }
      else
      {
        break;
      }
    }
  }
  if($nb_ens == $df)
  {
    $last_id = enregistrer_user_enseignant($_POST['nom_ens'], $_POST['prenom_ens'], $_POST['matricule_ens'],  $_POST['login_ens'], $_POST['password_ens'], $_POST['grade_ens'], $_POST['fonction_ens'], $_POST['email_ens']);
    include_once 'vues/ajout_compte_ok.php';
  }
  else
  {
    include_once 'vues/ajout_compte_non_ok.php';
  }
}
elseif(isset($_SESSION['id_admin']) && isset($_POST['mois_sess_eval']))
{
  /****    Traitement de l'enregistrement d'une nouvvelle sessions d'évaluation *********/
  $all_sess_eval = liste_session_eval();
  $df = 0;
  $nb_sess_eval = $all_sess_eval->rowCount();
  while($sess_eval = $all_sess_eval->fetch())
  {
    if(($_POST['mois_sess_eval'] != $sess_eval['mois']) && ($_POST['mois_sess_eval'] != $sess_eval['annee']))
    {
      $df = $df + 1;
    }
    else
    {
      break;
    }
  }
  if($nb_sess_eval == $df)
  {
    if($_POST['etat_sess_eval'] == 1) // ajouter et activer la session
    {
      ajouter_et_activer_sess_eval($_POST['mois_sess_eval'], $_POST['annee_sess_eval'], $_POST['etat_sess_eval']);
      include_once 'vues/ajout_sess_eval_ok.php';
    }
    else // ajouter sans activer la session
    {
      ajouter_sans_activer_sess_eval($_POST['mois_sess_eval'], $_POST['annee_sess_eval'], $_POST['etat_sess_eval']);
      include_once 'vues/ajout_sess_eval_ok.php';
    }
  }
  else
  {
    include_once 'vues/ajout_sess_evl_non_ok.php';
  }
}
elseif(isset($_SESSION['id_admin']) && isset($_POST['input_critere']))
{
  /****    Traitement de l'enregistrement d'un nouveau critère d'évaluation *********/

  $all_crt = liste_critere();
  $df = 0;
  $nb_crt = $all_crt->rowCount();
  while($crt = $all_crt->fetch())
  {
    if(($_POST['input_critere'] != $crt['critere_name']))
    {
      $df = $df + 1;
    }
    else
    {
      break;
    }
  }
  if($nb_crt == $df)
  {
    ajouter_critere($_POST['input_critere']);
    // critère ajouter avec succès!
    include_once 'vues/ajout_critere_ok.php';
  }
  else
  {
    include_once 'vues/ajout_critere_non_ok.php';
  }

}
elseif(isset($_SESSION['id_admin']) && isset($_POST['critere_quest_eval']) && isset($_POST['input_question']))
{
  /****    Traitement de l'enregistrement d'une nouvelle question d'évaluation *********/

  $all_quest = liste_question();
  $df = 0;
  $nb_quest = $all_quest->rowCount();
  while($quest = $all_quest->fetch())
  {
    if(($_POST['input_question'] != $quest['quest_name']))
    {
      $df = $df + 1;
    }
    else
    {
      break;
    }
  }
  if($nb_quest == $df)
  {
    ajouter_question($_POST['critere_quest_eval'], $_POST['input_question']);
    // question ajoutée avec succès!
    include_once 'vues/ajout_question_ok.php';
  }
  else
  {
    include_once 'vues/ajout_question_non_ok.php';
  }

}
elseif(isset($_POST['login_admin']) && isset($_POST['mdp_admin']))
{
  $login = $_POST['login_admin'];
  $mdp = $_POST['mdp_admin'];
  if($login !=="" && $mdp!=="")
  {
    $id_user = connexion_admin($login, $mdp);
    if($id_user)
    {
      $info_user = lire_infos_utilisateur_admin($id_user);
      $_SESSION['id_admin'] = $info_user['id'];
      $_SESSION['nom_admin'] = $info_user['nom'];
      $_SESSION['prenom_admin'] = $info_user['prenom'];

      // Recupération de la session d'évaluation en cours
      $sess_eval = session_en_cours();
      $_SESSION['sess_eval'] = $sess_eval['id'];
      $_SESSION['sess_eval_mois'] = $sess_eval['mois'];
      $_SESSION['sess_eval_annee'] = $sess_eval['annee'];

      include_once 'vues/content.php';
    }
    else
    {
      header('Location: index.php?erreur=2');
    }
  }
  else
  {
    header('Location: index.php?erreur=1');
  }
}
else
{
  include_once 'vues/form_login.php';
}

?>

<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../js/admin.min.js"></script>

<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="../js/script.js"></script>

<!-- Gestion des graphes -->
<script src="../vendor/chart.js/Chart.min.js"></script>
<script src="../js/demo/chart-area-demo.js"></script>
<script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>
