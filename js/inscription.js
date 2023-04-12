
document.addEventListener('DOMContentLoaded', (event) => {

    let form = document.querySelector('#loginForm');

    // console.log(myArray['login']);

    // Ecouter la modification de l'email
    form.email.addEventListener('change', function(e) {
        validEmail(e.target);
        // console.log(validEmail(e.target));
    });

    // Ecouter la modification du login
    form.pseudo.addEventListener('change', function(e) {
        validLogin(e.target);
        // console.log(validLogin(e.target));
    });

    // Ecouter la modification du password
    form.password.addEventListener('change', function(e) {
        validPassword(e.target);

    });

    form.password_confirm.addEventListener('change', function(e) {
        validPasswordConfirm(e.target, form.password);
    });

    // Ecouter la soumission du formulaire
    form.addEventListener('submit', async function(e) {
        e.preventDefault();


        if ((await validEmail(form.email) === true) && (await validLogin(form.login) === true) && (await validPassword(form.password) === true)) {
            console.log("good");
            form.submit();
        } else {
            console.log("pas bon");
        }

    });


// Validation du confirm password
    const validPasswordConfirm = function(inputPassword_confirm, inputPassword) {
        // Récupération de la balise small
        let small = inputPassword_confirm.nextElementSibling;

        // Vérification si le champ confirm password est vide
        if (inputPassword_confirm.value == '') {
            small.innerHTML = "Champ confirmation mot de passe vide"
            small.classList.remove('text-success');
            small.classList.add('text-danger');
            return false;
        }

        // Vérification si le champ confirm password correspond au champ password
        if (inputPassword_confirm.value != inputPassword.value) {
            small.innerHTML = "Les mots de passe ne correspondent pas"
            small.classList.remove('text-success');
            small.classList.add('text-danger');
            return false;
        }

        // Validation réussie
        small.innerHTML = "Mots de passe identiques";
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        return true;
    };

// Email validation function
    const validEmail = async function(inputEmail) {
        // Regular expression to validate email address
        const emailRegExp = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Get the small element to display the validation message
        const small = inputEmail.nextElementSibling;

        // Check if the email address is empty
        if (inputEmail.value === '') {
            small.innerHTML = 'Email address is required.';
            small.classList.remove('text-success');
            small.classList.add('text-danger');
            return false;
        }

        // Check if the email address matches the regular expression
        if (!emailRegExp.test(inputEmail.value)) {
            small.innerHTML = 'Please enter a valid email address.';
            small.classList.remove('text-success');
            small.classList.add('text-danger');
            return false;
        }

        // Check if the email address already exists
        const response = await fetch('traitementInscription');

        const data = await response.json();

        for (let i = 0; i < data.length; i++) {
            if (data[i].email === inputEmail.value) {
                small.innerHTML = 'This email address is already in use.';
                small.classList.remove('text-success');
                small.classList.add('text-danger');
                return false;
            }
        }

        // Email address is valid
        small.innerHTML = 'Email address is valid.';
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        return true;
    };


    // Validation Login //
    const validLogin = async function(inputLogin) {

        let checked = false;
        // recuperation de la balise small
        let small = inputLogin.nextElementSibling;
        if (inputLogin.value == '') {
            small.innerHTML = "Champ login vide"
            small.classList.remove('text-success');
            small.classList.add('text-danger');
            return false;
        }
        return await fetch('traitementInscription', {

        }).then((response) =>
            response.json()
        ).then(response => {
            for (var i = 0; i < response.length; i++) {

                if (inputLogin.value == response[i]['login']) {
                    small.innerHTML = "Nom d'utilisateur déja utilisé"
                    small.classList.remove('text-success');
                    small.classList.add('text-danger');
                    // console.log("no")
                    return false;
                } else {
                    // small.innerHTML = "Nom d'utilisateur bon"
                    // small.classList.remove('text-danger');
                    // small.classList.add('text-success');
                    // console.log("yes")
                    checked = true;
                    // return true;
                }

            }
            if (checked) {
                small.innerHTML = "Nom d'utilisateur bon"
                small.classList.remove('text-danger');
                small.classList.add('text-success');
                return true;
            }
        })
    };


    // Validation PASSWORD //
    const validPassword = function(inputPassword) {

        let msg;
        let valid = false;
        // Au moins 10caractères
        if (inputPassword.value.length < 10) {
            msg = 'Le mot de passe doit contenir au moins 10 caractères';
        }
// AU moins 1 maj debut
        else if (!/^[A-Z]/.test(inputPassword.value)) {
            msg = 'Le début de votre mot de passe doit contenir 1 majuscule';
        }
// AU moins 1 min
        else if (!/[a-z]/.test(inputPassword.value)) {
            msg = 'Le mot de passe doit contenir au moins 1 minuscule';
        }
// AU moins 1 chiffre
        else if (!/[0-9]/.test(inputPassword.value)) {
            msg = 'Le mot de passe doit contenir au moins 1 chiffre';
        }
// AU moins 1 caractère spécial
        else if (!/[^a-zA-Z0-9]/.test(inputPassword.value)) {
            msg = 'Le mot de passe doit contenir au moins 1 caractère spécial';
        }
// Mot de passe valide
        else {
            msg = 'Mot de Passe Valide';
            valid = true;
        }

        // Affichage
        // recuperation de la balise small
        let small = inputPassword.nextElementSibling;

        // on test l'expression reguliere
        if (valid) {
            small.innerHTML = msg;
            small.classList.remove('text-danger');
            small.classList.add('text-success');
            return true;
        } else {
            small.innerHTML = msg;
            small.classList.remove('text-success');
            small.classList.add('text-danger');

            return false;
        }
    }

})