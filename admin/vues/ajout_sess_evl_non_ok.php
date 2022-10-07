<?php
/**
 * Created by PhpStorm.
 * User: Miss Mhv
 * Date: 03/02/2020
 * Time: 22:07
 */
?>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include('sidebar.php');?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php include('topbar.php');?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->

            <div id="all-content" >
                <div class="section-dash actuel">
                    <div class="alert alert-danger alert-link" role="alert" id="etat_ajout_compte">
                        Echec de l'enregistrement. Vérifiez que le mois et l'année ne sont pas déjà enregistrés.
                    </div>
                    <?php include('form_ajouter_session_eval.php');?>
                </div>

                <!-- gestion des formulaires de création de comptes  -->

                <div class="section_admin-list_user">
                    <?php include('liste_user.php');?>
                </div>

                <div class="section_admin-add_user">
                    <?php include('form_ajouter_user.php');?>
                </div>

                <!-- gestion des sessions d'évaluation  -->

                <div class="section_admin-list_sess_eval">
                    <?php include('liste_session_eval.php');?>
                </div>
                <div class="section_admin-add_sess_eval">
                    <?php include('form_ajouter_session_eval.php');?>
                </div>

                <!-- gestion des questionnaires  -->
                <div class="section_admin-gest_critere">
                    <?php include('gestion_critere.php');?>
                </div>
                <div class="section_admin-gest_question">
                    <?php include('gestion_question.php');?>
                </div>
            </div>

            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Université de Yde1 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Modal pour la Déconnexion de l'acministrateur en cours-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Voulez-vous vraiment quitter cette section?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Sélectionner "Déconnexion" ce-dessous si vous êtes prêt pour faire la session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                <form action="deconnexion.php" method="post">
                    <button class="btn btn-primary red">Déconnexion</button>
                </form>

            </div>
        </div>
    </div>
</div>