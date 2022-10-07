<?php
/**
 * Created by PhpStorm.
 * User: Miss Mhv
 * Date: 07/02/2020
 * Time: 01:00
 */
include '../global/init.php';
?>

<?php
$all_quest = liste_question();
$nb_quest = $all_quest->rowCount();  // nombre total de questions


/******************* recupération de l'id de l'étudiant et celui de l'ue ***************************/

$ue = $_POST['ue'];
$id_etudiant = $_POST['id_etudiant'];
//evaluer(2, 11, 5, 2,18);

/******************* evaluation ***************************/

while ($quest = $all_quest->fetch())
{
    if(1)
    {
        $id_quest = $quest['quest_id'];
        $id_input_quest = "quest_".$id_quest;
        $val_question = $_POST[$id_input_quest];
        evaluer($id_etudiant,$id_quest,$ue,$val_question,$_SESSION['sess_eval']);

    }
}
echo "Evaluation effectuée avec succès!";
//header('Location: index.php?eval=1');

//include_once 'vues/evaluation_ok.php';
?>

