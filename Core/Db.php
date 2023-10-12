<?php

namespace App\Core;

// Import de la classe PDO
use PDO;
use PDOException;

class Db extends PDO
{

    // Variable dans laquelle sera stockée l’instance UNIQUE de la classe
    private static $instance;

    // Constantes contenant les informations de connexion à la BDD
    private const DBHOST = 'localhost';
    private const DBUSER = 'root';
    private const DBPASS = '';
    private const DBNAME = 'nblog';


    /**
     * The `private function __construct()` is the constructor method of the `Db` class. It sets up the database connection using the PDO class and sets some attributes for the connection, such as the character encoding and error mode. It is marked as private to prevent the creation of multiple instances of the class, as the `getInstance()` method is used to generate or retrieve the single instance of the class.
     * 
     */
    private function __construct()
    {
        // Stockage dans une variable du DSN de connexion : Source des données (localhost) et répertoire de la source des données (nblog)

        $_dsn = 'mysql:dbname=' . self::DBNAME . ';host=' . self::DBHOST;

        // Appel du constructeur parent (constructeur de la classe PDO)
        try {
            parent::__construct($_dsn, self::DBUSER, self::DBPASS);
            
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8'); // Permet de forcer l’UTF8
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Permet de récupérer un tableau associatif à chaque fetch
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Change le mode de gestion des erreurs par défaut

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    /**
     * The `public static function getInstance(): self` method is a static method that returns an instance of the `Db` class. It uses the Singleton design pattern to ensure that only one instance of the class is created and used throughout the application. If an instance of the class has already been created, it returns that instance. If not, it creates a new instance and returns it. The `: self` part of the method signature indicates that the method returns an instance of the `Db` class.
     * 
     */
    public static function getInstance(): self
    {
        // Vérification de la propriété $instance. Si elle est nulle, on peut instancier Db pour se connecter à la BDD
        if (self::$instance === null) {
            self::$instance = new self(); // (new self() consiste à instancier la classe elle-même)
        }
        return self::$instance; // Sinon on retourne simplement la propriété contenant déjà une instance de Db
    }
}
