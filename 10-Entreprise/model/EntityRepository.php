<?php

namespace model;


class EntityRepository
{
    private $db; // permet de stocker un objet issu de la classe PDO, c'est à dire la connexion à la BDD
    public $table; // permet de stocker le nom de la table SQL afin de l'injecter dans les différentes requêtes SQL

    // Méthode permettant de construire la connexion à la BDD
    public function getDb()
    {
        if(!$this->db)
        {
            try
            {
                // simplexml_load_file() : fonction prédéfinie de PHP qui permet de charger un fichier XML et retourn un objet PHP SimpleXMLElement contenant toutes les informations du fichier
                $xml = simplexml_load_file('app/config.xml');
                // echo '<pre>'; print_r($xml); echo '</pre>';

                // On affecte le nom de la table récupéré via le fichier XML 
                $this->table = $xml->table;

                try // On tente d'exécuter la connexion à la Base de données
                {
                    // On affecte à la propriété privé $db la connexion à la BDD
                    $this->db = new \PDO("mysql:host=" . $xml->host . ";dbname=" . $xml->db, $xml->user, $xml->password, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));

                }
                catch(\PDOException $e)
                {
                    echo "🛑 Une erreur est survenu pendant la tentative de connexion à la BDD : " . $e->getMessage();
                }
            }
            catch(\Exception $e)
            {
                echo "🛑 Une erreur est survenu pendant le chargement du fichier XML : " . $e->getMessage();
            }
        }
        // print_r($this->db);
        return $this->db;
    }

    // Méthode permettant de sélectionner l'ensemble des employes dans la table "employes"
    public function selectAllEntityRepo()
    {
        // $data(réponse de la BDD = PDOStatement) = PDO->query(reqête SQL)
        $data = $this->getDb()->query("SELECT * FROM " . $this->table);
        // $r (résultat traité par la méthode fetchAll() avec un mode FETCH_ASSOC)
        $r = $data->fetchAll(\PDO::FETCH_ASSOC);
        return $r;
    }

    // Méthode permettant de sélectionner tout les nom des champs de la table "employes"
    public function getFields()
    {
        $data = $this->getDb()->query("DESC " . $this->table);
        $r = $data->fetchAll(\PDO::FETCH_ASSOC);
        return array_slice($r,1);
    }

    // Méthodepermettant de sélectionner un employé dans la BDD en fonction de son ID
    public function selectEntityRepo($id)
    {
        $data = $this->getDb()->query("SELECT * FROM " . $this->table . " WHERE id_" . $this->table . " = " . $id);
        $r = $data->fetch(\PDO::FETCH_ASSOC);
        return $r;
    }

    // Méthode permettant de supprimer un employé de la Base de données en fonction de son ID
    public function deleteEntityRepo($id)
    {
        $q = $this->getDb()->query('DELETE FROM ' . $this->table . ' WHERE id_' . $this->table . ' = ' . $id);
    }

    // Méthode permettant d'ajouter ou de modifier un employé dans la base de données en fonction de son ID
    public function saveEntityRepo()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 'NULL';
        $q = $this->getDb()->query('REPLACE INTO ' . $this->table . '(id_' . $this->table . ',' . implode(',', array_keys($_POST)) . ') VALUES (' . $id . ',' . "'" . implode("','", $_POST) . "'" . ')');
    }

}



// TEST

// $e = new EntityRepository;
// $e->getDb();