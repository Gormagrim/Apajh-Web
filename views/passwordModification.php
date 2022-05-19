<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <img class="img-fluid pageSignes" src="./assets/img/ma-page2.png" alt="Logo de ma page sur le site de l'Apajh à SAINT-QUENTIN">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 h1compte text-center">
            <h1>Modification de votre mot de passe :</h1>
        </div>
    </div>
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
    <div class="row">
        <div class="offset-1 col-10 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 acount">
            <div class="row">
                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <img class="avatar" src="<?= !empty($_SESSION['photo']) ? $_SESSION['photo'] : 'assets/img/flower.svg' ?>" alt="Photo de profil de <?= $user['firstname'] . ' ' . $user['lastname'] ?>" class="img-thumbnail">
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
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
                <div class="offset-1 col-10 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6">
                    <form action="/webapp/public/password" method="POST">
                        <label for="current_password" class="form-label">Mot de passe actuel</label>
                        <div class="input-group" id="show_hide_password_current">
                            <input type="password" class="form-control <?= isset($formErrors['current_password']) ? 'is-invalid' : (isset($current_password) ? 'is-valid' : '') ?>" id="show_hide_password_current" name="current_password" placeholder="Votre mot de passe actuel" />
                            <span class="input-group-text" id="basic-addon1"><a class="eye" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                        </div>
                        <?php if (isset($formErrors['current_password'])) { ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['current_password'] ?></p>
                            </div>
                        <?php } ?>
                        <label for="password" class="form-label">Nouveau mot de passe</label>
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : (isset($password) ? 'is-valid' : '') ?>" id="password" name="password" placeholder="Votre nouveau mot de passe" />
                            <span class="input-group-text" id="basic-addon1"><a class="eye" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                        </div>
                        <span id="msg"></span>
                        <?php if (isset($formErrors['password'])) { ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['password'] ?></p>
                            </div>
                        <?php } ?>
                        <script>
                            $('#password').on('keyup', function(event) {
                                var msg;
                                var str = $('#password').val();
                                if (str.match(/[0-9]/g) &&
                                    str.match(/[A-Z]/g) &&
                                    str.match(/[a-z]/g) &&
                                    str.match(/[^a-zA-Z\d]/g) &&
                                    str.length >= 8) {
                                    msg = "<p style='color:green'>Mot de passe fort.</p>";
                                } else {
                                    msg = "<p style='color:red'>Mot de passe faible.</p>";
                                }
                                $('#msg').html(msg);
                            });
                        </script>
                        <label for="password_confirmation" class="form-label">Confirmer votre nouveau mot de passe</label>
                        <div class="input-group" id="show_hide_password_verification">
                            <input type="password" class="form-control <?= isset($formErrors['password_confirmation']) ? 'is-invalid' : (isset($password_confirmation) ? 'is-valid' : '') ?>" id="password_confirmation" name="password_confirmation" placeholder="Confirmer votre nouveau mot de passe" />
                            <span class="input-group-text" id="basic-addon1"><a class="eye" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                        </div>
                        <?php if (isset($formErrors['password_confirmation'])) { ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['password_confirmation'] ?></p>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 text-center">
                                <button type="submit" class="btn btn-secondary modification">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>