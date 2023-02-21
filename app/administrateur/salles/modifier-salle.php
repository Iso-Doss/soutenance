<?php

//include_once 'app/commun/traitement-retour-formulaire.php';

$donnees = $_POST;

$erreurs = [];

$erreur = "";

$message = "";

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
                    <a href="?profile=administrateur&ressource=salles" class="btn btn-primary">Retour sur la liste des salle</a>
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

                <?php

                $salle = salle($_GET["id"]);

                if (!isset($_GET["id"]) || empty($_GET["id"]) || "-" == $_GET["id"] || empty($salle)) { ?>

                    <div class="alert alert-danger" role="alert">
                        <p>
                            La salle que vous essayez de modifier n'existe pas ou n'est pas disponible pour le moment.
                        </p>
                    </div>

                    <?php } else {

                    $donnees = $salle;

                    //var_dump($donnees);

                    $donnees["type_salle"] = $salle["type-salle"];
                    $donnees["nom_proprietaire"] = $salle["nom-proprietaire"];
                    $donnees["prenoms_proprietaire"] = $salle["prenoms-proprietaire"];

                    if (isset($_POST) && !empty($_POST)) {

                        $donnees = $_POST;

                        if (!isset($_POST["capacite"]) || empty($_POST["capacite"])) {

                            $erreurs["capacite"] = "Le champ capacité est obligatoire. Veuillez le renseigner.";
                        }

                        if (!isset($_POST["type_salle"]) || empty($_POST["type_salle"])) {

                            $erreurs["type_salle"] = "Le champ type salle est obligatoire. Veuillez le renseigner.";
                        }

                        if (empty($erreurs)) {

                            $donnees["num_salle"] = $_GET["id"];

                            $modifier_salle = modifier_salle($donnees);

                            if ($modifier_salle) {
                                $message = "La salle a été modifiée avec succèss.";
                            } else {
                                $erreur = "Oups!!! Une erreur s'est produite lors de l'ajout de la salle. Veuillez réessayer.";
                            }
                        } else {

                            $erreur = "Oups!!! Une ou plusieurs champs sont mal remplir. Veuillez les corriger.";
                        }
                    }

                    if (isset($message) && !empty($message)) { ?>
                        <div class="alert alert-success" role="alert">
                            <p>
                                <?= $message; ?>
                            </p>
                        </div>
                    <?php } ?>

                    <?php if (isset($erreur) && !empty($erreur)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <p>
                                <?= $erreur; ?>
                            </p>
                        </div>
                    <?php } ?>

                    <form action="?profile=administrateur&ressource=modifier-salle&id=<?= $_GET["id"] ;?>" method="POST">

                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Modifier une salle</h3>
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
                                    <input type="number" class="form-control capacite" id="capacite" name="capacite" placeholder="Veuillez entrer la capacité de la salle" value="<?= (isset($donnees["capacite"]) && !empty($donnees["capacite"])) ? $donnees["capacite"] : ""; ?>">
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
                                    <input type="text" class="form-control type-salle" id="type-salle" name="type_salle" placeholder="Veuillez entrer le type de la salle" value="<?= (isset($donnees["type_salle"]) && !empty($donnees["type_salle"])) ? $donnees["type_salle"] : ""; ?>">
                                    <?php if (isset($erreurs["type_salle"]) && !empty($erreurs["type_salle"])) { ?>
                                        <p class="text-danger">
                                            <?= $erreurs["type_salle"]; ?>
                                        </p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="nom-proprietaire">
                                        Nom du propriétaire :
                                    </label>
                                    <input type="text" class="form-control nom-proprietaire" id="nom-proprietaire" name="nom_proprietaire" placeholder="Veuillez entrer le nom du propriétaire de la salle (Salle d'un particulier)" value="<?= (isset($donnees["nom_proprietaire"]) && !empty($donnees["nom_proprietaire"])) ? $donnees["nom_proprietaire"] : ""; ?>">
                                    <?php if (isset($erreurs["nom_proprietaire"]) && !empty($erreurs["nom_proprietaire"])) { ?>
                                        <p class="text-danger">
                                            <?= $erreurs["nom_proprietaire"]; ?>
                                        </p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="prenoms-proprietaire">
                                        Prénoms du propriétaire :
                                    </label>
                                    <input type="text" class="form-control prenoms-proprietaire" id="prenoms-proprietaire" name="prenoms_proprietaire" placeholder="Veuillez entrer le prénoms du propriétaire de la salle (Salle d'un particulier)" value="<?= (isset($donnees["prenoms_proprietaire"]) && !empty($donnees["prenoms_proprietaire"])) ? $donnees["prenoms_proprietaire"] : ""; ?>">
                                    <?php if (isset($erreurs["prenoms_proprietaire"]) && !empty($erreurs["prenoms_proprietaire"])) { ?>
                                        <p class="text-danger">
                                            <?= $erreurs["prenoms_proprietaire"]; ?>
                                        </p>
                                    <?php } ?>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="reset" class="btn btn-danger">Annuler</button>
                                <button type="submit" class="btn btn-success">Modifier salle</button>
                            </div>
                        </div>

                    </form>

                <?php } ?>

            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->