<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#" onclick="affichage('section-dash')">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SGEEE </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Gestion des users -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAduser" aria-expanded="true" aria-controls="collapseAduser">
            <i class="fas fa-fw fa-cog"></i>
            <span>Utilisateur</span>
        </a>
        <div id="collapseAduser" class="collapse" aria-labelledby="headingcollapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item" href="#" onclick="affichage('section_admin-list_user')">Utilisateurs</a>
                    <a class="collapse-item" href="#" onclick="affichage('section_admin-add_user')">Ajouter</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Gestions des sessions d'évaluation -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdsess_eval" aria-expanded="true" aria-controls="collapseAdsess_eval">
            <i class="fas fa-fw fa-cog"></i>
            <span>Sessions d'évaluation</span>
        </a>
        <div id="collapseAdsess_eval" class="collapse" aria-labelledby="headingcollapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item" href="#" onclick="affichage('section_admin-list_sess_eval')">Sessions</a>
                    <a class="collapse-item" href="#" onclick="affichage('section_admin-add_sess_eval')">Ajouter</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Gestions des questionnaires -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdquest_eval" aria-expanded="true" aria-controls="collapseAdquest_eval">
            <i class="fas fa-fw fa-cog"></i>
            <span>Questionnaire</span>
        </a>
        <div id="collapseAdquest_eval" class="collapse" aria-labelledby="headingcollapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Options:</h6>
                <a class="collapse-item" href="#" onclick="affichage('section_admin-gest_critere')">Critères</a>
                <a class="collapse-item" href="#" onclick="affichage('section_admin-gest_question')">Questions</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Afficher / cacher la sidebar -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>