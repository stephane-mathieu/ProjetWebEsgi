<?php

namespace Controllers\User;

use Controllers\Controllers;
use Models\Http;
use Models\Renderer;

class TraitementLike extends Controllers
{
    protected $modelName = \Models\User::class;
    public function TraitementLike(){

//        $_GET['id']
        $MatchList = new \Models\MatchLike();
//        $user_orders = $MatchList->findMatchListbyId($_GET['id']);
        session_start();
        $gender = $_SESSION['gender'];
        if($gender == "male"){
            $Profiles =  $this->model->DisplayProfilebyGenre("female");
        }else{
            $Profiles =  $this->model->DisplayProfilebyGenre("male");
        }

        $liker =  $_SESSION['userId'];
        $liked =   $_GET['id'];
        $status = 'inactive';

        $existing_match = $MatchList->findMatch( (int) $liked,  (int) $liker);


        if(empty($existing_match)){
            $MatchList->createMatch($liker, $liked, $status);
        }
        else if($existing_match[0]['statut'] == 'liked' && $existing_match[0]['statut2'] == 'inactive'){
            $MatchList->updateMatch($liker, $liked, 'active');
        }
        Http::redirect("home");
    }

}