<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Vous avez oublié votre mot de passe ? Ici, vous pouvez facilement récupérer un nouveau mot de passe.</p>

        <form action="recover-password.html" method="post">
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Demander un nouveau mot de passe</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        
        <p class="mb-1">
            <a href="?profile=administrateur&ressource=connexion">Se connecter</a>
        </p>
        <p class="mb-0">
            <a href="?profile=administrateur&ressource=inscription" class="text-center">S'inscrire</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>