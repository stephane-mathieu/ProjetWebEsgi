<?php
namespace Controllers;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Index extends Controllers{

    protected $modelName = \Models\User::class;
    public function index() {
        session_start();

        $MatchList = new \Models\MatchLike();

        @$liker =  $_SESSION['userId'];
        @$gender = $_SESSION['gender'];

        if($gender == "male"){
            $Profiles =  $this->model->DisplayProfilebyGenre("female");
        }else{
            $Profiles =  $this->model->DisplayProfilebyGenre("male");
        }

        foreach ($Profiles as &$profile) {
            $liked = $profile['id'];

            $matchStatus = $MatchList->findMatch($liker,  $liked );

            $idLiked = $matchStatus[0]['id_user_liker'] ?? null;

            if (!empty($matchStatus)) {


                if ($matchStatus[0]['statut'] == 'liked' && $matchStatus[0]['statut2'] == 'inactive') {
                    $matchStatus = 'liked';
                } else {
                    $matchStatus = $matchStatus[0]['statut'] == 'active' ? 'active' : 'inactive';
                }
            }
            if(empty($matchStatus))
             {

                $matchStatus = $MatchList->findMatch2($liked,$liker);
//
                if (@$matchStatus[0]['statut'] == 'liked' && $matchStatus[0]['statut2'] == 'inactive') {
                    $matchStatus = null;
                } else {
                    @$matchStatus = $matchStatus[0]['statut'] == 'active' ? 'active' : 'inactive';
                }
//
//                $matchStatus = null;
//                $profile['matchStatus'] = null;
            }

            $profile['matchStatus'] = $matchStatus;
            $profile['idLiked'] = $idLiked;
        }

        $pageTitle = "Accueil";
        Renderer::render('users/index',compact('pageTitle','Profiles','idLiked'));
    }

}

?>