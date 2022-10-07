<?php ?>
<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block" style="padding: 100px 100px 0 100px;">
              <img src="../img/logo_uy1.png" height="50%" />
            </div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Bienvenue!</h1>
                </div>
                <form method="post" action="" class="user">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="login_etd" name="login_etd" placeholder="login...">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="mdp_etd" name="mdp_etd" placeholder="Mot de passe">
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" class="custom-control-input" id="se_souvenir">
                      <label class="custom-control-label" for="se_souvenir">Se souvenir de moi</label>
                    </div>
                  </div>
                  <button class="btn btn-dark btn-user btn-block">
                    Connexion
                  </button>
                  <hr>
                  <?php
                  if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==2)
                      echo "<p style='color:red'>Login ou mot de passe incorrect!</p>";
                    elseif ($err==1)
                      echo "<p style='color:red'>Veuillez remplir tous les champs!</p>";
                  }
                  ?>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="forgot-password.html">Mot de passe oublié?</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>
