<?php


abstract class Joueur
{

    protected $ageJoueur;

    public function setAgeJoueur($age)
    {
        $this->ageJoueur = $age;
    }

    public function getAgeJoueur()
    {
        return $this->ageJoueur;
    }

    public function seConnecter()
    {
        if($this->getAgeJoueur() < $this->etreMajeur())
        {
            return "Vous avez " . $this->getAgeJoueur() . " ans. ❌ Vous devez être majeur pour jouer à ce jeux ! Age requis : " . $this->etreMajeur() . " ans";
        }
        else
        {
            return "Vous avez " . $this->getAgeJoueur() . " ans. ✅ Vous êtes maintenant connecter au serveur de jeux !";
        }
    }

    abstract public function etreMajeur(); // les méthodes abstraites n'ont pas de contenu (no body / corps)
    abstract public function devise();
}

// ici on hérite
class JoueurFr extends Joueur
{
    public function etreMajeur()
    {
        return 18;
    }

    public function devise()
    {
        return '€';
    }
}

class JoueurUsa extends Joueur
{
    public function etreMajeur()
    {
        return 21;
    }

    public function devise()
    {
        return '$';
    }
}

// $joueur = new Joueur; // erreur , une class abstraite n'est pas instanciable !
$joueurFr = new JoueurFr;
$joueurFr->setAgeJoueur(19);
echo "Age pour jouer depuis la France : " . $joueurFr->etreMajeur() . ' ans<hr>';
echo "Devise pour jouer depuis la France : " . $joueurFr->devise() . ' <hr>';
echo $joueurFr->seConnecter() . '<hr>';

$joueurUsa = new JoueurUsa;
$joueurUsa->setAgeJoueur(19);
echo "Age pour jouer depuis les USA : " . $joueurUsa->etreMajeur() . ' ans<hr>';
echo "Devise pour jouer depuis les USA : " . $joueurUsa->devise() . ' <hr>';
echo $joueurUsa->seConnecter();

/*
    Une class abstraite n'est pas instanciable
    les méthodes abstraites n'ont pas de contenu (elles sont dite no-body)
    Lorsque l'on hérite de méthodes abstraites, nous sommes obligé de les redéfinir
    Pour avoir des méthodes abstraites il est nécessaire que la classe qui les contient soit elle-même abstraite.
    Une classe abstraite peut contenir des méthodes normale

    Le développeur qui écrit une classe abstraite est au coeur de l'application et va obliger les autres développeur à redéfinir la méthode etreMajeur() et devise() car non seulement elle est abstraite mais en + elle est exécutée dans la méthode seConnecter(). 
    Il impose une bonne contrainte (saine).
*/

