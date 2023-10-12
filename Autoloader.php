<?php
namespace App;

/**
 * The `class Autoloader` is defining a custom autoloader function that registers itself with the PHP SPL (Standard PHP Library) autoloader. The autoloader function is responsible for loading PHP classes automatically when they are needed, without the need for manual `require` or `include` statements. The `autoload` function in the `Autoloader` class takes the class name as an argument, converts it to a file path, and checks if the file exists. If the file exists, it is included using `require_once`.
 * 
 * @class
 * @name Autoloader
 */
class Autoloader
{

    /**
     * The `static function register()` method is registering the custom autoloader function defined in the `Autoloader` class with the PHP SPL (Standard PHP Library) autoloader. This allows the autoloader function to be called automatically whenever a class is needed, without the need for manual `require` or `include` statements.
     * 
     */
    static function register()
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }

    /**
     * The `static function autoload($class)` is a custom autoloader function that takes the class name as an argument, converts it to a file path, and checks if the file exists. If the file exists, it is included using `require_once`. This function is responsible for loading PHP classes automatically when they are needed, without the need for manual `require` or `include` statements.
     * 
     */
    static function autoload($class)
    {
        // On récupère dans la variable $class la totalité du namespace de la classe concernée (App\Controllers\ArticlesController)
        $class = str_replace(__NAMESPACE__ . '\\', '', $class); // On retire le namespace
        
        $class = str_replace('\\', '/', $class);

        $fichier = __DIR__ . '/' . $class . '.php';

        if(file_exists($fichier)){
            require_once $fichier;
        }
    }
}