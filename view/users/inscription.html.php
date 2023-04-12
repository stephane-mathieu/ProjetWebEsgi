<body>
<head>
    <link rel="stylesheet" href="./style/error.css">
</head>
<main class="main_form">
    <section class="inscription">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-3 d-none d-md-block">
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <?php if (isset($message)) { echo $message ;}?>

                                    <?php if ($display_form == 1 ) {  ?>

                                        <form action="inscription" method="POST" id="loginForm">

                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                                <span class="h1 fw-bold mb-0">Inscription</span>
                                            </div>
                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Renseignez le formulaire d'inscription.</h5>
                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Le mot de passe doit contenir au moins 10 caractères avec au moins une majuscule, une minuscule, 1 chiffre et un caractère spécial.</h5>

                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="form2Example17">Pseudo</label>
                                                    <input type="text"   name="pseudo" class="form-control form-control-lg" value ="<?php if (isset($login)) {echo $login;}?>"/>
                                                    <small></small>
                                                    <div class="error"><?php if (isset($error_firstname)) { echo $error_firstname ; }?></div>
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="form2Example17">Prénom</label>
                                                    <input type="text"   name="firstname" class="form-control form-control-lg" value ="<?php if (isset($firstname)) {echo $firstname;}?>"/>
                                                    <div class="error"><?php if (isset($error_firstname)) { echo $error_firstname ; }?></div>
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="form2Example17">Nom</label>
                                                    <input type="text"   name="lastname" class="form-control form-control-lg" value ="<?php if (isset($lastname)) {echo $lastname;}?>" />
                                                    <div class="error"><?php if (isset($error_lastname)) { echo $error_lastname ; }?></div>
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="form2Example17">Email</label>
                                                    <input type="email"  name="email" class="form-control form-control-lg" value ="<?php if (isset($email)) {echo $email;}?>" />
                                                    <small></small>
                                                    <div class="error"><?php if (isset($error_email)) { echo $error_email ; }?></div>
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="form2Example17">Mobile</label>
                                                    <input type="text"  minlength="10" maxlength="10"   name="number" class="form-control form-control-lg" value ="<?php if (isset($number)) {echo $number;}?>" />
                                                    <div class="error"><?php if (isset($error_number)) { echo $error_number ; }?></div>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <label for="gender">Sexe:</label>
                                                    <select name="gender" class="form-select"  aria-label="Sélectionner votre genre…">
                                                        <option value="female">Femme</option>
                                                        <option value="male">Homme</option>
                                                    </select>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="form2Example27">Mot de passe</label>
                                                    <input type="password"  name="password" class="form-control form-control-lg"  />
                                                    <small></small>
                                                    <div class="error"><?php if (isset($error_password)) { echo $error_password ; }?></div>
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="form2Example27"> Confirmer le mot de passe</label>
                                                    <input type="password"  name="password_confirm" class="form-control form-control-lg" />
                                                    <small></small>
                                                <div class="error"><?php if (isset($error_password_confirm)) { echo $error_password_confirm; }?>
                                                </div>

                                                <div class="pt-1 mb-4">
                                                    <button class="btn btn-dark btn-lg btn-block"  name="submit" type="submit">S'inscrire</button>
                                                </div>
                                        </form>

                                    <?php }  ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="./js/inscription.js"></script>

</body>