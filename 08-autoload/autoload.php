<?php

abstract class Autoload
{

    public static function inclusionAutomatique($nomDeLaClasse)
    {
        require_once($nomDeLaClasse . '.class.php'); 
        echo "On passe dans la function inclusionAutomatique ! <br>";
        echo "require_once($nomDeLaClasse.class.php);<br>";
    }
    
}
spl_autoload_register(array('Autoload', 'inclusionAutomatique'));


$a = new A;
$d = new D;

/*
    spl_autoload_register : permet d'exécuter une fonction lorsque l'interpréteur voit passer le mot clé "new" dans le code. 
    Le nom a coté du mot clé "new" est récupérer et transmis automatiquement à la fonction inclusionAutomatique()
    Il est indispensable de respecter une convention de nommage sur ses fichiers pour que l'autoload fonctionne.

    L'autoload permet d'automatiser l'inclusion des fichiers contenant les classes.
    Plus besoin de faire 50 require pour importer 50 classes, c'est l'autoload qui se charge de le faire à notre place.
*/