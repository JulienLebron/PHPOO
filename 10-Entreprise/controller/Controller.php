<?php

namespace controller;

class Controller 
{

    private $dbEntityRepository;

    public function __construct()
    {
        $this->dbEntityRepository = new \model\EntityRepository;
        // echo '✅ Instanciation de la class Controller réussi !';
    }

    // Méthode permettant le pilotage de notre application
    public function handleRequest()
    {
        // On stocke la valeur de l'indice "op" transmit dans l'url
        $op = isset($_GET['op']) ? $_GET['op'] : NULL;

        try
        {
            if($op == 'add' || $op == 'update')
                $this->save($op); // si on ajoute ou modifie un employé, la méthode save() sera exécutée
            elseif($op == 'select')
                $this->select();  // si sélectionne un employé, la méthode select() sera exécutée
            elseif($op == 'delete')
                $this->delete();  // si supprime un employé, la méthode delete() sera exécutée
            else
                $this->selectAll(); // Dans les autres cas, nous voulons afficher l'ensemble des employés, la méthode selectAll() sera exécutée

        }
        catch(\Exception $e)
        {
            echo "🛑 Une erreur est survenue : " . $e->getMessage(); 
        }
    }

    // Méthode permettant de construire une vue (une page de notre application)
    public function render($layout, $template, $parameters = array())
    {
        // extract() : fonction prédéfinie qui permet d'extraire chaque indice d'un tableau ARRAY sous forme de variable
        extract($parameters); // $parameters['employes'] ---> $employes
        // permet de faire une mise en tampon, on commence à garder en mémoire de la données
        ob_start();
        // Cette inclusion sera stockée directement dans la variable $content
        require_once "view/$template";
        // on stock dans la variable $content le template
        $content = ob_get_clean();
        // On temporise la sortie d'affichage
        ob_start();
        // On inclue le layout qui est le gabarit de base (header/nav/footer)
        require_once "view/$layout";
        // ob_end_flush() va libérer et fait tout apparaître dans le navigateur
        // Envoi les données de la mise en mémoire dans le navigateur
        return ob_end_flush();
    }

}