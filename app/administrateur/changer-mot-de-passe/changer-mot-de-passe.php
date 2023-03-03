<?php

include_once 'app/commun/traitement-retour-formulaire.php';

?>

<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Vous pouvez maintenant definir un nouveau mot de passe</p>

        <form action="?profile=administrateur&ressource=mot-de-passe-oublier-traitement" method="post" novalidate>

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