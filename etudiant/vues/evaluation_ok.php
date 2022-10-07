<?php
if(isset($_SESSION['id_etd']))
{
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

                    <!-- Evaluation ok  -->
                    <div class="section-dash actuel">
                        <div class="alert alert-primary alert-link" role="alert" id="etat_ajout_compte">
                            Evaluation enregistrée avec succès!
                        </div>
                    </div>

                    <!-- accueil admin  -->
                    <div class="section-dash1">
                        <?php include('dashbord.php');?>
                    </div>

                    <!-- Questionnaire  -->
                    <?php
                    $id_niveau = $_SESSION['niveau_etd'];
                    $code = "";

                    /************************* Récupération du code du niveau de l'étudiant ***********************************/
                    $all_niveau = code_niveau($id_niveau);
                    while ($niv = $all_niveau->fetch())
                    {
                        if(1) {
                            $code_niveau = $niv['code'];
                            $code = $code_niveau;
                        }
                    }

                    /************************* formulaire des ue du niveau retourne ***********************************/
                    $all_ue = liste_ue_niveau($code);
                    while ($ue = $all_ue->fetch())
                    {
                        if(1)
                        {
                            $code_ue = $ue['code_ue'];
                            $nom_ue = $ue['nom_ue'];
                            $id_ue = $ue['id_ue'];
                            ?>
                            <div class="section_etd-<?php echo $code_ue ?>">
                                <?php include('form_evaluation.php');?>
                            </div>
                            <?php
                        }
                    }

                    ?>
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
    <?php
}
else
{
    header('Location: ../index.php');
}
?>