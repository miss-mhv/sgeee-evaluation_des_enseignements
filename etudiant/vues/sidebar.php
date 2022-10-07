<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

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
    $id_niveau = $_SESSION['niveau_etd'];
    $code = "";
    //echo $critere->rowCount();


    /************************* Récupération du code du niveau de l'étudiant ***********************************/
    $all_niveau = code_niveau($id_niveau);
    while ($niv = $all_niveau->fetch())
    {
        if(1) {
        $code_niveau = $niv['code'];
            $code = $code_niveau;
         }
    }

    /************************** Affichage des ue du niveau retourné **************************/

    $all_ue = liste_ue_niveau($code);
    while ($ue = $all_ue->fetch())
    {
        if(1)
        {
            $code_ue = $ue['code_ue'];
            $nom_ue = $ue['nom_ue'];
            ?>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - info1 -->
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="affichage('section_etd-<?php echo $code_ue ?>')">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span><?php echo $code_ue ?></span></a>
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