<?php

namespace Controllers\User;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class TraitementInscription01 extends Controllers
{
    protected $modelName = \Models\User::class;

    public function Traitement(){

        @$user_email = $this->model->findAllUser();

        echo json_encode($user_email);

    }

}