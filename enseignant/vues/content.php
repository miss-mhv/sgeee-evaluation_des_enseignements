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
                <!-- Questionnaire  -->
                <div class="section-dash1 actuel">
                    <?php include('dashbord.php');?>
                </div>

                <?php
                $all_cod_niv = liste_niveau_par_enseignant($_SESSION['id_ens']);
                while ($niveau = $all_cod_niv->fetch())
                {
                    if(1)
                    {
                        $niveau_id = $niveau['id_niveau'];
                        $info_niveau = lire_info_niveau($niveau_id);
                        $code_niveau =$info_niveau['code'];

                        $all_ue = liste_ue_par_enseignant_niveau($_SESSION['id_ens'], $niveau_id);
                        while ($ue = $all_ue->fetch())
                        {
                            $code_ue = $ue['code'];
                            $id_ue = $ue['id'];
                            $nom_ue = $ue['intitule'];
                            ?>
                            <div class="section_ens-<?php echo $code_niveau ?><?php echo $code_ue ?>">
                                <?php include('statistique_ue.php');?>
                            </div>
                            <?php
                        }
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