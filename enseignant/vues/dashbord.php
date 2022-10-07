<?php
/**
 * Created by PhpStorm.
 * User: Miss Mhv
 * Date: 13/03/2020
 * Time: 09:10
 */
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <?php
    $id_ens = $_SESSION['id_ens'];
    $id_sess =  $_SESSION['sess_eval'];
    $mois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    $cur_mois = $_SESSION['sess_eval_mois']-1;
    ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Session d'évaluation en cours: <?php echo $mois[$cur_mois] ." - ". $_SESSION['sess_eval_annee']?> </h1>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pourcentage des étudiants ayant déjà effectués leur évaluation : </h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <?php

        $nb_niv = count($tab_niveau);
        $j = 0;
        while($j < $nb_niv )
        {
            $all_ue_niv = liste_ue_par_niveau_ens($tab_niveau[$j], $id_ens);
            $nb_etd_niv = liste_etudiant_par_niveau($tab_niveau[$j])->rowCount();
            while($ue = $all_ue_niv->fetch())
            {
                $info_ue = lire_info_ue($ue['id']);
                $nb_etd_niv_eval_ue = liste_etd_evaluer_ue($info_ue['id'], $tab_niveau[$j], $id_sess)->rowCount();
                ?>
                <!-- Pourcentage d'évaluation par UE -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xl font-weight-bold text-success text-uppercase mb-1"><?php echo $info_ue['code']; ?></div>
                                    <!--
                                    <div>total etd du  niveau ayant évalué l'ue <?php echo $nb_etd_niv_eval_ue?></div>
                                    <div>total etd par niveau <?php echo $nb_etd_niv?></div>
                                    -->
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo round(($nb_etd_niv_eval_ue * 100) / $nb_etd_niv,2)?>%</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-percent-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            $j = $j + 1;
            ?>

        <?php
        }

        ?>

    </div>


</div>
