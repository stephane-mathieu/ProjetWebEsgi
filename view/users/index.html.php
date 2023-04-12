
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Site meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css">
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <link href="style/index2.css" rel="stylesheet" type="text/css">

</head>
<body>

<?php if(isset($_SESSION['userId'])): ?>
    <div class="container-profile">
        <?php foreach ($Profiles as $profile): ?>
            <div class="card p-4">
                <div class=" image d-flex flex-column justify-content-center align-items-center">
                    <button class="btn btn-secondary">
                        <img id="preview-image" src="data:image/jpeg;base64, <?= $profile['img_profil'] ?>" alt="Preview Image" height="100" width="100">
                    </button>
                    <span class="name mt-3"><?= $profile['firstname'] .' '.$profile['lastname'] ?></span>
                    <span class="idd"><?= $profile['login'] ?></span>
                    <div class=" d-flex mt-2">
                     </div>
                    <div class="text mt-3">
                        <span><?= $profile['resume'] ?><br></span>
                    </div>
                    <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
                        <span><i class="fa fa-twitter"></i></span>
                        <span><i class="fa fa-facebook-f"></i></span>
                        <span><i class="fa fa-instagram"></i></span>
                        <span><i class="fa fa-linkedin"></i></span>
                    </div>

                    <div class="d-flex mt-2">
<!--                        --><?php //var_dump($profile['matchStatus']); ?>

                        <?php if (empty($profile['matchStatus']) ): ?>
                            <a href="traitementLike?id=<?= $profile['id'] ?>" title="Liker" data-toggle="tooltip">
                                <button class="btn1 btn-dark">Like</button>
                            </a>
                        <?php elseif ($profile['matchStatus'] == 'active'): ?>
                            <button class="btn1 btn-success" disabled>Match</button>
                        <?php elseif ($profile['matchStatus'] == "liked"): ?>
                            <button class="btn1 btn-warning" disabled>Liker</button>
                        <?php else: ?>
                            <a href="traitementLike?id=<?= $profile['id'] ?>" title="Liker" data-toggle="tooltip">
                                <button class="btn1 btn-dark">Like</button>
                            </a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <main>
        <section class="jumbotron">
            <div class="container">
                <h1>Faites des rencontres authentiques</h1>
                <p>Avec Mon site de rencontre, trouvez des personnes compatibles avec vos envies et vos passions.</p>
            </div>
        </section>

        <section class="container py-5">
            <h2 class="text-center mb-5">Comment ça marche</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Inscrivez-vous</h5>
                            <p class="card-text">Créez votre compte gratuitement et complétez votre profil pour être mis en relation avec des personnes compatibles.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Trouvez des personnes compatibles</h5>
                            <p class="card-text">Utilisez notre recherche avancée pour trouver des personnes compatibles avec vos envies et vos passions. Trouvez votre âme sœur en fonction de vos préférences.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Connectez-vous avec les autres membres</h5>
                            <p class="card-text">Discutez avec les personnes qui partagent vos centres d'intérêts et commencez une nouvelle relation amicale ou amoureuse. Envoyez des messages ou participez à des forums de discussion.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-light">
            <div class="container py-5">
                <h2 class="text-center mb-5">Pourquoi nous choisir ?</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <h4 class="mb-3">Des profils vérifiés</h4>
                        <p>Nous vérifions tous les profils pour vous offrir une expérience de rencontre sécurisée et authentique.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h4 class="mb-3">Une expérience utilisateur exceptionnelle</h4>
                        <p>Nous mettons tout en œuvre pour vous offrir une expérience utilisateur simple, intuitive et agréable.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h4 class="mb-3">Un support technique disponible 24/7</h4>
                        <p>Notre équipe de support technique est disponible 24/7 pour répondre à vos questions et vous aider en cas de besoin.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php endif; ?>
<!-- JS -->
<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>
