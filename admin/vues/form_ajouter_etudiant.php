<!-- Formulaire d'ajout d'un nouveau compte étudiant -->

<form method="post" action="index.php" class="user form_add" id="form_add_user_etd">
    <div class="form-group row">
        <label class="col-sm-8 col-form-label" for="niveau_etd">Niveau</label>
        <select class="form-control col-sm-4" id="niveau_etd" name="niveau_etd" required>
            <option value="1">INF1</option>
            <option value="2">INF2</option>
            <option value="3">INF3</option>
            <option value="4">INF4</option>
            <option value="5">INF5</option>
        </select>
    </div>
    <div class="form-group row">
        <div class="col-sm-6">
            <input type="text" class="form-control-user form-control " id="matricule_etd" name="matricule_etd" placeholder="Matricule" required>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" id="type_user" name="type_user" placeholder="Type" value="etudiant" hidden>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="nom_etd" name="nom_etd" placeholder="Nom" required>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" id="prenom_etd" name="prenom_etd" placeholder="Prénom" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="login_etd" name="login_etd" placeholder="Login" required>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user" id="password_etd" name="password_etd" placeholder="Mot de passe" required>
        </div>
    </div>
    <!-- creation du compte -->
    <div class="form-group row">
        <div class="col-sm-3 mb-3 mb-sm-0">
        </div>
        <div class="col-sm-6">
            <button class="btn btn-dark btn-user btn-block">
                Créer compte
            </button>
        </div>
        <div class="col-sm-3 mb-3 mb-sm-0">
        </div>
    </div>
    <hr>
</form>