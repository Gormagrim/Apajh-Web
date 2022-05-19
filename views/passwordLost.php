<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <?php
            $router = new AltoRouter();
            $router->map('POST', '/webapp/public/mot-de-passe-perdu-log=[*:log]-cle=[*:cle]', 'UserController#lostPassword');
            $router->map('GET', '/webapp/public/mot-de-passe-perdu-log=[*:log]-cle=[*:cle]', function () {
                require '../views/passwordLost.php';
            });
            $match = $router->match();
            $log = htmlspecialchars(urldecode($match['params']['log']));
            $cle = htmlspecialchars(urldecode($match['params']['cle']));
            ?>
            <input type="hidden" id="mail" name="mail" value="<?= $log ?>" />
            <input type="hidden" id="validationKey" name="validationKey" value="<?= $cle ?>" />
        </div>
    </div>
    <div class="row">
        <div class="col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 acount">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 h1compte text-center">
                            <h1>Récupération de votre mot de passe :</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6">
                    <form action="/webapp/public/mot-de-passe-retrouve" method="POST">
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
                                <button type="submit" class="btn btn-secondary modification" id="pwd">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>