<?php

/*
    1. Créer des nouvelles propriétées private : nom, salle, cp, ville.                               //
    2. Créer les setters et les getters associés.                                                     //
    3. Faire en sorte que nom, prenom, ville et adresse soient bien des string sinon erreur.          / 
    4. Pour nom et prénom longueur minimum de 3 caractères et maximum de 15 caractères sinon erreur.  //
    5. Pour la salle et cp vérifier que se sont bien des nombres sinon erreur.                        // 
    6. Créer 5 nouveaux Etudiant.
*/

class Etudiant
{
    private $prenom;
    private $nom;
    private $salle;
    private $adresse;
    private $cp;
    private $ville;

    public function __construct($prenom, $nom, $salle, $adresse, $cp, $ville)
    {
        $this->setPrenom($prenom);
        $this->setNom($nom);
        $this->setSalle($salle);
        $this->setAdresse($adresse);
        $this->setCp($cp);
        $this->setVille($ville);
        echo "<hr>Paramètre passés dans le constructor : <hr>";
        echo "Prénom : " . $prenom . "<br>Nom : " . $nom . "<br>Salle : " . $salle . "<br>Adresse : " . $adresse . "<br>Code Postal : " . $cp . "<br>Ville : " . $ville;
    }

    public function setPrenom($newPrenom)
    {
        if(is_string($newPrenom))
        {
            if(iconv_strlen($newPrenom) >= 3 && iconv_strlen($newPrenom) <= 15)
            {
                $this->prenom = $newPrenom;
            }
            else
            {
                trigger_error("Le prénom doit contenir entre 3 et 15 caractères inclus", E_USER_ERROR);
            }
        }
        else
        {
            trigger_error("Ce prénom n'est pas un string", E_USER_ERROR);
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
            if(iconv_strlen($newNom) >= 3 && iconv_strlen($newNom) <= 15)
            {
                $this->nom = $newNom;
            }
            else
            {
                trigger_error("Le nom doit contenir entre 3 et 15 caractères inclus", E_USER_ERROR);
            }
        }
        else
        {
            trigger_error("Ce nom n'est pas un string", E_USER_ERROR);
        }
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setSalle($newSalle)
    {
        if(is_integer($newSalle))
        {
            $this->salle = $newSalle;
        }
        else
        {
            trigger_error("Veuillez indiquer une salle ne contenant que des chiffres", E_USER_ERROR);
        }
    }

    public function getSalle()
    {
        return $this->salle;
    }

    public function setAdresse($newAdresse)
    {
        if(is_string($newAdresse))
        {
            $this->adresse = $newAdresse;
        }
        else
        {
            trigger_error("Cette adresse n'est pas un string", E_USER_ERROR);
        }
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setCp($newCp)
    {
        if(is_integer($newCp))
        {
            $this->cp = $newCp;
        }
        else
        {
            trigger_error("Veuillez indiquer un cp ne contenant que des chiffres", E_USER_ERROR);
        }
    }

    public function getCp()
    {
        return $this->cp;
    }

    public function setVille($newVille)
    {
        if(is_string($newVille))
        {
            $this->ville = $newVille;
        }
        else
        {
            trigger_error("Cette ville n'est pas un string", E_USER_ERROR);
        }
    }

    public function getVille()
    {
        return $this->ville;
    }

}

$eleve = new Etudiant('Julien', 'Lebron', 04, '30 avenue Broustin', 1090, 'Bruxelle');
$eleve1 = new Etudiant('Alexandre', 'Legrand', 15, '15 avenue du Lac', 77100, 'Meaux');
$eleve2 = new Etudiant('François', 'Mayeres', 04, '26 rue du général Leclerc', 77580, 'Crécy-La-Chapelle');
$eleve3 = new Etudiant('Adrienne', 'Gonzalez', 80, '30 avenue Broustin', 1090, 'Bruxelle');
$eleve4 = new Etudiant('Corentin', 'Garcia', 100, '99 avenue de la Cathédrale', 75012, 'Paris');
echo '<pre>'; print_r($eleve); echo '</pre>';
echo '<pre>'; print_r($eleve1); echo '</pre>';
echo '<pre>'; print_r($eleve2); echo '</pre>';
echo '<pre>'; print_r($eleve3); echo '</pre>';
echo '<pre>'; print_r($eleve4); echo '</pre>';

/*
    __construct() est une méthode magique en PHP, elle est prédéfinie dans le code et s'exécute automatiquement lorsqu'on instancie la classe.
    Si la méthode __construct($arg) attend un argument, nous devons lui envoyer un argument à l'instanciation de la classe.
    __construct() permet d'automatiser un traitement, cela pourrait être l'équivalent du fichier init( contenant la connexion à la bdd, session_start(), les constantes etc etc ... )
    On ne peux pas déclarer 2 constructor dans la même classe.
*/

// $test = 'été';

// echo 'Nombre de caractère contenu dans la variable test : ' . strlen($test) . '<br><br>';
// echo 'Nombre de caractère contenu dans la variable test : ' . iconv_strlen($test);





