<?php
namespace Controllers\User;

use AltoRouter;
use Models\Http;
use Models\Renderer;
use Controllers\Controllers;

class Inscription extends Controllers{

    protected $modelName = \Models\User::class;

    public function Inscription(){
       
        $check = true;

        $display_form = 1;

        $role = "utilisateur";

        if(isset($_POST['submit'])){

            $password = htmlspecialchars(htmlentities(($_POST['password'])));
            $email = htmlspecialchars(htmlentities(trim($_POST['email'])));
            $login = htmlspecialchars(htmlentities(trim($_POST['pseudo'])));
            $number = htmlspecialchars(htmlentities(trim($_POST['number'])));
            $firstname = htmlspecialchars(htmlentities(ucwords(strtolower(trim($_POST['firstname'])))));
            $lastname = htmlspecialchars(htmlentities(ucwords(strtolower(trim($_POST['lastname'])))));
            $password_confirm = htmlspecialchars(htmlentities($_POST['password_confirm']));
            $sexe = $_POST["gender"];

            //recupere les informations de lutilisateur choisis pour verifier si il ya pas deja le meme login
            $checkemail = $this->model->findAllInfoUser($email);
//      urgent des que possible faire verif login if existe

            if(empty($_POST['email'])){
                $check = false;
                $error_email = "Renseignez une adresse email.";
                $email = "";
            }
            elseif(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                $valid=false;
                $error_email = "Votre email n'est pas au bon format : example@gmail.";
                $email="";
            }
            if(count($checkemail) != 0){
                $check = false;
                $error_email = "Cet email est déjà utilisé.";
                $email = "";
            }

            if(empty($password)){
                $check = false;
                $error_password = "Renseignez votre mot de passe.";
                $password = '';
            }

            elseif( strlen($password) < 10 ) {
                $check = false;
                $error_password = "Le mot de passe doit être au moins de 10 caractères.";
                $password = '';
            }

            elseif(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]/',$password)) {
                $error_password = "Le mot de passe ne respecte pas les conditions.";
                $check = false;
                $password='';

            }

            if(empty($_POST['number'])){
                $check = false;
                $error_number = "Renseignez votre numéro de téléphone mobile.";
                $number ='';
            }

            elseif(!is_numeric($number)){
                $check = false;
                $error_number = "Votre numéro de téléphone n'est pas au bon format.";
                $number = '';
            }

            elseif(strlen($number) != 10 ) {
                $check = false;
                $error_number = "Votre numéro de téléphone doit contenir 10 chiffres.";
                $number = '';
            }

            if(empty($_POST['firstname'])){
                $check = false;
                $error_firstname = "Renseignez votre prénom.";
            }

            elseif (!preg_match("#^[a-zA-Z]+$#", $firstname)) {
                $check = false;
                $error_firstname ="Votre prénom n'est pas au bon format.";
                $firstname = '';
            }

            if(empty($_POST['lastname'])){
                $check = false;
                $error_lastname = "Veuillez renseigner votre nom.";
            }

            elseif (!preg_match("#^[a-zA-Z]+$#", $lastname)) {
                $check = false;
                $err_lastname ="Votre nom n'est pas au bon format;";
                $lastname = '';
            }



            if($password != $password_confirm){
                $check = false;
                $error_password_confirm = "Les mots de passe ne correspondent pas.";
                $password = '';
                $password_confirm ='';
            }


            if($check){
                $password = password_hash($password, PASSWORD_BCRYPT);
                // insert les donner dans la bdd
                $add_user= $this->model->InsertUser($firstname,$lastname,$email,$password,$number,$sexe,$login,$role);
                $message = "<h5>Inscription réussie ! Connectez vous <a href='connexion'><strong>ici</strong></a></h5>";
                // ferme le formulaire
                $display_form = 0;
            }
        }

        $pageTitle = "inscription";
        @Renderer::render('users/inscription',compact('pageTitle', 'display_form', 'error_firstname', 
        'error_lastname', 'error_email', 'error_password', 'error_password_confirm',
        'firstname', 'lastname', 'email', 'address', 'message'));
    }

}

?>