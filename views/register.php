<?php
require_once '../controllers/UserController.php';
    if(count($_POST) == 0 ){ ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <h1>Inscription</h1>
            <p>Vous avez déjà un compte ? cliquez <a href="/webapp/public/connexion">ici</a> pour vous connecter.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 connexion">
            <div class="row">
                <div class="offset-1 col-10 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 formConnexion">

                    <form action="/webapp/public/register" method="post">
                        <div class="form-group">
                            <label for="mail" class="form-label">Adresse mail</label>
                            <input type="mail" class="form-control" id="mail" name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" placeholder="votre-adresse@e-mail.fr" />
                            <?php if (isset($formErrors['mail'])) { ?>
                                <div class="invalid-feedback">
                                    <p><?= $formErrors['mail'] ?></p>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Mot de passe</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" />
                                <span class="input-group-text" id="basic-addon1"><a class="eye" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_validation" class="form-label">Valider votre mot de passe</label>
                            <div class="input-group" id="show_hide_password_verification">
                                <input type="password" class="form-control" id="password_validation" name="password_validation" placeholder="Valider votre mot de passe" />
                                <span class="input-group-text" id="basic-addon1"><a class="eye" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                            </div>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            <label class="form-check-label condition" for="flexSwitchCheckDefault">J'ai lu et j'approuve les
                                conditions générales d'utilisation du site.</label>
                        </div>
                        <button type="submit" class="btn btn-primary connexionButton" name="register">S'inscrire</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
   <?php }
?>
