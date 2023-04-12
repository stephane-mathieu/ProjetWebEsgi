<?php

namespace Controllers\User;

use Controllers\Controllers;
use AltoRouter;
use Models\Http;
use Models\Renderer;

class Compte extends Controllers
{
    protected $modelName = \Models\User::class;

    public function Compte(){

        session_start();
        $errorMsg="";

        // Vérification de l'authentification de l'utilisateur
        if(!isset($_SESSION['email'])){
            header("Location: login");
            exit;
        }


        // Récupération des informations de l'utilisateur
        $email = $_SESSION['email'];
        $id_user = $_SESSION['userId'];
        $user_infos = $this->model->findInfoUser($id_user);

        // Traitement de la soumission du formulaire
        if(isset($_POST['submit'])){

            // Vérification si le mot de passe a été modifié
            if(!empty($_POST['password']) || !empty($_POST['password_confirm'])){
                if($_POST['password'] === $_POST['password_confirm']){
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $this->model->UpdatePassword( $password,$id_user);
                }else{
                    $errorMsg = "Les mots de passe ne correspondent pas";
                }
            }

            // Vérification si le login a été modifié
            if(!empty($_POST['pseudo'])){
                $login = htmlspecialchars($_POST['pseudo']);
                $existingUser = $this->model->findUserByLogin($login);
                if(!$existingUser || $existingUser[0]['id_user'] == $id_user){
                    $this->model->updateLogin($login,$id_user);
                }else{
                    $errorMsg = "Le pseudo est déjà utilisé, veuillez choisir un autre";
                }
            }

            if(!empty($_FILES['picture']['tmp_name'])){
                $photo = $_FILES['picture'];

                // Lire le contenu de l'image en tant que données binaires
                $image_data = base64_encode(file_get_contents($photo['tmp_name']));

                // Mise à jour de la photo de profil de l'utilisateur
                $this->model->UpdatePhoto($image_data, $id_user);
            }

            // Vérification si le téléphone a été modifié
            if(!empty($_POST['phone'])){
                $phone = htmlspecialchars($_POST['phone']);
                $this->model->updatePhone($phone, $id_user);
            }

            // Vérification si le nom a été modifié
            if(!empty($_POST['lastname'])){
                $nom = htmlspecialchars($_POST['lastname']);
                $this->model->updateNom($nom, $id_user);
            }

            // Vérification si le prénom a été modifié
            if(!empty($_POST['firstname'])){
                $prenom = htmlspecialchars($_POST['firstname']);
                $this->model->updatePrenom($prenom, $id_user);
            }

            // Vérification si la description a été modifiée
            if(!empty($_POST['Description'])){
                $description = htmlspecialchars($_POST['Description']);
                $this->model->updateDescription($description, $id_user);
            }


            // Redirection vers la page de profil
            header("Location: compte");
            exit;
        }

        $pageTitle = "Compte";
        Renderer::render('users/compte', compact('pageTitle', 'email', 'user_infos', 'errorMsg'));
    }



}