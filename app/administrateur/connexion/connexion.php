<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Connectez-vous pour démarrer votre session</p>

        <form action="#" method="post">
            <div>
                <label for="email">
                    Email
                    <span class="text-danger">(*)</span>
                    :
                </label>
                <div class="input-group mb-3">
                    <input type="email" name="email" id="email" class="form-control email" placeholder="Veuillez entrer votre adresse mail." required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <label for="mot-de-passe">
                    Mot de passe
                    <span class="text-danger">(*)</span>
                    :
                </label>
                <div class="input-group mb-3">
                    <input type="password" name="mot-de-passe" id="mot-de-passe" class="form-control mot-de-passe" placeholder="Veuillez entrer votre mot de passe." required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
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