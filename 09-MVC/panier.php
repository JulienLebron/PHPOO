<?php

session_start();

if(isset($_GET['action']) && $_GET['action'] == 'create' || isset($_SESSION['panier']))
{
    $_SESSION['panier'] = array(26, 27, 28);
    echo "Produit présent dans le panier : " . implode('-', $_SESSION['panier']) . '<hr>';
    echo "<a href='?action=vider'>Vider le panier</a>";
}
else
{
    echo "<a href='?action=create'>Créer le panier</a>";
}

if(isset($_GET['action']) && $_GET['action'] == 'vider')
{
    unset($_SESSION['panier']);
}

// Le code ci-dessus est mal placé et c'est pour cela que je dois cliqué 2 fois sur vider le panier pour qu'il m'affiche bien crée le panier
// Le code au dessus est relu et repris
// Je devrais placer ce code juste après le session_star() pour régler le problème

/* 

    Architecture MVC 

    Model        :: requete SQL || Je fais une requete qui va chercher tout les produits en BDD
    View         :: rendu visuel (HTML) || Je présente les données qui sorte du traitement (controller)
    Controller   :: le controlleur pilote l'application || Il réceptionne les données de model (requete SELECT + FETCH) et en fonction de l'action de l'internaute, il va transmettre mes données sur un template / vue sur le navigateur.

*/ 

