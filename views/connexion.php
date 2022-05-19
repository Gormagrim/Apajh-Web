<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <img class="img-fluid pageSignes" src="./assets/img/page-connexion2.png" alt="Logo de la page de connexion de l'Apajh à SAINT-QUENTIN">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mt-4">
            <p>Vous n'avez pas encore de compte ? cliquez <a href="/webapp/public/register">ici</a> pour vous inscrire.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <h1>Connexion à votre compte</h1>
        </div>
    </div>
    <div class="row">
        <div class="offset-1 col-10 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 connexion">
            <div class="row">
                <div class="offset-1 col-10 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 formConnexion">
                    <form action="/webapp/public/connexion" method="POST">
                        <div class="form-group">
                            <label for="mail" class="form-label">Adresse mail</label>
                            <input type="mail" class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : (isset($mail) ? 'is-valid' : '') ?>" id="mail" name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" placeholder="votre-adresse@e-mail.fr" />
                            <?php if (isset($formErrors['mail'])) { ?>
                                <div class="invalid-feedback">
                                    <p><?= $formErrors['mail'] ?></p>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Mot de passe</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : (isset($password) ? 'is-valid' : '') ?>" id="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" name="password" placeholder="Votre mot de passe" autocomplete />
                                <span class="input-group-text" id="basic-addon1"><a class="eye" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                            </div>
                            <?php if (isset($formErrors['password'])) { ?>
                                <div class="invalid-feedback">
                                    <p><?= $formErrors['password'] ?></p>
                                </div>
                            <?php } ?>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary connexionButton">Valider</button>
                    </form>
                    <div>
                        <span class="smallText"><a href="/webapp/public/mot-de-passe-perdu">Mot de pass oublié ?</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>