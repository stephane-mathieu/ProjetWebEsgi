<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>My Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="compte.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Account</div>
                <div class="card-body">
                    <form action="compte" method="POST"  enctype="multipart/form-data" id="loginForm">
                        <div class="form-group">
                            <label for="profile-picture">Profile Picture</label>
                            <input type="file" class="form-control-file" name="picture" id="profile-picture"  accept="image/png, image/jpeg">
                            <img id="preview-image"  src="data:image/jpeg;base64, <?= $user_infos[0]['img_profil'] ?>" alt="Preview Image" style=" width: 52%;">
                        </div>
                        <div class="form-group">
                            <label for="Firstanme">Prénom</label>
                            <input type="text" class="form-control" name="firstname" placeholder="Enter your Firstname" value="<?= $user_infos[0]['firstname'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" name="lastname" placeholder="Enter your Lastname" value="<?= $user_infos[0]['lastname'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp"   value="<?= $user_infos[0]['email'] ?>">
                            <small></small>

                        </div>
                        <div class="form-group">
                            <small id="emailHelp" class="form-text text-muted">Votre Description.</small>
                            <textarea  name="Description" rows="5" cols="33"><?= $user_infos[0]['resume'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Phone">Numéros de téléphone</label>
                            <input type="text" class="form-control" name="phone" aria-describedby="emailHelp" placeholder="Enter your numberPhone" value="<?= $user_infos[0]['number'] ?>">

                        </div>
                        <div class="form-group">
                            <label for="Pseudo">Pseudo</label>
                            <input type="text" class="form-control" name="pseudo" aria-describedby="emailHelp" placeholder="Enter your login" value="<?= $user_infos[0]['login'] ?>">
                            <small></small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password"  name="password" placeholder="Enter your  new password" >
                            <small></small>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm-password" name="password_confirm" placeholder="Confirm your password" >
                            <small></small>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!--<script src="./js/compte.js"></script>-->

<script>
    function previewImage() {
        var preview = document.querySelector('#preview-image');
        var file = document.querySelector('#profile-picture').files[0];
        var reader = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result;
            preview.style.display = "block";
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }</script>
</body>
</html>
