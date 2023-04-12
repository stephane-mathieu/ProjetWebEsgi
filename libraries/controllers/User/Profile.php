<?php

namespace Controllers\User;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Profile extends Controllers
{
    protected $modelName = \Models\User::class;
    public function Profile(){
        session_start();

        $user_infos= $this->model->findInfoUser($_GET['id']);

        $pageTitle = "Compte";
        Renderer::render('users/profile', compact('pageTitle','user_infos'));
    }
}