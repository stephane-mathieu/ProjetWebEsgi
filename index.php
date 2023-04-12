<?php

// use AltoRouter;
use Models\Http;
use Controllers\User;

require('vendor/autoload.php');


$basePath = dirname($_SERVER['PHP_SELF']);
$router = new AltoRouter();
$router->setBasePath($basePath);
//root user//
$router->map('GET', '/home',function(){ $controller = new \Controllers\Index(); $controller->index();},'home');
$router->map('GET/POST', '/connexion', function(){ $controller = new \Controllers\User\Connexion(); $controller->connexion();},'connexion');
$router->map('GET/POST', '/inscription',function(){ $controller = new \Controllers\User\Inscription(); $controller->inscription();},'inscription');
$router->map('GET/POST', '/deconnexion',function(){ $controller = new \Controllers\User\Deconnexion(); $controller->deconnexion();},'deconnexion');
$router->map('GET/POST', '/profile',function(){ $controller = new \Controllers\User\Profile(); $controller->Profile();},'profile');
$router->map('GET/POST', '/compte',function(){ $controller = new \Controllers\User\Compte(); $controller->Compte();},'compte');
$router->map('GET/POST', '/traitementInscription',function(){ $controller = new \Controllers\User\TraitementInscription01(); $controller->Traitement();},'traitement');
$router->map('GET/POST', '/traitementLike',function(){ $controller = new \Controllers\User\TraitementLike(); $controller->TraitementLike();},'traitementLike');




/* MatchLike the current request */
$match = $router->match();
if (is_array($match)){
    if(is_callable($match['target'])){
        call_user_func_array($match['target'],$match['params']);
    }
}
else{
    Http::redirect("home");

}



?>

