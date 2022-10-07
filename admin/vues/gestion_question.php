<!-- Begin Page-Administrateur Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Gestion des questions d'évaluation</h1>

    <!-- Aujouter une question d'évaluation -->
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- contenu du formalaire d'ajout d'une nouvelle question d'évaluation pour un critère donné  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5" id="add_sess_eval">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Enregistrement d'une question d'évaluation!</h1>
                        </div>
                        <form method="post" action="index.php" class="user form_add" id="form_add_quest_eval">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="mois_sess_eval">Critère d'évaluation</label>
                                <select class="form-control col-sm-8" id="critere_quest_eval" name="critere_quest_eval" required>
                                    <?php
                                    $all_crt = liste_critere();
                                    $i = 0;
                                    while($crt = $all_crt->fetch())
                                    {
                                        ++$i;
                                        ?>
                                        <tr>
                                            <option value="<?php echo utf8_encode( $crt['critere_id']); ?>"><?php echo $i."- ".utf8_encode( $crt['critere_name']); ?></option>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="input_question" name="input_question" placeholder="Intitulé de la question" required>
                                </div>
                            </div>

                            <!-- creation du compte -->
                            <div class="form-group row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-dark btn-user btn-block">
                                        Ajouter
                                    </button>
                                </div>
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                </div>
                            </div>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales liste des questions d'évaluation -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Liste des questions par critère d'évaluation</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable-list_etd" width="100%" cellspacing="0">
                    <tbody>
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
                            <tr class="bg-secondary text-white">
                                <td>Critère <?php echo $i ?>: <?php echo utf8_encode($nom_crit) ?></td>
                                <td></td>
                            </tr>
                            <!-- Affichage de la liste de questions par critère -->
                            <?php
                            $all_question = liste_question_par_critere($id_crit);

                            while ($question = $all_question->fetch())
                            {
                                if(1)
                                {
                                    $nom_quest= $question['quest_name'];
                                    ++$j;
                                    ?>
                                    <tr>
                                        <td><?php echo $j;?></td>
                                        <td><?php echo utf8_encode($nom_quest); ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            $j = 0;

                            ?>
                            <?php
                        }
                    }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->



