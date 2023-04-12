<html>
  <head>
    <link rel="stylesheet" href="/boutique-en-ligne/style/error.css">
  </head>
  <body>
    <main class="main_form">

      <section>
        <div class="container py-5 h-100 ">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-3 d-none d-md-block">
                  </div>

                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                      <form action="connexion" method="POST">

                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Connexion</span>
                        </div>

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connectez vous à votre compte.</h5>

                        <div><?php if(isset($_GET['val'])) { echo "Veuillez vous connecter pour valider votre panier et passer à la livraison.";}?></div>

                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example17">Email</label>
                          <input type="email" id="form2Example17"  name="email" class="form-control form-control-lg" />
                        </div>

                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example27">Mot de passe</label>
                          <input type="password" id="form2Example27" name="password" class="form-control form-control-lg" />
                        </div>

                        <div class="error"><?php if(isset($error)) { echo $error ;} ?></div>

                        <div class="pt-1 mb-4">
                          <button class="btn btn-dark btn-lg btn-block"  name="submit" type="submit">Connexion</button>
                        </div>

                        <p  style="color: #393f81;">Pas encore de compte ? <a href="inscription.php" style="color: #393f81;">Inscrivez-vous ici.</a></p>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>


  </body>
</html>