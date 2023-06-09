<?php

namespace App\Controllers;

abstract class Controller
{



    public function validate(array $form, array $champs)
    {
        // On parcourt les champs
        foreach($champs as $champ){
            // Si le champ est absent ou vide dans le formulaire
            if(!isset($form[$champ]) || empty($form[$champ])){
                // On sort en retournant false
                return false;
            }
        }
        return true;
    }
    
    public function render(string $fichier, array $data = [])
    {
        extract($data);

        // On démarre le buffer

        ob_start();

        require_once(ROOT.'/views/'.$fichier.'.php'); // get_class permet d’avoir le nom de la classe de l’objet en cours

        $content = ob_get_clean();

        require_once(ROOT.'/views/layout/default.php');
    }
}
