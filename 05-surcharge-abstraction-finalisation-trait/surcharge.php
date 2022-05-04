<?php

class A 
{
    public function calcul()
    {
        return 1000;
    }
}

class B extends A
{

    public function calcul() // redéfinition de méthode
    {
        $nb = parent::calcul();
        // ici on stock le résultat de la méthode initiale par parent::ma_methode();
        // je n'utilise pas $this->calcul() sinon la méthode devient récursive et la méthode s'appelera en boucle
        // on ne peut pas faire appel à une méthode à l'intérieur d'elle même
        if($nb <= 100)
        {
            return "$nb est inférieur ou égal à 100<hr>";
        }
        else
        {
            return "$nb est supérieur à 100<hr>";
        }
    }

    public function autreCalcul()
    {
        $uneVariable = parent::calcul();
        return $uneVariable;
    }
}

$b = new B;
echo '<pre>'; print_r(get_class_methods($b)); echo '</pre>';
echo $b->autreCalcul() . '<hr>';

/*
    surcharge - override : une redéfinition + surcharge cela permet de prendre en compte le comportement de ma méthode d'origine afin d'y ajouter un traitement complémentaire C'est une amélioration de la méthode d'origine.    
*/