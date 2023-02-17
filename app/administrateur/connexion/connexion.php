<?php

include_once 'app/commun/traitement-retour-formulaire.php';

?>

<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Connectez-vous pour démarrer votre session</p>

        <form action="?profile=administrateur&ressource=connexion-traitement" method="post" novalidate>



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

            <div>
                <label for="mot-de-passe">
                    Mot de passe
                    <span class="text-danger">(*)</span>
                    :
                </label>

                <div class="input-group mb-3">
                    <input type="password" name="mot-de-passe" id="mot-de-passe" class="form-control mot-de-passe" placeholder="Veuillez entrer votre mot de passe." required value="<?= (isset($donnees["mot-de-passe"]) && !empty($donnees["mot-de-passe"])) ? $donnees["mot-de-passe"] : ""; ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?php if (isset($erreurs["mot-de-passe"]) && !empty($erreurs["mot-de-passe"])) { ?>
                    <p class="text-danger">
                        <?= $erreurs["mot-de-passe"]; ?>
                    </p>
                <?php } ?>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            Se souvenir
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mb-1">
            <a href="?profile=administrateur&ressource=mot-de-passe-oublier">Mot de passe oublier</a>
        </p>
        <p class="mb-0">
            <a href="?profile=administrateur&ressource=inscription" class="text-center">S'inscrire</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>