<?php

include_once 'app/commun/traitement-retour-formulaire.php';

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Gestion des salles</h1>
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



                <form action="?profile=administrateur&ressource=ajouter-salle-traitement" method="POST">

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter une salle</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="capacite">
                                    Capacité
                                    <span class="text-danger">(*)</span>
                                    :
                                </label>
                                <input type="number" class="form-control capacite" id="capacite" name="capacite" placeholder="Veuillez entrer la capacité de la salle">
                                <?php if (isset($erreurs["capacite"]) && !empty($erreurs["capacite"])) { ?>
                                    <p class="text-danger">
                                        <?= $erreurs["capacite"]; ?>
                                    </p>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label for="type-salle">
                                    Type de la salle

                                    <span class="text-danger">(*)</span>
                                    :
                                </label>
                                <input type="text" class="form-control type-salle" id="type-salle" name="type-salle" placeholder="Veuillez entrer le type de la salle">
                            </div>

                            <div class="form-group">
                                <label for="nom-proprietaire">
                                    Nom du propriétaire :
                                </label>
                                <input type="text" class="form-control nom-proprietaire" id="nom-proprietaire" name="nom-proprietaire" placeholder="Veuillez entrer le nom du propriétaire de la salle (Salle d'un particulier)">
                            </div>

                            <div class="form-group">
                                <label for="prenoms-proprietaire">
                                    Prénoms du propriétaire :
                                </label>
                                <input type="text" class="form-control prenoms-proprietaire" id="prenoms-proprietaire" name="prenoms-proprietaire" placeholder="Veuillez entrer le prénoms du propriétaire de la salle (Salle d'un particulier)">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="reset" class="btn btn-danger">Annuler</button>
                            <button type="submit" class="btn btn-success">Ajouter salle</button>
                        </div>
                    </div>

                </form>

            </div>


        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->