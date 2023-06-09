<?php 
//App: nom de package 
namespace App\Core;
//on importe PDO
use PDO;
use PDOException;
class Db extends PDO {
//Instance unique de la classe
private static $instance;
//Information de connexion
private const DBHOST ='localhost';
private const DBUSER='root';
private const DBPASS='';
private const DBNAME='nblog';


private function __construct(){
    // DSN de connexion
    $_dsn='mysql:dbname='.self::DBNAME.';host='.self::DBHOST;
    //On appelle le constructeur de la classe PDO
    try{   
         parent::__construct($_dsn,self::DBUSER, self::DBPASS);
          //setAttribute parametrer tout les information les message d'erreurs le fetch etc....
          //this ici signifier est le PDO
         $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');//pour nous permettre de faire tout les transitions en utf8
         $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);//a chaque fois quand on fait un fetch en tableaux associatif
         $this->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//parametrer les erreurs

        }
catch(PDOException $e){
    die ($e->getMessage());
}
   
}
//public pour on puis l'utiliser à l'exterieure de la class
//permet de génerer l'nstance ou récupere l'instance elle méme si il existe déja
public static function getInstance():self//on peux mettre comme valeur de retour  :self/:PDO/:DB
{
    if(self::$instance === null){
        self::$instance = new self();//new self() instancier la class elle méme
    }
    return self::$instance;
}
}