 <div class="container-fluid">
     <div class="row">
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
             <img class="img-fluid pageSignes" src="./assets/img/page-inscription2.png" alt="Logo de la page d'inscription de l'Apajh à SAINT-QUENTIN">
         </div>
     </div>
     <div class="row">
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mt-4">
             <p>Vous avez déjà un compte ? cliquez <a href="/webapp/public/connexion">ici</a> pour vous connecter.</p>
         </div>
     </div>
     <div class="row">
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
             <h1>Inscription à notre site et à nos applications</h1>
         </div>
     </div>
     <div class="row">
         <div class="offset-1 col-10 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 connexion">
             <div class="row">
                 <div class="offset-1 col-10 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 formConnexion">

                     <form action="/webapp/public/register" method="post">
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
                             <label for="password" class="form-label">Mot de passe (8 caractères minimum)</label>
                             <div class="input-group" id="show_hide_password">
                                 <input type="password" class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : (isset($password) ? 'is-valid' : '') ?>" id="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" name="password" placeholder="Votre mot de passe" />
                                 <span class="input-group-text" id="basic-addon1"><a class="eye" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                             </div>
                             <span id="msg"></span>
                             <?php if (isset($formErrors['password'])) { ?>
                                 <div class="invalid-feedback">
                                     <p><?= $formErrors['password'] ?></p>
                                 </div>
                             <?php } ?>
                         </div>
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
                         <div class="form-group">
                             <label for="password_validation" class="form-label">Valider votre mot de passe</label>
                             <div class="input-group" id="show_hide_password_verification">
                                 <input type="password" class="form-control <?= isset($formErrors['password_validation']) ? 'is-invalid' : (isset($password) ? 'is-valid' : '') ?>" id="password_validation" value="<?= isset($_POST['password_validation']) ? $_POST['password_validation'] : '' ?>" name="password_validation" placeholder="Valider votre mot de passe" />
                                 <span class="input-group-text" id="basic-addon1"><a class="eye" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                             </div>
                             <?php if (isset($formErrors['password_validation'])) { ?>
                                 <div class="invalid-feedback">
                                     <p><?= $formErrors['password_validation'] ?></p>
                                 </div>
                             <?php } ?>
                         </div>
                         <div class="form-check">
                             <input class="form-check-input <?= isset($formErrors['termsOfUse']) ? 'is-invalid' : '' ?>" type="checkbox" id="flexSwitchCheckDefault" name="termsOfUse" <?= isset($_POST['termsOfUse']) ? 'checked' : '' ?>>
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