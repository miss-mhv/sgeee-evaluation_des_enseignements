<?php
/**
 * Created by PhpStorm.
 * User: Miss Mhv
 * Date: 22/08/2017
 * Time: 09:54
 */
// Chemins à utiliser pour accéder aux vues/modeles/librairies
$module = empty($module) ? !empty($_GET['module']) ? $_GET['module'] : 'index' : $module;
define('CHEMIN_VUE_etd',    'etudiant/vues/');
define('CHEMIN_VUE_ens',    'enseignant/vues/');
define('CHEMIN_CONTROLEUR',    '../modules/'.$module.'/');
define('CHEMIN_MODELE', '../modeles/');
define('CHEMIN_LIB',    '../libs/');
define('CHEMIN_VUE_GLOBALE', '../vues_globales/');