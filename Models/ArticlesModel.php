<?php
namespace App\Models;

/**
 * Modèle pour la table "annonces"
 */
class ArticlesModel extends Model
{
    protected $id;
    protected $title;
    protected $content;
    protected $date;
    protected $users_id;
    protected $categories_id;
    
    public function __construct()
    {
        $this->table = 'articles';
    }
/** on utilise des setteures et des getteurs parce que on met les atrributs en protected
 * donc on ne peux l'acceder que par le bies des setteurs et getteurs
 */
    /**
     * Obtenir la valeur de id
     */ 
    public function getId():int
    {
        return $this->id;
    }

    /**
     * Définir la valeur de id
     *
     * @return  self
     */ 
    public function setId(int $id):self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Obtenir la valeur de titre
     */ 
    public function getTitle():string
    {
        return $this->title;
    }

    /**
     * Définir la valeur de titre
     *
     * @return  self
     */ 
    public function setTitle(string $title):self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Obtenir la valeur de content
     */ 
    public function getContent():string
    {
        return $this->content;
    }

    /**
     * Définir la valeur de content
     *
     * @return  self
     */ 
    public function setContent(string $content):self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Obtenir la valeur de date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Définir la valeur de date
     *
     * @return  self
     */ 
    public function setDate($date):self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Obtenir la valeur de Categories_id
     */ 
    
	public function getCategories_id() {
		return $this->categories_id;
	}
/**
     * Définir la valeur de categoties_id
     *
     * @return  self
     */ 
	public function setCategories_id($value) {
		$this->categories_id = $value;
        return $this;
	}
/**
     * Obtenir la valeur de users_id
     */ 
    
	public function getUsers_id() {
		return $this->users_id;
	}
/**
     * Définir la valeur de users_id
     */ 
    
	public function setUsers_id($value) {
		$this->users_id = $value;
        return $this;
	}
}