<?php


class Maison
{
    public $couleur = 'blanc';               // propriété qui appartient à l'objet
    public static $espaceTerrain = '2000m2'; // propriété qui appartient à la classe
    private static $nbPiece = 7;             // propriété qui appartient à la classe   
    private $nbPorte = 20;                   // propriété qui appartient à la classe   
    const HAUTEUR = '10m';                   // propriété qui appartient à la classe

    public static function getNbPiece()
    {
        return self::$nbPiece;
        // self représente la classe à l'intérieur d'elle-même
    }

    public function getNbPorte()
    {
        return $this->nbPorte;
        // $this représente l'objet en cours à l'intérieur de la classe
    }
}

$maison = new Maison;
echo "Couleur de la maison : " . $maison->couleur . "<hr>";
echo "Nombre de portes : " . $maison->getNbPorte() . "<hr>";
echo "Espace terrain disponible : " . Maison::$espaceTerrain . "<hr>";
echo "Nombre de pièce(s) de la maison : " . Maison::getNbPiece() . "<hr>";
echo "Hauteur de la maison : " . Maison::HAUTEUR . '<hr>';

$maison2 = new Maison;

// echo $maison2->espaceTerrain . '<hr>'; // ⚠ Erreur ! Je ne dois pas appeler une propriété static avec mon objet
// echo Maison::$couleur . '<hr>'; // ⚠ Erreur ! Je ne dois pas appeler une propriété qui n'est pas static par la class

// echo $maison2->getNbPiece() . '<hr>'; // ⚠ devrait donner une erreur car on utilise la syntaxe objet pour pointer sur une méthode static

// echo $maison2::$espaceTerrain . '<hr>'; // ⚠ devrait donner une erreur car on passe par l'objet en utilisant la syntaxe classe pour pointer sur une propriété static

/*
    $objet->element // objet à l'extérieur de la classe
    $this->element  // objet à l'intérieur de la classe
    class::$element // classe à l'extérieur de la classe
    self::$element  // classe à l'intérieur de la classe

    static indique qu'un élément appartient à la classe dans le cadre d'une propriété la valeur est variable
    const indique q'un élément appartient à la classe dans le cadre d'une constante la valeur est constante
    self représente la classe à l'intérieur d'elle même
    $this représente l'objet en cours à l'intérieur de la classe

    Lorsque l'on appel une propriété via l'objet, il ne faut pas mettre le signe $ devant
    Lorsque l'on appel une propriété via la classe, il faut mettre le signe $ devant
*/

