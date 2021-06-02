<?php
require_once '../controllers/UserController.php';
require_once '../controllers/ContentController.php';
$contentController = new ContentController;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <img class="img-fluid pageSignes" src="./assets/img/ma-page2.png" alt="Logo de ma page sur le site de l'Apajh à SAINT-QUENTIN">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <?php if (isset($formErrors['login'])) { ?>
                <div class="invalid-feedback">
                    <h2><?= $formErrors['login'] ?></h2>
                </div>
            <?php } ?>
            <div class="row">
                <div class="offset-1 col-10 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 connexion text-center">
                    <?php if (empty($formErrors)) { ?>
                        <?php if (isset($success['valid'])) { ?>
                            <p><?= $success['valid'] ?></p>
                        <?php } ?>
                    <?php } else { ?>
                        <?php if (isset($success['error'])) { ?>
                            <p><?= $success['error'] ?></p>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="offset-1 col-10 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 acount">
            <div class="row">
                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <img class="avatar" src="<?= !empty($_SESSION['photo']) ? $_SESSION['photo'] : 'assets/img/flower.svg' ?>" alt="Photo de profil de <?= $user['firstname'] . ' ' . $user['lastname'] ?>" class="img-thumbnail">
                    <a class="addPhoto" title="Changer votre photo de profil"><i class="fas fa-camera"></i></a>
                    <input class="addPhoto" name="file" type="file">
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 h1compte text-center">
                            <h1>Mon compte</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 text-center mail">
                            <span class=""><?= isset($_SESSION['mail']) ? $_SESSION['mail'] : '' ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <button type="button" class="btn-close closer" onclick="history.go(-1)" aria-label="Close"></button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 text-center">
                    <span class="userPhotoError"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-2 col-sm-4 offset-md-2 col-md-4 offset-lg-2 col-lg-4 offset-xl-2 col-xl-4 text-center">
                    <a class="btn btn-secondary modification" href="/webapp/public/password">Modifier mon mot de passe</a>
                </div>
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
                    <?php if (empty($formErrors)) { ?>
                        <button type="submit" id="modification" class="btn btn-secondary modification" name="modification">Modifier mes informations</button>
                    <?php } ?>
                </div>
            </div>
            <?php if ($_SESSION['ug'] == 1) { ?>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <a class="btn btn-secondary admin" href="/webapp/public/admin">panneau ADMIN</a>
                    </div>
                </div>
            <?php } ?>
            <form action="/webapp/public/mon-compte" method="POST">
                <div class="row civility">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <span class="civilityType">Nom :</span>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <?php if (!empty($formErrors)) { ?>
                            <input type="text" class="form-control information" id="lastname" name="lastname" placeholder="Votre nom" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" />
                        <?php } else { ?>
                            <span id="spanLastname" class="myCivility"><?= isset($user['lastname']) ? $user['lastname'] : '' ?></span>
                        <?php } ?>
                        <input type="hidden" class="form-control information" id="lastname" name="lastname" placeholder="Votre nom" value="<?= isset($user['lastname']) ? $user['lastname'] : (isset($_POST['lastname']) ? $_POST['lastname'] : '') ?>" />

                        <?php if (isset($formErrors['lastname'])) { ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['lastname'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row civility">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <span class="civilityType">Prénom :</span>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <?php if (!empty($formErrors)) { ?>
                            <input type="text" class="form-control information" id="firstname" name="firstname" placeholder="Votre prénom" value="<?= isset($user['firstname']) ? $user['firstname'] : (isset($_POST['firstname']) ? $_POST['firstname'] : '') ?>" />
                        <?php } else { ?>
                            <span id="spanFirstname" class="myCivility"><?= isset($user['firstname']) ? $user['firstname'] : '' ?></span>
                        <?php } ?>
                        <input type="hidden" class="form-control information" id="firstname" name="firstname" placeholder="Votre prénom" value="<?= isset($user['firstname']) ? $user['firstname'] : (isset($_POST['firstname']) ? $_POST['firstname'] : '') ?>" />
                        <?php if (isset($formErrors['firstname'])) { ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['firstname'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row civility">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <span class="civilityType">Ville :</span>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <?php if (!empty($formErrors)) { ?>
                            <input list="cities" type="text" class="form-control information" data-id="" id="city" placeholder="Tapez votre code postal" value="<?= isset($_POST['city']) ? $_POST['city'] : (isset($user['city']) ? $user['city'] : '') ?>" />
                            <select id="cities" class="cities"></select>
                        <?php } elseif (empty($formErrors)) { ?>
                            <span id="spanCity" class="myCivility"><?= isset($user['newCity']) ? $user['newCity'] : $userInformation->ville->cities ?> (<?= $userInformation->ville->postalCode ?>)</span>
                        <?php } ?>
                        <input list="cities" type="hidden" class="form-control information" data-id="" id="city" placeholder="Tapez votre code postal" value="<?= isset($userInformation->ville->cities) ? $userInformation->ville->cities : (isset($user['city']) ? $user['city'] : '') ?>" />
                        <select id="cities" class="cities" name="city" value=""></select>
                        <input type="hidden" class="cityId" name="city" value="" data-value="">
                        <?php if (isset($formErrors['city'])) { ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['city'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row civility">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <span class="civilityType">Fonction :</span>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <?php if (!empty($formErrors)) { ?>
                            <input type="text" class="form-control information" id="job" name="job" placeholder="Votre fonction" value="<?= isset($user['job']) ? $user['job'] : (isset($_POST['job']) ? $_POST['job'] : '') ?>" />
                        <?php } else { ?>
                            <span id="spanJob" class="myCivility"><?= isset($user['job']) ? $user['job'] : '' ?></span>
                        <?php } ?>
                        <input type="hidden" class="form-control information" id="job" name="job" placeholder="Votre fonction" value="<?= isset($user['job']) ? $user['job'] : (isset($_POST['job']) ? $_POST['job'] : '') ?>" />
                        <?php if (isset($formErrors['job'])) { ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['job'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 text-center">
                        <button id="modificationValidation" type="submit" class="btn btn-secondary modification">Valider</button>
                        <?php if (!empty($formErrors)) { ?>
                            <button id="modificationValid" type="submit" class="btn btn-secondary modification">Valider</button>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>