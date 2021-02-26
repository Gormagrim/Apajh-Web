<?php
require_once '../controllers/UserController.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <h1>Mon compte</h1>
        </div>
    </div>
    <div class="row">
        <div class="offset-1 col-10 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 acount">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <button type="button" class="btn-close closer" onclick="history.go(-1)" aria-label="Close"></button>
                </div>
            </div>
            <img class="avatar" src="assets/img/flower.svg" alt="..." class="img-thumbnail">
            <a class="addPhoto" title="Changer votre photo de profil"><i class="fas fa-camera"></i></a>
            <div class="row">
                <div class="col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 text-center mail">
                    <span class=""><?= isset($user['mail']) ? $user['mail'] : '' ?></span>
                    <form action="/webapp/public/deconnexion" method="post">
                        <button type="submit" class="btn btn-secondary btn-sm">Déconnexion</button>
                    </form>
                </div>
                <div class="row">
                    <div class="col-12 offset-sm-2 col-sm-4 offset-md-2 col-md-4 offset-lg-2 col-lg-4 offset-xl-2 col-xl-4 text-center">
                        <a class="btn btn-secondary modification" href="/webapp/passwordModification.php">Modifier mon mot de passe</a>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
                        <a id="modification" class="btn btn-secondary modification" hidden>Modifier mes informations</a>
                    </div>
                </div>
            </div>
            <form action="/webapp/public/macount" method="POST">
                <div class="row civility">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <span class="civilityType">Nom :</span>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <input type="text" class="form-control information" id="<?= isset($user['lastname']) ? 'lastname' : 'newLastname' ?>" name="lastname" placeholder="Votre prénom" value="<?= isset($user['lastname']) ? $user['lastname'] : '' ?>" />
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
                        <input type="text" class="form-control information" id="<?= isset($user['firstname']) ? 'firstname' : 'newFirstname' ?>" name="firstname" placeholder="Votre nom" value="<?= isset($user['firstname']) ? $user['firstname'] : '' ?>" />
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
                        <input type="text" class="form-control information" id="<?= isset($user['city']) ? 'city' : 'newCity' ?>" name="city" placeholder="Votre ville" value="<?= isset($user['city']) ? $user['city'] : '' ?>" />
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
                        <input type="text" class="form-control information" id="<?= isset($user['job']) ? 'job' : 'newJob' ?>" name="job" placeholder="Votre fonction" value="<?= isset($user['job']) ? $user['job'] : '' ?>" />
                        <?php if (isset($formErrors['job'])) { ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['job'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 text-center">
                        <button id="modifValidation" type="submit" name="updateDescription" class="btn btn-secondary modification">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>