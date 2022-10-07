<!-- Begin Page-Administrateur Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Gestion des utilisateurs</h1>

    <!-- DataTales liste des enseignants -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Liste des enseignants</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable-list_ens" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Grade</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $all_ens = liste_enseignant();
                    while($ens = $all_ens->fetch())
                    {
                        ?>
                        <tr onclick="">
                            <td><?php echo $ens['grade'];?></td>
                            <td><?php echo $ens['nom'];?></td>
                            <td><?php echo $ens['prenom'];?></td>
                            <td><?php echo $ens['email'];?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- DataTales liste des étudiants -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Liste des étudiants</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable-list_etd" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Matricule</th>
                        <th>Niveau</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $all_etd = liste_etudiant();
                    while($etd = $all_etd->fetch())
                    {
                        ?>
                        <tr onclick="">
                            <td><?php echo $etd['nom'] ?></td>
                            <td><?php echo $etd['prenom'] ?></td>
                            <td><?php echo $etd['matricule'] ?></td>
                            <td><?php
                                $all_niveau = code_niveau($etd['id_niveau']);
                                while ($niv = $all_niveau->fetch())
                                {
                                    if(1) {
                                        echo $niv['code'];
                                    }
                                }
                                ?></td>
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



