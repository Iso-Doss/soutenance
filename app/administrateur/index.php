<?php


if (est_connecter()){

    require "app/administrateur/template-tableau-de-bord.php";

}else{

    require "app/administrateur/template.php";
    
}

