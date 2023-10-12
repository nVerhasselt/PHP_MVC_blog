<?php
namespace App\Models;

/**
 * Modèle pour la table "categories"
 */
class CategoriesModel extends Model
{
    protected $id;
    protected $name;
    
    
    public function __construct()
    {
        $this->table = 'categories';
    }

	public function getId() {
		return $this->id;
	}

	public function setId($value) {
		$this->id = $value;
	}

	public function getName() {
		return $this->name;
	}

	public function setName($value) {
		$this->name = $value;
	}
}