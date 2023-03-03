<?php 

if (isset($_SESSION["administrateur_connecter"]) && !empty($_SESSION["administrateur_connecter"])) {
    $_SESSION["administrateur_connecter"] = [];
}

?>

<p>
    Vous etes déconnecter. 
    Cliquer ici pour retourner sur la page de <a href="?profile=administrateur&ressource=connexion">connexion</a>
</p>