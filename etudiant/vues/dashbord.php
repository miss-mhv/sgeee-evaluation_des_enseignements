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
    $id_etd = $_SESSION['id_etd'];
    $id_niv = $_SESSION['niveau_etd'];
    $id_sess =  $_SESSION['sess_eval'];
    // nombre total d'ues pour le niveau
    $nb_ue = liste_ue_niveau_ad($id_niv)->rowCount();
    // nombre d'ues déjà évaluées
    $nb_ue_eval = liste_ue_evaluer_par_etd($id_etd, $id_niv, $id_sess)->rowCount();
    ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Vous avez déjà évaluées <?php echo $nb_ue_eval; ?> / <?php echo $nb_ue; ?> UE</h1>
    </div>

    <!-- Content Row -->
    <?php
    $liste_ue_eval = liste_ue_non_evaluer_par_etd2($id_etd, $id_niv, $id_sess);
    if($liste_ue_eval->rowCount() > 0)
    {
        ?>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">UE en attente d'évaluation: </h1>
        </div>
        <div class="row">
            <?php
            while($ue = $liste_ue_eval->fetch())
            {
                $info_ue = lire_info_ue($ue['id']);

                ?>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4" onclick="affichage('section_etd-<?php echo $info_ue['code']; ?>')">
                    <div class="card border-left-success shadow h-100 py-2 div-ue">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xl font-weight-bold text-primary text-uppercase mb-1"><?php echo $info_ue['code']; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?>
</div>
