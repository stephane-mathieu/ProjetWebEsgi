<?php

@$user = $_SESSION['role'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/styles.css" rel="stylesheet" />
    <link href="style/header.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Document</title>
</head>
<header>
    <div class="header-blue">
        <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
            <div class="container"><a class="logo-header" href="home"><img src="/boutique-en-ligne/view/assets/logo.png" alt="logo"></a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class=" searchbar collapse navbar-collapse ms-5" id="navcol-1">
                    <?php if (!isset($user)) { ?>
                        <a class="btn btn-light action-button" role="button" href="connexion">Connexion</a></span>
                        <a class="btn btn-light action-button" role="button" href="inscription">Inscription</a>
                    <?php } ?>
                    <?php if (isset($user)) { ?>
                        <a class="btn btn-light action-button" role="button" href="compte">Compte</a></span>
                        <a class="btn btn-light action-button mr-2" role="button" href="deconnexion">Deconnexion</a>
                    <?php } ?>
                    <?php if ($user == 'admin') { ?>
                        <a class="btn btn-light action-button" role="button" href="admin">Admin</a></span>
                    <?php } ?>
                </div><br>
            </div>
        </nav>

    </div>
</header>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>