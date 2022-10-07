<!-- Begin Page-Ajouter_admin Content  -->
<style>
    form.user .form-control-user {
        border-radius: inherit;
    }
</style>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Ajouter </h1>
    <p class="mb-4">Cette session, est reservée à la création d'un nouveau compte utilisateur. </p>

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- contenu du formalaire de création d'un compte admin -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5" id="add_user">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Créer un compte!</h1>
                        </div>
                        <!-- Choix du type d'user à enregistrer "Etudiant" ou "Enseignant" -->
                        <form action="" method="post" id="form_add_user">
                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label" for="select_type_user">Choisir le type de compte</label>
                                <select class="form-control col-sm-4" id="select_type_user" name="select_type_user" required>
                                    <option value="" onclick="">--/--</option>
                                    <option value="etudiant" onclick="afficher_user('section_admin-form_ajout_etudiant')">Etudiant</option>
                                    <option value="enseignant" onclick="afficher_user('section_admin-ajout_enseignant')">Enseignant</option>
                                </select>
                            </div>
                        </form>
                        <div class="section_admin-form_ajout_etudiant">
                            <?php include('form_ajouter_etudiant.php');?>
                        </div>
                        <div class="section_admin-ajout_enseignant">
                            <?php include('form_ajouter_enseignant.php');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>