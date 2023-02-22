<?php

$page = 0;

if (isset($_GET["page"]) && !empty($_GET["page"]) && is_numeric($_GET["page"])) {
    $page = $_GET["page"];
}

$salles = [];

if (isset($_POST) && !empty($_POST)) {
    $donnees = $_POST;
    foreach ($donnees as $cle => $donnee) {
        if (empty($donnee)) {
            unset($donnees[$cle]);
        }
    }
    $salles = rechercher_salles($donnees);
} else {
    $salles = liste_salles($page);
}

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
                    </div>

                    <form action="?profile=administrateur&ressource=salles" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="capacite">
                                    Capacité :
                                </label>
                                <input type="number" class="form-control capacite" id="capacite" name="capacite" placeholder="Filtrer par la capacité de la salle" value="<?= (isset($donnees["capacite"]) && !empty($donnees["capacite"])) ? $donnees["capacite"] : ""; ?>">
                                <?php if (isset($erreurs["capacite"]) && !empty($erreurs["capacite"])) { ?>
                                    <p class="text-danger">
                                        <?= $erreurs["capacite"]; ?>
                                    </p>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label for="type-salle">
                                    Type de la salle :
                                </label>
                                <input type="text" class="form-control type-salle" id="type-salle" name="type_salle" placeholder="Filtrer par la capacité le type de la salle" value="<?= (isset($donnees["type_salle"]) && !empty($donnees["type_salle"])) ? $donnees["type_salle"] : ""; ?>">
                                <?php if (isset($erreurs["type_salle"]) && !empty($erreurs["type_salle"])) { ?>
                                    <p class="text-danger">
                                        <?= $erreurs["type_salle"]; ?>
                                    </p>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Rechercher</button>
                        </div>
                    </form>
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
                                                <a href="#" class="btn btn-default" data-toggle="modal" data-target="#details-salle-<?= (isset($salle["num-salle"]) && !empty($salle["num-salle"])) ? $salle["num-salle"] : "-"; ?>">Détails</a>
                                                <a href="?profile=administrateur&ressource=modifier-salle&id=<?= (isset($salle["num-salle"]) && !empty($salle["num-salle"])) ? $salle["num-salle"] : "-"; ?>" class="btn btn-warning">Modifier</a>
                                                <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#supprimer-salle-<?= (isset($salle["num-salle"]) && !empty($salle["num-salle"])) ? $salle["num-salle"] : "-"; ?>">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="details-salle-<?= (isset($salle["num-salle"]) && !empty($salle["num-salle"])) ? $salle["num-salle"] : "-"; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">
                                                            Détails de la salle numéro
                                                            <?= (isset($salle["num-salle"]) && !empty($salle["num-salle"])) ? $salle["num-salle"] : "-"; ?>
                                                            (<?= (isset($salle["type-salle"]) && !empty($salle["type-salle"])) ? $salle["type-salle"] : "-"; ?>)
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            <b>Numéro salle : </b>
                                                            <?= (isset($salle["num-salle"]) && !empty($salle["num-salle"])) ? $salle["num-salle"] : "-"; ?>
                                                        </p>
                                                        <p>
                                                            <b>Capacité salle : </b>
                                                            <?= (isset($salle["capacite"]) && !empty($salle["capacite"])) ? $salle["capacite"] : "-"; ?>
                                                            Places
                                                        </p>
                                                        <p>
                                                            <b>Numéro salle : </b>
                                                            <?= (isset($salle["num-salle"]) && !empty($salle["num-salle"])) ? $salle["num-salle"] : "-"; ?>
                                                        </p>
                                                        <p>
                                                            <b>Nom propriétaire salle : </b>
                                                            <?= (isset($salle["nom-proprietaire"]) && !empty($salle["nom-proprietaire"])) ? $salle["nom-proprietaire"] : "-"; ?>
                                                        </p>
                                                        <p>
                                                            <b>Prénoms propriétaire salle : </b>
                                                            <?= (isset($salle["prenoms-proprietaire"]) && !empty($salle["prenoms-proprietaire"])) ? $salle["prenoms-proprietaire"] : "-"; ?>
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                        <div class="modal fade" id="supprimer-salle-<?= (isset($salle["num-salle"]) && !empty($salle["num-salle"])) ? $salle["num-salle"] : "-"; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">
                                                            Supprimer la salle numéro
                                                            <?= (isset($salle["num-salle"]) && !empty($salle["num-salle"])) ? $salle["num-salle"] : "-"; ?>
                                                            (<?= (isset($salle["type-salle"]) && !empty($salle["type-salle"])) ? $salle["type-salle"] : "-"; ?>)
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            Etes vous sur de vouloir supprimer cette salle ?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <a href="?profile=administrateur&ressource=supprimer-salle&id=<?= (isset($salle["num-salle"]) && !empty($salle["num-salle"])) ? $salle["num-salle"] : "-"; ?>" class="btn btn-danger">
                                                            Oui
                                                        </a>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <?php if (isset($page) && 0 != $page) { ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?profile=administrateur&ressource=salles&page=<?= $page - 1; ?>">«</a>
                                        </li>
                                    <?php } ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?profile=administrateur&ressource=salles&page=<?= $page; ?>">
                                            <?= (isset($page) && (!empty($page) || 0 == $page)) ? $page + 1 : 1 ?>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="?profile=administrateur&ressource=salles&page=<?= $page + 1; ?>">»</a>
                                    </li>
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