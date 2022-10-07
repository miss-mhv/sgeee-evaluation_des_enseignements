<!-- Formulaire d'ajout d'un nouveau compte étudiant -->

<form method="post" action="index.php" class="user form_add" id="form_add_user_etd">
    <div class="form-group row">
        <label class="col-sm-8 col-form-label" for="grade_ens">Grade</label>
        <select class="form-control col-sm-4" id="grade_ens" name="grade_ens" required>
            <option value="Pr">Pr</option>
            <option value="Dr">Dr</option>
            <option value="M">M</option>
        </select>
    </div>
    <div class="form-group row">
        <div class="col-sm-6">
            <input type="text" class="form-control-user form-control " id="matricule_ens" name="matricule_ens" placeholder="Matricule" required>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" id="type_user" name="type_user" placeholder="Type" value="enseignant" hidden>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="nom_ens" name="nom_ens" placeholder="Nom" required>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" id="prenom_ens" name="prenom_ens" placeholder="Prénom" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="login_ens" name="login_ens" placeholder="Login" required>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user" id="password_ens" name="password_ens" placeholder="Mot de passe" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="fonction_ens" name="fonction_ens" placeholder="Fonction" required>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="email" class="form-control form-control-user" id="email_ens" name="email_ens" placeholder="Adresse email" required>
        </div>
    </div>
    <!-- creation du compte -->
    <div class="form-group row">
        <div class="col-sm-3 mb-3 mb-sm-0">
        </div>
        <div class="col-sm-6">
            <button class="btn btn-dark btn-user btn-block"">
                Créer compte
            </button>
        </div>
        <div class="col-sm-3 mb-3 mb-sm-0">
        </div>
    </div>
    <hr>
</form>