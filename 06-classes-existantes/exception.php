<?php

echo '<h2>Exception // Try-catch</h2>';

// L'avantage des exception c'est de centraliser un traitement à effectuer dans le bloc catch en cas d'erreur
// Cette fonction à pour but de trouver la position d'un élément dans un tableau
function recherche($tableau, $element)
{
    if(!is_array($tableau))
    {
        throw new Exception("Vous devez envoyer un tableau");
        // throw nous permet de nous envoyer dans le bloc catch et d'arrêter l'excution du code
        // new Exception : va instancier la class prédéfinie Exception
    }
    if(sizeof($tableau) == 0)
    {
        throw new Exception("Vous devez envoyer un tableau avec du contenu");
    }
    $position = array_search($element, $tableau);
    return $position;
}

$pasUnArray = "Je ne suis pas un ARRAY !";
$tab = array();
$tabPerso = ['Mario', 'Luigi', 'Toad', 'Bowser', 'Yoshi', 'Peach'];
echo '<pre>'; print_r($tabPerso); echo '</pre>';

try
{
    echo "Toad se trouve à la position : " . recherche($tabPerso, 'Toad') . '<hr>';
    echo "Yoshi se trouve à la position : " . recherche($tabPerso, 'Yoshi') . '<hr>';
    echo "Bowser se trouve à la position : " . recherche($tab, 'Bowser') . '<hr>';
    echo "Mario se trouve à la position : " . recherche($pasUnArray, 'Mario') . '<hr>';
}
catch(Exception $e)
{
    // bloc de capture, on va attraper les exceptions si il y'en a une qui est levée.
    // $e représente l'objet Exception
    // echo '<pre>'; print_r($e); echo '</pre>';
    // echo '<pre>'; print_r(get_class_methods($e)); echo '</pre>';
    
    echo '<div style="width: 400px; padding: 10px; background: #D59797; border-radius: 4px; margin: 0 auto; color: white; text-align: center;">';
    echo " ❌ Erreur : " . $e->getMessage() . '<hr> ❌ Dans le fichier : ' . $e->getFile() . "<hr> A la ligne : " . $e->getLine();
    echo '</div>';
}

echo '<hr><hr>';

echo '<h2>PDOException</h2>';

try
{
    $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '');
    echo '<div style="width: 400px; padding: 10px; background: #97D5AC; border-radius: 4px; margin: 0 auto; color: white; text-align: center;">';
    echo "✅ Connexion établie avec succès ! <br> Votre base de données est maintenant connectée !";
    echo '</div>';

}
catch(PDOException $e)
{
    echo '<div style="width: 400px; padding: 10px; background: #D59797; border-radius: 4px; margin: 0 auto; color: white; text-align: center;">';
    echo "❌ Une erreur s'est produite durant la tentative de connexion : " . $e->getMessage() . "<hr> ❌ L'erreur s'est produit dans le fichier : " . $e->getFile();
    echo "</div>";
}