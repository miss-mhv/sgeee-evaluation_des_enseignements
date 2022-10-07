<?php
/**
 * Created by PhpStorm.
 * User: Miss Mhv
 * Date: 04/02/2020
 * Time: 20:20
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
        <h1 class="h3 mb-2 text-gray-800">Formulaire <?php echo $code_ue ?>: <?php echo utf8_encode($nom_ue) ?></h1>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- contenu du formalaire d'évaluation d'une UE par un étudiant -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <?php
                                $mois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
                                $cur_mois = $_SESSION['sess_eval_mois']-1;
                                ?>
                                <h1 class="h4 text-gray-900 mb-4">Formulaire d'évaluation - Session de <?php echo $mois[$cur_mois]." ".$_SESSION['sess_eval_annee']?></h1>
                            </div>
                            <?php
                            if(evaluation_deja_soumis($_SESSION['id_etd'], $id_ue, $_SESSION['sess_eval']))
                            {
                                echo "<p class='text-danger'>Vous avez déjà évalué cette UE!</p>";
                            }
                            else
                            {
                                ?>
                                <form method="post" action="index.php" class="user">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">UE: </label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="" value="<?php echo $code_ue ?>">
                                            <input type="text" readonly class="form-control-plaintext" name="ue" id="ue" value="<?php echo $id_ue ?>" hidden>
                                            <input type="text" readonly class="form-control-plaintext" name="id_etudiant" id="id_etudiant" value="<?php echo $_SESSION['id_etd'] ?>" hidden>
                                        </div>
                                    </div>

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
                                            $i++
                                            ?>
                                            <div class="form-group row critere">
                                                <div class="col-sm-12 mb-3 mb-sm-0">
                                                    <h4>Critère <?php echo $i ?>: <?php echo utf8_encode($nom_crit) ?> </h4>
                                                </div>

                                                <!-- Affichage de la liste de questions par critère -->

                                                <?php
                                                $all_question = liste_question_par_critere($id_crit);

                                                while ($question = $all_question->fetch())
                                                {
                                                    if(1)
                                                    {
                                                        $id_quest= $question['quest_id'];
                                                        $nom_quest= $question['quest_name'];

                                                        ?>
                                                        <div class="col-sm-8 mb-8 mb-sm-0">
                                                            <label for="date1_even"><?php echo utf8_encode($nom_quest)?></label>
                                                        </div>
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="quest_<?php echo $id_quest ?>" id="quest_<?php echo $id_quest ?>" value="1" required>
                                                                <label class="form-check-label" for="quest_<?php echo $id_quest ?>">1</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="quest_<?php echo $id_quest ?>" id="quest_<?php echo $id_quest ?>" value="2" required>
                                                                <label class="form-check-label" for="quest_<?php echo $id_quest ?>">2</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="quest_<?php echo $id_quest ?>" id="quest_<?php echo $id_quest ?>" value="3" required>
                                                                <label class="form-check-label" for="quest_<?php echo $id_quest ?>">3</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="quest_<?php echo $id_quest ?>" id="quest_<?php echo $id_quest ?>" value="4" required>
                                                                <label class="form-check-label" for="quest_<?php echo $id_quest ?>">4</label>
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

                                    <!-- Zone de texte libre pour la saisie des suggestions par les étudiants -->
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <h4>Zone des suggestions (Optionnel) </h4>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="form-check-label" for="quest_suggestion">Auriez-vous quelque chose à suggérer à l'enseignant?</label>
                                            <textarea class="form-control form-control-user" id="quest_suggestion" name="quest_suggestion"></textarea>
                                        </div>
                                    </div>

                                    <!-- Soumission de l'évaluation-->
                                    <div class="form-group row">
                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                        </div>
                                        <div class="col-sm-6">
                                            <button class="btn btn-success btn-user btn-block">
                                                Soumettre
                                            </button>
                                        </div>
                                        <div class="col-sm-3 mb-3 mb-sm-0">
                                        </div>
                                    </div>
                                    <hr>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

