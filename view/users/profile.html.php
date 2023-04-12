
<head>
    <link rel="stylesheet" href="./style/profile.css">
</head>
<div class="container mt-5">

    <div class="row d-flex justify-content-center">

        <div class="col-md-7">

            <div class="card p-3 py-4">

                <div class="text-center">
                    <img src="data:image/jpeg;base64, <?= $user_infos[0]['img_profil'] ?>" width="100" class="rounded-circle">
                </div>
                <div class="text-center mt-3">
                    <span class="bg-secondary p-1 px-4 rounded text-white"><?= '@'.$user_infos[0]['login'] ?></span>
                    <h5 class="mt-2 mb-0"><?= $user_infos[0]['firstname'].' '. $user_infos[0]['lastname'] ?></h5>
                    <span><?= $user_infos[0]['sexe'] ?></span>

                    <div class="px-4 mt-1">
                        <p class="fonts"><?=  $user_infos[0]['resume'] ?> </p>
                    </div>
                    <ul class="social-list">
                        <li><i class="fa fa-facebook"></i></li>
                        <li><i class="fa fa-dribbble"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                        <li><i class="fa fa-linkedin"></i></li>
                        <li><i class="fa fa-google"></i></li>
                    </ul>

                </div>
            </div>

        </div>

    </div>

</div>