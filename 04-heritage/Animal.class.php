<?php


class Animal
{
    private $dent;

    protected function deplacement()
    {
        return "Je me déplace";
    }

    public function manger()
    {
        return "Je mange chaque jour";
    }
}

class Elephant extends Animal
{
    public function quiSuisJe()
    {
        return "Je suis un Elephant et " . $this->deplacement() . " comme un éléphant ! " . $this->manger() . " des fougères.";
    }

}

class Chat extends Animal
{
    public function quiSuisJe()
    {
        return "Je suis un chat et " . $this->deplacement() . " comme un chat ! " . Animal::manger();
    }

    public function manger() // redéfinition de méthode
    {
        // Lorsque l'on appel une méthode sur un objet, l'interpréteur php va d'abord chercher dans la class dont est issue l'objet avant d'aller dans la classe mère
        return "Je mange des croquettes !";
    }
}


$chat = new Chat;
echo "Chat dit : " . $chat->quiSuisJe() . "<hr>";
echo "Chat dit : " . $chat->manger() . '<hr>';



$elephant = new Elephant;
echo '<pre>'; print_r(get_class_methods($elephant)); echo '</pre>';
echo "Elephant dit : " . $elephant->manger() . '<hr>';
echo "Elephant dit : " . $elephant->quiSuisJe() . '<hr>';
// echo "Elephant dit : " . $elephant->deplacement() . '<hr>'; // ⚠ Erreur ! J'hérite bien de la méthode protected deplacement() mais je ne peux pas l'invoquer en dehors de la classe.

/*
    "extends" est un mot clé qui permet d'hériter d'une classe.
    La classe Elephant hérite de toutes les méthodes (public, protected) de la classe Animal. ⚠ "private" n'est pas héritable ! 
    Toute les méthodes de la classe Animal sont accessible directement dans la classe Elephant et la classe Chat
*/

