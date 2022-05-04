<?php

/*
    1. Créer une propriété private nom // 
    2. Créer le setter et le getter pour cette propriété nom //
    3. Vérifier si le nom fourni est bien une chaine de caractère sinon erreur //
    4. Tester (enregistrer un nom et vous afficher le nom) //
*/

class Membre
{
    private $prenom;
    private $nom;

    public function setPrenom($newPrenom)
    {
        if(is_string($newPrenom))
        {
            $newPrenom = mb_strtoupper($newPrenom, 'UTF-8');
            $this->prenom = $newPrenom;
        }
        else
        {
            trigger_error("Veuillez indiquer un prénom ne contenant que des lettres", E_USER_ERROR);
        }
    }

    public function getPrenom()
    {
        return $this->prenom;
    }
    
    public function setNom($newNom)
    {
        if(is_string($newNom))
        {
            $newNom = mb_strtoupper($newNom, 'UTF-8');
            $this->nom = $newNom;
        }
        else
        {
            trigger_error("Veuillez indiquer un nom ne contenant que des lettres", E_USER_ERROR);
        }
    }

    public function getNom()
    {
        return $this->nom;
    }
}

$membre1 = new Membre;
echo '<pre>'; print_r(get_class_methods($membre1)); echo '</pre>';
$membre1->setPrenom('François');
$membre1->setNom('Mayeres');
echo 'Prénom contenu dans membre1 : ' . $membre1->getPrenom() . '<hr>';
echo 'Nom contenu dans membre1 : ' . $membre1->getNom() . '<hr>';


$membre2 = new Membre;
$membre2->setPrenom('Julien');
echo 'Prénom contenu dans membre2 : ' . $membre2->getPrenom() . '<hr>';

/*
    Les getters / setters permettant de contrôler l'intégralité des données.
    Si nous devons contrôler les données saisie dans un formulaire, chaque donnée devra être transmise à une méthode qui permettra de contrôler la validité des données.

    setter = contrôler les données.
    getter = permet de voir / d'exploiter les données finale, les données contrôlées.

    les getters et setters permettent d'éviter d'avoir n'importe quoi comme données dans les différentes propriétés déclarées.

    $this représente l'objet en cours à l'intérieur de la classe

    Mettre les propriétés en private permet d'éviter qu'elles ne soient modifiées dans le code,
    nous sommes obligés de passer par les setters.
    (c'est une bonne contrainte !)
*/






