<?php

/*********************
---------------------       
|    Vehicule		|     
---------------------
|	$litresEssence	|
---------------------
|setlitresEssence() |
|getlitresEssence() |
---------------------

---------------------
|    Pompe   		|
---------------------
|	$litresEssence	|
---------------------
|setlitresEssence() |
|getlitresEssence() |
|donnerEssence(Vehicule $v)	|
---------------------

    1. Créer les classes ( Vehicule / Pompe )                                          //
    2. Création d'un véhicule (objet)                                                  //
    3. Attribuer un nombre de litre d'essence au véhicule : 5 L                        //
    4. Afficher le nombre de litre d'essence dans le véhicule                          //
    5. Création d'une pompe à essence (objet)                                          //     
    6. Attribuer un nombre de litre d'essence dans la pompe : 800 L                    // 
    7. Afficher le nombre de litre d'essence dans la pompe                             // 
    8. La pompe donne de l'essence à la voiture en faisant le plein                    // 
    (voiture après passage à la pompe : 50 L) (injection de dépendance)
    9. Afficher le nombre de litre d'essence restant dans la pompe                     // 
    10. Afficher le nombre de litre d'essence dans la voiture après ravitaillement     // 
    11. Faire en sorte que le véhicule ne puisse pas contenir plus de 50L d'essence    //

    BONUS POUR LES COUCHES TARD
    12. Créer une classe camion citerne et faire le plein de la pompe lorque la pompe est vide !

******/

class Vehicule
{
    private $litresEssence;
    private $reservoirMax;

    public function __construct($litresEssence, $reservoirMax)
    {
        $this->setLitresEssence($litresEssence);
        $this->setReservoirMax($reservoirMax);
    }

    public function setLitresEssence($litres)
    {
        $this->litresEssence = $litres;
    }

    public function getLitresEssence()
    {
        return $this->litresEssence;
    }

    public function setReservoirMax($litres)
    {
        $this->reservoirMax = $litres;
    }

    public function getReservoirMax()
    {
        return $this->reservoirMax;
    }
}

class Pompe
{
    private $litresEssence;
    private $reservoirMax;

    public function setLitresEssence($litres)
    {
        $this->litresEssence = $litres;
    }

    public function getLitresEssence()
    {
        return $this->litresEssence;
    }

    public function setReservoirMax($litres)
    {
        $this->reservoirMax = $litres;
    }

    public function getReservoirMax()
    {
        return $this->reservoirMax;
    }

    public function donnerEssence(Vehicule $v)
    {
        if($this->getLitresEssence() < ($v->getReservoirMax() - $v->getLitresEssence()))
        {
            $v->setLitresEssence($v->getLitresEssence() + $this->getLitresEssence());
            echo "⚠ Le plein n'a pas pu être fait entièrement car il restait : " . $this->getLitresEssence() . " litres d'essence<hr>";
            $this->setLitresEssence(0);
        }
        else
        {
                //                                     800 - (50 - ?)
            $this->setLitresEssence( $this->getLitresEssence() - ($v->getReservoirMax() - $v->getLitresEssence() ));
            $v->setLitresEssence( $v->getLitresEssence() + ($v->getReservoirMax() - $v->getLitresEssence() ));
            //                                     ?  + ( 50 - ?)
            //
        }
    }
}

class Citerne
{
    private $litresEssence;

    public function setLitresEssence($litres)
    {
        $this->litresEssence = $litres;
    }

    public function getLitresEssence()
    {
        return $this->litresEssence;
    }

    public function donnerEssence(Pompe $p)
    {
        if($p->getLitresEssence() < 100 && $this->getLitresEssence() > 0)
        {
            $this->setLitresEssence($this->getLitresEssence() - ($p->getReservoirMax() - $p->getLitresEssence() ));
            $p->setLitresEssence($p->getLitresEssence() + ($p->getReservoirMax() - $p->getLitresEssence()));
        }
        else
        {
            echo "Le plein de la pompe n'a pu être fait car le camion citerne est en rupture de stock !";
        }
    }

}

$vehicule = new Vehicule(5, 60);
echo "Le vehicule possède : " . $vehicule->getLitresEssence() . " litres d'essence<hr>";

$pompe = new Pompe;
$pompe->setLitresEssence(200);
$pompe->setReservoirMax(800);
echo "La pompe possède : " . $pompe->getLitresEssence() . " litres d'essence<hr>";
$pompe->donnerEssence($vehicule);

echo 'Après ravitaillement, le vehicule possède : ' . $vehicule->getLitresEssence() . " litres d'essence<hr>";
echo 'Après ravitaillement, la pompe possède : ' . $pompe->getLitresEssence() . " litres d'essence<hr>";

$vehicule2 = new Vehicule(15, 75);
echo "Le vehicule2 possède : " . $vehicule2->getLitresEssence() . " litres d'essence<hr>";
$pompe->donnerEssence($vehicule2);

echo 'Après ravitaillement, le vehicule2 possède : ' . $vehicule2->getLitresEssence() . " litres d'essence<hr>";
echo 'Après ravitaillement, la pompe possède : ' . $pompe->getLitresEssence() . " litres d'essence<hr>";

$vehicule3 = new Vehicule(2, 50);
echo "Le vehicule3 possède : " . $vehicule3->getLitresEssence() . " litres d'essence<hr>";
$pompe->donnerEssence($vehicule3);

echo 'Après ravitaillement, le vehicule3 possède : ' . $vehicule3->getLitresEssence() . " litres d'essence<hr>";
echo 'Après ravitaillement, la pompe possède : ' . $pompe->getLitresEssence() . " litres d'essence<hr>";


$citerne = new Citerne;
$citerne->setLitresEssence(1500);
$citerne->donnerEssence($pompe);

echo 'Après ravitaillement du camion citerne, la pompe possède : ' . $pompe->getLitresEssence() . " litres d'essence<hr>";
echo 'Après ravitaillement de la pompe, le camion citerne possède : ' . $citerne->getLitresEssence() . " litres d'essence<hr>";


$pompeAuchan = new Pompe;

$citerne->donnerEssence($pompeAuchan);



class Mario
{
    private $pointDeVie;

    public function setPointDeVie($point)
    {
        $this->pointDeVie = $point;
    }

    public function getPointDeVie()
    {
        return $this->pointDeVie;
    }

    public function combat(Bowser $b)
    {






    }
}

class Bowser
{
    private $pointDeVie;
    
    public function setPointDeVie($point)
    {
        $this->pointDeVie = $point;
    }
    
    public function getPointDeVie()
    {
        return $this->pointDeVie;
    }
    
}



const YVES = 100;


function Yves($p)
{
    return 10 + $p;
}

Yves(200);
Yves(50);

