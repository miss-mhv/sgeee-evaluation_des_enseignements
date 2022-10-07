<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#" onclick="affichage('section-dash1')">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SGEEE </div>
    </a>
    <li class="nav-item active">
        <a class="nav-link" href="#">
            <span></span></a>
    </li>

    <?php

    /************************** Affichage des ue du niveau retourné **************************/

    $all_cod_niv = liste_niveau_par_enseignant($_SESSION['id_ens']);
    $tab_niveau = [];
    $i = 0;
    while ($niveau = $all_cod_niv->fetch())
    {
        if(1)
        {
            $niveau_id = $niveau['id_niveau'];
            $info_niveau = lire_info_niveau($niveau_id);
            $code_niveau =$info_niveau['code'];

            // creation d'un tableau pour récupérer les niveaux où l'enseignant enseigne
            $tab_niveau[$i] = $niveau_id;
            $i = $i + 1;
            ?>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - info1 -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?php echo $code_niveau ?>" aria-expanded="true" aria-controls="collapse<?php echo $code_niveau ?>">
                    <i class="fas fa-fw fa-cog"></i>
                    <span><?php echo $code_niveau ?></span>
                </a>
                <div id="collapse<?php echo $code_niveau ?>" class="collapse" aria-labelledby="headingcollapse<?php echo $code_niveau ?>" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Options:</h6>
                        <?php
                        $all_ue = liste_ue_par_enseignant_niveau($_SESSION['id_ens'], $niveau_id);
                        while ($ue = $all_ue->fetch())
                        {
                            $code_ue = $ue['code'];
                            $nom_ue = $ue['intitule'];
                            ?>
                            <a class="collapse-item" href="#" onclick="affichage('section_ens-<?php echo $code_niveau ?><?php echo $code_ue ?>')"><?php echo $code_ue ?></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </li>
            <?php
        }
    }

    ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Afficher / cacher la sidebar -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>