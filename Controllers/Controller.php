<?php

namespace App\Controllers;

/**
 * The `abstract class Controller` is defining a base class for controllers in a PHP application. It contains two methods: `validate` for validating form data and `render` for rendering views. The class is marked as `abstract` which means it cannot be instantiated directly, but must be extended by other classes that provide concrete implementations of its methods.
 * 
 * @class
 * @abstract
 * @name Controller
 */
abstract class Controller
{

    /**
     * The `public function validate(array $form, array $champs)` method is validating form data. It takes in two parameters: `$form`, which is an array containing the form data, and `$champs`, which is an array containing the names of the required form fields. The method loops through the `$champs` array and checks if each field is present and not empty in the `$form` array. If any required field is missing or empty, the method returns `false`. If all required fields are present and not empty, the method returns `true`.
     * 
     */
    public function validate(array $form, array $champs)
    {
        // Boucle parcourant le tableau des champs attendus
        foreach($champs as $champ){

            // Si le champ est absent du formulaire OU si sa valeur est vide
            if(!isset($form[$champ]) || empty($form[$champ])){

                // Retourne "faux" et sort de la méthode
                return false;
            }
        }

        // Retourne "vrai"
        return true;
    }
    
    /**
     * The `public function render(string $fichier, array $data = [])` method is responsible for rendering views in a PHP application. It takes in two parameters: `$fichier`, which is the name of the view file to be rendered, and `$data`, which is an optional array containing data to be passed to the view.
     * 
     */
    public function render(string $fichier, array $data = [])
    {
        extract($data);

        // BUFFER

        ob_start();

        require_once(ROOT.'/views/'.$fichier.'.php'); // get_class permet d’avoir le nom de la classe de l’objet en cours

        $content = ob_get_clean();

        // FIN DU BUFFER

        require_once(ROOT.'/views/layout/default.php');
    }
}
