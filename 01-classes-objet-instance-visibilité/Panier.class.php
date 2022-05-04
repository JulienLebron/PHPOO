<?php

class Panier
{
    public $nbProduit;
    protected $prenom;
    private $mdp;

    public function ajouterArticle()
    {
        return 'L\'article à bien été ajouté<hr>';
    }

    protected function retirerArticle()
    {
        return "L'article à bien été retirer<hr>";
    }

    private function affichageArticle()
    {
        return "Voici les articles<hr>";
    }
}

$panier1 = new Panier;
echo '<pre>'; print_r($panier1); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($panier1)); echo '</pre>';

$panier1->nbProduit = 10;
echo '<pre>'; print_r($panier1); echo '</pre>';
echo 'Nombre de produit(s) : ' . $panier1->nbProduit . '<hr>';

echo $panier1->ajouterArticle();
// echo $panier1->retirerArticle(); // ⚠ Ne fonctionne pas car la méthode retirerArticle() est protected
// echo $panier1->affichageArticle(); // ⚠ Ne fonctionne pas car la méthode affichageArticle() est private

/*

    Une classe est un plan de construction, un modèle qui nous permet de regrouper des données, des informations sur un même sujet.
    Pour exploiter ce qui est déclaré dans la classe, nous devons créer une instance, un objet issu de la classe grâce au mot clé "new"
    Le mot clé 'new' permet de créer un exemplaire de la classe à travers l'objet ($panier1)

    Niveau de visibilité :
        - public : accessible de partout, dans la classe, dans les classes héritières et depuis l'extérieur de la classe (depuis l'objet)
        - protected : accessible dans la classe ou cela à été déclaré et aussi dans les classes héritières
        - private : accessible uniquement dans la classe ou cela à été déclaré
    
    Divers : 
        new est un mot clé permettant d'effectuer une instanciation
        une classe peut produire plusieurs objets.
        Nous pouvons donc effectuer plusieurs instanciation avec le mot clé 'new'
    
    Les niveaux de visibilité permettent de protéger les données des classes, et de ne pas pouvoir injecter n'importe quelle donées directement dans les propriétées et les méthodes des classes.

    Quand vous instanciez une classe, la variable stockant l'objet, en faite ne stocke pas l'objet lui même.
    En faite elle stocke un identifiant qui représente cet objet.


*/


