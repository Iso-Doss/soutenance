<?php

include_once 'app/commun/traitement-retour-formulaire.php';

?>

<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Connectez-vous pour démarrer votre session</p>

        <form action="?profile=administrateur&ressource=mot-de-passe-oublier-traitement" method="post" novalidate>

            <div>
                <label for="email">
                    Email
                    <span class="text-danger">(*)</span>
                    :
                </label>
                <div class="input-group mb-3">
                    <input type="email" name="email" id="email" class="form-control email" placeholder="Veuillez entrer votre adresse mail." required value="<?= (isset($donnees["email"]) && !empty($donnees["email"])) ? $donnees["email"] : ""; ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?php if (isset($erreurs["email"]) && !empty($erreurs["email"])) { ?>
                    <p class="text-danger">
                        <?= $erreurs["email"]; ?>
                    </p>
                <?php } ?>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Demander un nouveau mot de passe</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mb-1">
            <a href="?profile=administrateur&ressource=connexion">Connexion</a>
        </p>
        <p class="mb-0">
            <a href="?profile=administrateur&ressource=inscription" class="text-center">S'inscrire</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>