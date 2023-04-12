<?php
namespace Models;
class Renderer {

    public  static function render(string $path, array $variable = []){

        extract($variable); // Importe les variables dans la table des symboles
        ob_start();
        require_once('view/' . $path . '.html.php');
        $pageContent = ob_get_clean();
        require_once('view/layout.html.php');
    }



}

?>