<!-- Formulaire d'ajout d'un nouveau compte étudiant -->
<!-- Begin Page-Ajouter_admin Content  -->
<style>
    form.user .form-control-user {
        border-radius: inherit;
    }
</style>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Ajouter une sessions d'évaluation </h1>

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- contenu du formalaire de création d'une nouvelle session d'évaluation -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5" id="add_sess_eval">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Enregistrement d'une nouvelle session d'évaluation!</h1>
                        </div>

                        <form method="post" action="index.php" class="user form_add" id="form_add_sess_eval">
                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label" for="mois_sess_eval">Mois</label>
                                <select class="form-control col-sm-4" id="mois_sess_eval" name="mois_sess_eval" required>
                                    <option value="1">Janvier</option>
                                    <option value="2">Février</option>
                                    <option value="3">Mars</option>
                                    <option value="4">Avril</option>
                                    <option value="5">Mai</option>
                                    <option value="6">Juin</option>
                                    <option value="7">Juillet</option>
                                    <option value="8">Août</option>
                                    <option value="9">Septembre</option>
                                    <option value="10">Octobre</option>
                                    <option value="11">Novembre</option>
                                    <option value="12">Décembre</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="annee_sess_eval" name="annee_sess_eval" value="<?php echo date('Y'); ?>" hidden>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label" for="annee_sess_eval">Année en cours</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="" name="" value="<?php echo date('Y'); ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label" for="etat_sess_eval">Etat de la session</label>
                                <div class="col-sm-6 btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-success active ">
                                        <input type="radio" name="etat_sess_eval" id="etat_sess_eval1" value="1" autocomplete="off" checked> Activé
                                    </label>
                                    <label class="btn btn-success">
                                        <input type="radio" name="etat_sess_eval" id="etat_sess_eval2" value="0" autocomplete="off"> Inactivé
                                    </label>
                                </div>
                            </div>

                            <!-- creation du compte -->
                            <div class="form-group row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-dark btn-user btn-block">
                                        Créer session
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
</div>
