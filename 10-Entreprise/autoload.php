<?php 

class Autoload 
{
    public static function inclusionAuto($className)
    {
        //  "C:\xampp\htdocs\phpoo\10-Entreprise\    
        require_once __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
        //                               controller\Controller             .php"
    } 
}

spl_autoload_register(array('Autoload', 'inclusionAuto'));
/*
    spl_autoload_register() : fonction prédéfinie qui s'exécute lorsque l'interpréteur voit passer le mot clé "new"
    Lorsque l'on instancie une classe, la méthode inclusionAuto' de la class 'Autoload' s'exécute automatiquement et tout ce qu'il ya après le mot clé "new" (namespace\class) est envoyé directement en argument de la méthode 'inclusionAuto'. 
    On se sert du namsepace 'controller' pour entrer dans le dossier 'controller' du dossier Entreprise et du nom de la class 'Controller' pour inclure le fichier Controller.php
*/

// TEST

// $c = new controller\Controller;

// echo __DIR__;