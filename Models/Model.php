<?php

namespace App\Models;
//on ajout euse par ce que on n'a pasdans le meme space
use App\Core\Db;

class Model extends Db
{
    // Table de la base de données
    protected $table;

    // Instance de connexion
    private $db;
    /**
     * Méthode qui exécutera les requêtes
     * @param string $sql Requête SQL à exécuter
     * @param array $attributes Attributs à ajouter à la requête 
     * @return PDOStatement|false 
     */
    /**
     * Sélection de plusieurs enregistrements suivant un tableau de critères
     * @param array $criteres Tableau de critères
     * @return array Tableau des enregistrements trouvés
     */
    public function findBy(array $criteres)
    {
        $champs = []; //tableau contient les champs
        $valeurs = []; ////tableau contient les valeurs

        // On boucle pour "éclater le tableau  asociatif"
        foreach ($criteres as $champ => $valeur) {
            //SELECT * FROM annonces WHERE actif=?
            $champs[] = "$champ = ?";
            //bindValue(1,valeur)

            $valeurs[] = $valeur;
        }


        // On transforme le tableau en chaîne de caractères séparée par des AND
        $liste_champs = implode(' AND ', $champs);

        // On exécute la requête
        return $this->requete("SELECT * FROM {$this->table} WHERE $liste_champs", $valeurs)->fetchAll();
    }


    /**
     * Sélection d'un enregistrement suivant son id
     * @param int $id id de l'enregistrement
     * @return array Tableau contenant l'enregistrement trouvé
     */
    public function find(int $id)
    {
        // On exécute la requête
        return $this->requete("SELECT * FROM {$this->table} WHERE id = $id")->fetch();
    }


    /**
     * Insertion d'un enregistrement suivant un tableau de données
     * @param Model $model Objet à créer
     * @return bool
     */
    public function create()
    {
        $champs = [];
        $inter = [];
        $valeurs = [];

        // On boucle pour éclater le tableau
        foreach ($this as $champ => $valeur) {
            // INSERT INTO annonces (titre, description, actif) VALUES (?, ?, ?)
            if ($valeur !== null && $champ != 'db' && $champ != 'table') {
                $champs[] = $champ;
                $inter[] = "?";
                $valeurs[] = $valeur;
            }
        }

        // On transforme le tableau "champs" en une chaine de caractères
        $liste_champs = implode(', ', $champs);
        $liste_inter = implode(', ', $inter);

        // On exécute la requête
        return $this->requete('INSERT INTO ' . $this->table . ' (' . $liste_champs . ')VALUES(' . $liste_inter . ')', $valeurs);
    }



    /**
     * Mise à jour d'un enregistrement suivant un tableau de données
     * @param int $id id de l'enregistrement à modifier
     * @param Model $model Objet à modifier
     * @return bool
     */
    public function update()
    {
        $champs = [];
        $valeurs = [];

        // On boucle pour éclater le tableau
        foreach ($this as $champ => $valeur) {
            // UPDATE annonces SET titre = ?, description = ?, actif = ? WHERE id= ?
            if ($valeur !== null && $champ != 'db' && $champ != 'table') {
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
            }
        }
        $valeurs[] = $this->id;

        // On transforme le tableau "champs" en une chaine de caractères
        $liste_champs = implode(', ', $champs);

        // On exécute la requête
        return $this->requete('UPDATE ' . $this->table . ' SET ' . $liste_champs . ' WHERE id = ?', $valeurs);
    }




    /**
     * Suppression d'un enregistrement
     * @param int $id id de l'enregistrement à supprimer
     * @return bool 
     */
    public function delete(int $id)
    {
        return $this->requete("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    public function requete(string $sql, array $attributs = null)
    {
        // On récupère l'instance de Db(la connexion)
        $this->db = Db::getInstance();

        // On vérifie si on a des attributs
        if ($attributs !== null) {
            // Requête préparée 
            //$this->db(Pdo) $sql(requette sql) $atrribut (tableau les attributs de  la requettes ou bien les ? dans la requete)
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        } else {
            // Requête simple
            //  $this->db->query($sql) prépare et exécute une requête SQL en un seul appel de fonction
            return $this->db->query($sql);
        }
    }


    /**
     * Sélection de tous les enregistrements d'une table
     * @return array Tableau des enregistrements trouvés
     */
    public function findAll()
    {
        $query = $this->requete('SELECT * FROM ' . $this->table);
        return $query->fetchAll();
    }
    /**
     * Hydratation des données
     * @param array $donnees Tableau associatif des données
     * @return self Retourne l'objet hydraté
     */
    public function hydrate($donnees)
    {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à la clé (key)
            // titre -> setTitre
            $setter = 'set' . ucfirst($key);

            // On vérifie si le setter existe
            if (method_exists($this, $setter)) {
                // On appelle le setter
                $this->$setter($value);
            }
        }
        return $this;
    }
}
