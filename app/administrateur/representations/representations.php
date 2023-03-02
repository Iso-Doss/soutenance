<?php

$page = 0;

if (isset($_GET["page"]) && !empty($_GET["page"]) && is_numeric($_GET["page"])) {
    $page = $_GET["page"];
}

$representations = [];

if (isset($_POST) && !empty($_POST)) {
    $donnees = $_POST;
    foreach ($donnees as $cle => $donnee) {
        if (empty($donnee)) {
            unset($donnees[$cle]);
        }
    }
    //$representations = rechercher_representations($donnees);
} else {
    $representations = liste_representations($page);
}

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-5 offset-md-1">
                <h1 class="m-0">Gestion des représentations</h1>
            </div><!-- /.col -->
            <div class="col-sm-5">
                <div class="float-sm-right">
                    <a href="?profile=administrateur&ressource=ajouter-representation" class="btn btn-primary">Ajouter</a>
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

                    <form action="?profile=administrateur&ressource=representations" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="capacite">
                                    Capacité :
                                </label>
                                <input type="number" class="form-control capacite" id="capacite" name="capacite" placeholder="Filtrer par la capacité de la representation" value="<?= (isset($donnees["capacite"]) && !empty($donnees["capacite"])) ? $donnees["capacite"] : ""; ?>">
                                <?php if (isset($erreurs["capacite"]) && !empty($erreurs["capacite"])) { ?>
                                    <p class="text-danger">
                                        <?= $erreurs["capacite"]; ?>
                                    </p>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label for="type-representation">
                                    Type de la representation :
                                </label>
                                <input type="text" class="form-control type-representation" id="type-representation" name="type_representation" placeholder="Filtrer par la capacité le type de la representation" value="<?= (isset($donnees["type_representation"]) && !empty($donnees["type_representation"])) ? $donnees["type_representation"] : ""; ?>">
                                <?php if (isset($erreurs["type_representation"]) && !empty($erreurs["type_representation"])) { ?>
                                    <p class="text-danger">
                                        <?= $erreurs["type_representation"]; ?>
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
                        <h3 class="card-title">Liste des représentations</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <?php if (!empty($representations)) { ?>

                            <table class="table table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nom</th>
                                        <th>Date</th>
                                        <th>Heure de début</th>
                                        <th>Heure de fin</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($representations as $representation) {

                                    ?>

                                        <tr>
                                            <td>
                                                <?= (isset($representation["num-representation"]) && !empty($representation["num-representation"])) ? $representation["num-representation"] : "-"; ?>
                                            </td>

                                            <td>
                                                <?= (isset($representation["nom-representation"]) && !empty($representation["nom-representation"])) ? $representation["nom-representation"] : "-"; ?>
                                            </td>
                                            <td>
                                                <?= (isset($representation["date-representation"]) && !empty($representation["date-representation"])) ? $representation["date-representation"] : "-"; ?>
                                            </td>
                                            <td>
                                                <?= (isset($representation["heure-debut-representation"]) && !empty($representation["heure-debut-representation"])) ? $representation["heure-debut-representation"] : "-"; ?>
                                            </td>
                                            <td>
                                                <?= (isset($representation["heure-fin-representation"]) && !empty($representation["heure-fin-representation"])) ? $representation["heure-fin-representation"] : "-"; ?>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-default" data-toggle="modal" data-target="#details-representation-<?= (isset($representation["num-representation"]) && !empty($representation["num-representation"])) ? $representation["num-representation"] : "-"; ?>">Détails</a>
                                                <a href="?profile=administrateur&ressource=modifier-representation&id=<?= (isset($representation["num-representation"]) && !empty($representation["num-representation"])) ? $representation["num-representation"] : "-"; ?>" class="btn btn-warning">Modifier</a>
                                                <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#supprimer-representation-<?= (isset($representation["num-representation"]) && !empty($representation["num-representation"])) ? $representation["num-representation"] : "-"; ?>">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="details-representation-<?= (isset($representation["num-representation"]) && !empty($representation["num-representation"])) ? $representation["num-representation"] : "-"; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">
                                                            Détails de la representation numéro
                                                            <?= (isset($representation["num-representation"]) && !empty($representation["num-representation"])) ? $representation["num-representation"] : "-"; ?>
                                                            (<?= (isset($representation["nom-representation"]) && !empty($representation["nom-representation"])) ? $representation["nom-representation"] : "-"; ?>)
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            <b>Nom de la représentation : </b>
                                                            <?= (isset($representation["nom-representation"]) && !empty($representation["nom-representation"])) ? $representation["nom-representation"] : "-"; ?>
                                                        </p>
                                                        <p>
                                                            <b>Date de la représentation : </b>
                                                            <?= (isset($representation["date-representation"]) && !empty($representation["date-representation"])) ? $representation["date-representation"] : "-"; ?>
                                                        </p>
                                                        <p>
                                                            <b>Heure de début de la representation : </b>
                                                            <?= (isset($representation["heure-debut-representation"]) && !empty($representation["heure-debut-representation"])) ? $representation["heure-debut-representation"] : "-"; ?>
                                                        </p>
                                                        <p>
                                                            <b>Heure de fin de la représentation : </b>
                                                            <?= (isset($representation["heure-fin-representation"]) && !empty($representation["heure-fin-representation"])) ? $representation["heure-fin-representation"] : "-"; ?>
                                                        </p>
                                                        <p>
                                                            <b>Nom du spectacle de la représentation : </b>
                                                            <?= (isset($representation["nom-spectacle"]) && !empty($representation["nom-spectacle"])) ? $representation["nom-spectacle"] : "-"; ?>
                                                        </p>
                                                        <p>
                                                            <b>Type salle de la représentation : </b>
                                                            <?= (isset($representation["type-salle"]) && !empty($representation["type-salle"])) ? $representation["type-salle"] : "-"; ?>
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

                                        <div class="modal fade" id="supprimer-representation-<?= (isset($representation["num-representation"]) && !empty($representation["num-representation"])) ? $representation["num-representation"] : "-"; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">
                                                            Supprimer la representation numéro
                                                            <?= (isset($representation["num-representation"]) && !empty($representation["num-representation"])) ? $representation["num-representation"] : "-"; ?>
                                                            (<?= (isset($representation["type-representation"]) && !empty($representation["type-representation"])) ? $representation["type-representation"] : "-"; ?>)
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            Etes vous sur de vouloir supprimer cette representation ?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <a href="?profile=administrateur&ressource=supprimer-representation&id=<?= (isset($representation["num-representation"]) && !empty($representation["num-representation"])) ? $representation["num-representation"] : "-"; ?>" class="btn btn-danger">
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
                                            <a class="page-link" href="?profile=administrateur&ressource=representations&page=<?= $page - 1; ?>">«</a>
                                        </li>
                                    <?php } ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?profile=administrateur&ressource=representations&page=<?= $page; ?>">
                                            <?= (isset($page) && (!empty($page) || 0 == $page)) ? $page + 1 : 1 ?>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="?profile=administrateur&ressource=representations&page=<?= $page + 1; ?>">»</a>
                                    </li>
                                </ul>
                            </div>

                        <?php } else {
                            echo "Aucune representation n'est disponible pour le moment";
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