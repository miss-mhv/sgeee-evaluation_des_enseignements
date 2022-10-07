<!-- Begin Page-Administrateur Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Gestion des critères d'évaluation</h1>

    <!-- Aujouter un critère d'évaluation -->
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- contenu du formalaire de création d'un nouveau critère d'évaluation -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5" id="add_sess_eval">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Enregistrement d'un critère d'évaluation!</h1>
                        </div>

                        <form method="post" action="index.php" class="user form_add" id="form_add_critere_eval">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="input_critere" name="input_critere" placeholder="Libellé du critère" required>
                                </div>
                            </div>

                            <!-- creation du compte -->
                            <div class="form-group row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-dark btn-user btn-block">
                                        Ajouter
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

    <!-- DataTales liste des critères d'évaluation -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Liste des critères d'évaluation</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable-list_etd" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Libellé</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $all_crt = liste_critere();
                    $i = 0;
                    while($crt = $all_crt->fetch())
                    {
                        ++$i;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo utf8_encode( $crt['critere_name']); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->



