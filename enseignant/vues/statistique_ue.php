<?php
/**
 * Created by PhpStorm.
 * User: Miss Mhv
 * Date: 31/01/2020
 * Time: 21:17
 */

?>

<!-- Begin Page-Formulaire d'évaluation d'une UE  -->
<style>
    form.user .form-control-user {
        border-radius: inherit;
    }
</style>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Statistiques de l'UE <?php echo $code_ue ?>: <?php echo utf8_encode($nom_ue) ?></h1>

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- contenu du formalaire d'évaluation d'une UE par un étudiant -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5" id="session_eval">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Statistiques des évaluations</h1>
                        </div>
                        <form action="" method="post" id="for_sess_val">
                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label" for="select_session_eval">Choisir la session à afficher</label>
                                <select class="form-control col-sm-4" id="select_session_eval" name="select_session_eval" onchange="">
                                    <option value="" onclick="active_sess_eval('section_session_eval-0')">--/--</option>
                                    <?php
                                    $mois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
                                    $all_sess_eval = liste_session_eval();
                                    while ($sess_eval = $all_sess_eval->fetch())
                                    {
                                        $cur_mois = $sess_eval['mois']-1;
                                        if(1)
                                        {
                                            ?>
                                            <option value="<?php echo $sess_eval['id'];?>" onclick="active_sess_eval('section_session_eval-<?php echo $sess_eval['id']; ?>')"><?php echo $mois[$cur_mois].' '.$sess_eval['annee']; ?></option>
                                    <?php

                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </form>
                        <div class="section_session_eval-0">
                            <h4>Selectionner une session à afficher!</h4>
                        </div>
                        <?php
                        $all_sess_eval1 = liste_session_eval();
                        while ($sess_eval1 = $all_sess_eval1->fetch())
                        {
                            if(1)
                            {
                                $id_sess_eval =$sess_eval1['id'];
                                ?>
                                <div class="section_session_eval-<?php echo $id_sess_eval?>" >
                                    <!-- Content Row -->
                                    <!-- Affichage des critères -->
                                    <?php
                                    $all_critere = liste_critere();
                                    $i = 0;
                                    $j = 0;
                                    $question[]="";
                                    while ($critere = $all_critere->fetch())
                                    {
                                        if(1)
                                        {
                                            $id_crit = $critere['critere_id'];
                                            $nom_crit = $critere['critere_name'];
                                            $i++;
                                            ?>
                                            <!-- critère -->
                                            <h4>Critère <?php echo $i ?>: <?php echo utf8_encode($nom_crit) ?> </h4>
                                            <div class="row">
                                                <!-- Affichage de la liste des questions et reponse par critère -->

                                                <?php
                                                $all_question = liste_question_par_critere($id_crit);

                                                while ($question = $all_question->fetch())
                                                {
                                                    if(1)
                                                    {
                                                        $id_quest= $question['quest_id'];
                                                        $nom_quest= $question['quest_name'];
                                                        $eval_total = recuperer_evaluation($id_ue, $niveau_id, $id_quest, $id_sess_eval)->rowCount();
                                                        ?>
                                                        <div class="col-lg-6 mb-4">
                                                            <!-- Question 1 -->
                                                            <div class="card shadow mb-4">
                                                                <div class="card-header py-3">
                                                                    <h6 class="m-0 font-weight-bold "><?php echo utf8_encode($nom_quest)?></h6>
                                                                </div>
                                                                <div class="card-body">
                                                                    <span class="float-left mr-2">1</span>
                                                                    <div class="progress mb-2">
                                                                        <?php
                                                                        $eval_total_val = recuperer_evaluation_value($id_ue, $niveau_id, $id_quest, $id_sess_eval, 1)->rowCount();
                                                                        if($eval_total !=0 && $eval_total_val != 0)
                                                                        {
                                                                            $p_eval_total_val = ( $eval_total_val * 100 ) / $eval_total;
                                                                            ?>
                                                                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo round($p_eval_total_val,2); ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> <?php echo round($p_eval_total_val,2); ?>%</div>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <span class="float-left mr-2">2</span>
                                                                    <div class="progress mb-2">
                                                                        <?php
                                                                        $eval_total_val = recuperer_evaluation_value($id_ue, $niveau_id, $id_quest, $id_sess_eval, 2)->rowCount();
                                                                        if($eval_total !=0 && $eval_total_val != 0)
                                                                        {
                                                                            $p_eval_total_val = ( $eval_total_val * 100 ) / $eval_total;
                                                                            ?>
                                                                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo round($p_eval_total_val,2); ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> <?php echo round($p_eval_total_val,2); ?>%</div>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <span class="float-left mr-2">3</span>
                                                                    <div class="progress mb-2">
                                                                        <?php
                                                                        $eval_total_val = recuperer_evaluation_value($id_ue, $niveau_id, $id_quest, $id_sess_eval, 3)->rowCount();
                                                                        if($eval_total !=0 && $eval_total_val != 0)
                                                                        {
                                                                            $p_eval_total_val = ( $eval_total_val * 100 ) / $eval_total;
                                                                            ?>
                                                                            <div class="progress-bar bg-dark" role="progressbar" style="width: <?php echo round($p_eval_total_val,2); ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> <?php echo round($p_eval_total_val,2); ?>%</div>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <span class="float-left mr-2">4</span>
                                                                    <div class="progress mb-2">
                                                                        <?php
                                                                        $eval_total_val = recuperer_evaluation_value($id_ue, $niveau_id, $id_quest, $id_sess_eval, 4)->rowCount();
                                                                        if($eval_total !=0 && $eval_total_val != 0)
                                                                        {
                                                                            $p_eval_total_val = ( $eval_total_val * 100 ) / $eval_total;
                                                                            ?>
                                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo round($p_eval_total_val,2); ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> <?php echo round($p_eval_total_val,2); ?>%</div>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <?php
                                                    }
                                                }

                                                ?>


                                            </div>
                                            <?php
                                        }
                                    }

                                    ?>
                                    <!-- Liste des suggestions -->

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Liste des suggestions</h1>
                                    </div>
                                    <?php
                                    $all_suggestion = recuperer_suggestion($id_ue, $niveau_id, $id_sess_eval);
                                    if($all_suggestion)
                                    {
                                        $z = 0;
                                        $commentaire = '';
                                        while ($suggestion = $all_suggestion->fetch())
                                        {
                                            $commentaire = $suggestion['content_suggestion'];
                                            if($commentaire != '')
                                            {
                                                $z = $z + 1;
                                                ?>
                                                <div class="alert alert-primary alert-link" role="alert" id="">
                                                    <?php echo $z.". ". $suggestion['content_suggestion']; ?>
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <div class="alert alert-danger alert-link" role="alert" id="">
                                            Aucune suggestion n'a été soumise!
                                        </div>
                                        <?php
                                    }

                                    ?>

                                </div>
                                <?php

                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
