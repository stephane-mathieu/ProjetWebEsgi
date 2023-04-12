<?php
namespace Controllers\User;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Deconnexion extends Controllers{

    protected $modelName = \Models\User::class;

    public function deconnexion(){
        $pageTitle = "deconnexion";
        // Initialiser la session
        session_start();
        
        // Détruire la session.
        session_destroy();

        // Redirection vers la page de connexion
        // header("Location: index.php");
        Http::redirect("home");
    }

}

?>