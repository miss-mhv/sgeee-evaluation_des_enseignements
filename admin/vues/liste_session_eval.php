<!-- Begin Page-Administrateur Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Gestion des sessions d'évalutation</h1>

    <!-- DataTales Adminitrateurs -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Liste des sessions d'évaluation</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable-list_sess_eval" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Mois</th>
                        <th>Année</th>
                        <th>Etat</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $all_sess_eval = liste_session_eval();
                    $mois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
                    $cur_mois = $_SESSION['sess_eval'];
                    while($sess_eval = $all_sess_eval->fetch())
                    {
                        $lire_mois = $sess_eval['mois']-1;
                        ?>
                        <?php
                        if($sess_eval['etat'] == 0)
                        { ?>
                            <tr onclick="affichage('section-admin_info')">
                                <td><?php echo $mois[$lire_mois];?></td>
                                <td><?php echo $sess_eval['annee'];?></td>
                                <td> Inactif </td>
                                <td>
                                <?php
                                if(($lire_mois >= $cur_mois) && ($sess_eval['annee'] >= $_SESSION['sess_eval_annee']))
                                {
                                    echo "mod";
                                }
                                ?>
                                </td>
                            </tr>
                            <?php
                        }
                        elseif($sess_eval['etat'] == 1)
                        {
                            ?>
                            <tr class="bg-success text-white" onclick="affichage('section-admin_info')">
                                <td><?php echo $mois[$lire_mois];?></td>
                                <td><?php echo $sess_eval['annee'];?></td>
                                <td> Actif </td>
                                <td> Mod</td>
                            </tr>
                            <?php
                        }
                        ?>
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



