<?php

$salles = liste_salles();

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-5 offset-md-1">
                <h1 class="m-0">Gestion des salles</h1>
            </div><!-- /.col -->
            <div class="col-sm-5">
                <div class="float-sm-right">
                    <a href="?profile=administrateur&ressource=ajouter-salle" class="btn btn-primary">Ajouter</a>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Filtres</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="Lorem ipsum">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Liste des salles</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <?php if (!empty($salles)) { ?>

                            <table class="table table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Capacité</th>
                                        <th>Type</th>
                                        <th>Nom propriétaire</th>
                                        <th>Prénoms propriétaire</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($salles as $salle) { ?>

                                        <tr>
                                            <td>
                                                <?= (isset($salle["num-salle"]) && !empty($salle["num-salle"])) ? $salle["num-salle"] : "-"; ?>
                                            </td>
                                            <td>
                                                <?= (isset($salle["capacite"]) && !empty($salle["capacite"])) ? $salle["capacite"] : "-"; ?>
                                                Places
                                            </td>
                                            <td>
                                                <?= (isset($salle["type-salle"]) && !empty($salle["type-salle"])) ? $salle["type-salle"] : "-"; ?>
                                            </td>
                                            <td>
                                                <?= (isset($salle["nom-proprietaire"]) && !empty($salle["nom-proprietaire"])) ? $salle["nom-proprietaire"] : "-"; ?>
                                            </td>
                                            <td>
                                                <?= (isset($salle["prenoms-proprietaire"]) && !empty($salle["prenoms-proprietaire"])) ? $salle["prenoms-proprietaire"] : "-"; ?>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-default">Détails</a>
                                                <a href="?profile=administrateur&ressource=modifier-salle&id=<?= (isset($salle["num-salle"]) && !empty($salle["num-salle"])) ? $salle["num-salle"] : "-"; ?>" class="btn btn-warning">Modifier</a>
                                                <a href="?profile=administrateur&ressource=supprimer-salle&id=<?= (isset($salle["num-salle"]) && !empty($salle["num-salle"])) ? $salle["num-salle"] : "-"; ?>" class="btn btn-danger">Supprimer</a>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div>

                        <?php } else {
                            echo "Aucune salle n'est disponible pour le moment";
                        } ?>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>


        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->