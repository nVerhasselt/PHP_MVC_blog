<?php 
namespace App\Models;
class UsersModel extends Model{
    protected $id;
	protected $lName;
    protected $fName;
	protected $pseudo;
	protected $email;

protected $password;
public function __construct()
{
    $class=str_replace(__NAMESPACE__.'\\','',__CLASS__);
    $this-> table =strtolower(str_replace('Model','',$class));
}
/**
 * Récupérer un user à partir de son e-mail
 * @param string $email 
 * @return mixed 
 */


   /**
     * Crée la session de l'utilisateur
     * @return void 
     */

	public function getId() {
		return $this->id;
	}

	public function setId($value) {
		$this->id = $value;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($value) {
		$this->email = $value;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword($value) {
		$this->password = $value;
	}

	public function getLName() {
		return $this->lName;
	}

	public function setLName($value) {
		$this->lName = $value;
	}

	public function getFName() {
		return $this->fName;
	}

	public function setFName($value) {
		$this->fName = $value;
	}

	public function getPseudo() {
		return $this->pseudo;
	}

	public function setPseudo($value) {
		$this->pseudo = $value;
	}
}